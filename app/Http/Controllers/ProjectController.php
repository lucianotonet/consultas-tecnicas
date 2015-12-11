<?php namespace App\Http\Controllers;

use App\Client;
use App\Contact;
use App\Project;
use App\ProjectStage;
use App\ProjectDiscipline;

use Validator;
use Illuminate\Http\Request;

class ProjectController extends Controller {

    private $sys_notifications = array();

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Request $request, $client_id = null ) {        

        if ( $client_id != null ) {
            $projects  = Project::where( 'client_id', $client_id )
                                ->orderBy( $request->input( 'orderby', 'id' ), $request->input( 'order', 'ASC' ) )
                                ->paginate( $request->input( 'paginate', 50 ) );
        }else{
            $projects = $request->user()->projects;        
        }

        $clients = $request->user()->clients;      

        return view( 'projects.index' )->with(['projects'=>$projects, 'clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create( Request $request, $client_id = null ) {        
                
        $project_client = Client::find( $client_id );        
        $clients = $request->user()->clients;

        $view = ( $request->ajax() ) ? 'projects.create-panel' : 'projects.create';
        return view( $view, compact('clients', 'client_id'))->with(['client' => @$project_client ]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( Request $request ) {
        
        $validator = Validator::make( $request->all(), [
            'title'     => 'required',  
            'client_id' => 'required|integer',  
        ]);     

        if ($validator->fails()) {
                        
            $this->sys_notifications[] = array( 'type' => 'danger', 'message' => $validator->errors()->first() );   

            $request->session()->flash( 'sys_notifications', $this->sys_notifications );

            return back()->withErrors($validator)->withInput( $request->all() );
        }

        $data = $request->all();        
        $data['owner_id'] = $request->user()->id;        

        // Create a new Project
        $project = Project::create( $data );
        
        if( $project ){

            $project_stage = ProjectStage::create([
                    'name'          => '1. Geral',
                    'project_id'    => $project->id,
                    'owner_id'      => $request->user()->id,                    
                ]);
            $project->current_stage = $project_stage->id;
            $project->save();

            $this->sys_notifications[] = array( 'type' => 'success', 'message' => 'Nova obra criada com sucesso!' );                 
            $this->sys_notifications[] = array( 'type' => 'success', 'message' => 'Etapa <strong>Geral</strong> adicionada para a nova Obra.' );
            $request->session()->flash( 'sys_notifications', $this->sys_notifications );                
            return redirect( '/obras/'.$project->id ); 
        }else{
            $this->sys_notifications[] = array( 'type' => 'danger', 'message' => 'Não foi possível adicionar a obra!' );             
            $request->session()->flash( 'sys_notifications', $this->sys_notifications );       
            return back()->withErrors($validator)->withInput( $request->all() );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int     $id
     * @return Response
     */
    public function show( $id, Request $request, Validator $validator ) {
        $project = Project::find($id);

        if( !$project ){            
            $sys_notifications[] = array( 'type' => 'danger', 'message' => 'A Obra solicitada não existe ou está corrompida.' ); 
            $request->session()->flash( 'sys_notifications', $sys_notifications );    
            return redirect( '/obras' );               
        }

        // $contact = Contact::first();

        // $project->contacts()->attach( $contact->id );

        // return $contact;


        $project->load('stages'); // Carrega etapas
        $contacts = $request->user()->contacts;


        $contacts = $contacts->filter( function($contact) use ($project)
        {
            if ( !$project->contacts->contains( $contact->id ) ) {
                return true;   
            }
        });

        return view( 'projects.show' )->with(['project'=>$project, 'contacts'=>$contacts]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int     $id
     * @return Response
     */
    public function edit( $id, Request $request ) {
        
        $project = Project::find($id);
        $clients = $request->user()->clients;
        
        if( $project ){                      
            return view('projects.edit', compact('project', 'clients'));         
        }else{
            $this->sys_notifications[] = array( 'type' => 'danger', 'message' => 'Obra não encontrada!' );   
            $request->session()->flash( 'sys_notifications', $this->sys_notifications );        
        }

        return back()->withInput($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int     $id
     * @return Response
     */
    public function update( $id, Request $request ) {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required'            
        ]);     

        if ($validator->fails()) {        
            $this->sys_notifications[] = array( 'type' => 'danger', 'message' => $validator->errors()->first() );   
            $request->session()->flash( 'sys_notifications', $this->sys_notifications );
            return app('Illuminate\Routing\UrlGenerator')->previous()->withInput( $request->all() );            
        }

        // UPDATE RESOURCE
        $project = Project::find($id);       
        $project->update( $request->all() );

        $this->sys_notifications[] = array( 'type' => 'success', 'message' => 'Obra atualizada com sucesso!' );  
        $request->session()->flash( 'sys_notifications', $this->sys_notifications );

        return back()->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int     $id
     * @return Response
     */
    public function destroy( $id, Request $request ) {
        $project = Project::find($id);        
        if(!$project){
            return back()->withInput( $request->all() );
        }

        if( $project->destroy( $id ) ){
            $this->sys_notifications[] = array( 'type' => 'success', 'message' => '<strong><i class="fa fa-check"></i></strong> Obra excluída com sucesso!' );                   
            $request->session()->flash( 'sys_notifications', $this->sys_notifications );        
            return redirect( '/obras' );
        }else{
            $this->sys_notifications[] = array( 'type' => 'danger', 'message' => '<strong><i class="fa fa-warning"></i></strong> Não foi possível excluir a obra!' );                
            $request->session()->flash( 'sys_notifications', $this->sys_notifications );        
            return back()->withInput( $request->all() );
        }

    }

}