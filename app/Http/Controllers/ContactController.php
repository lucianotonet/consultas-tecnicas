<?php 

namespace App\Http\Controllers;
use App\Contact;
use App\Project;
use Validator;
use Illuminate\Http\Request;

class ContactController extends Controller {


	private $sys_notifications = array();
   /**
    * Display a listing of contacts
    *
    * @return Response
    */
   public function index( $obra_id = null, Request $request)
   {   	
   		if( $obra_id != null ){
   			$project 	= Project::find( $obra_id )->get();
   			dd( $project );
	   		$contacts   = $project->contacts;
   		}else{
   			$contacts 	= Contact::orderBy( $request->input('orderby', 'email'), $request->input('order', 'ASC'))->paginate( $request->input('paginate', 50) );  	   	
   		}
	   		   	
	   	return view('contacts.index')->with('contacts', $contacts);
   }

	/**
	 * Show the form for creating a new contact
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('contacts.create');		
	}

	/**
	 * Store a newly created contact in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'email' => 'required|unique:contatos|max:255|email'            
        ]);		

        if ($validator->fails()) {
        	        	
        	$sys_notifications[] = array( 'type' => 'danger', 'message' => $validator->errors()->first() );	

        	$request->session()->flash( 'sys_notifications', $sys_notifications );

            return back()->withInput( $request->all() );
        }

		$contact = Contact::create($request->all());

		if( $contact ){
			$sys_notifications[] = array( 'type' => 'success', 'message' => 'Contato salvo com sucesso!' );		   			
		}else{
			$sys_notifications[] = array( 'type' => 'danger', 'message' => 'Não foi possível salvar o contato!' );		   		
		}

	   	$request->session()->flash( 'sys_notifications', $sys_notifications );	   	

		return back()->withErrors($validator)->withInput($request->all()); 
	}

	/**
	 * Display the specified contact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contact = Contact::find($id);

		if( $contact ){
			$contact->load('category');
			if( Request::ajax() ){
				// return Response::json( $contact );         
				return View::make('contacts.panels.edit', compact('contact'));         
			}else{
				return View::make('contacts.edit', compact('contact'));         
			}			
		}
		
		$alert[] = [  'class' 	=> 'alert-danger',
					'message'   => '<strong><i class="fa fa-warning"></i></strong> contact não encontrado!' ];
		Session::flash('alerts', $alert);
		return Redirect::back()->withInput(Input::all());

	}

	/**
	 * Show the form for editing the specified contact.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contact  	= Contact::find($id);        		

		if( $contact ){						
			return view('contacts.edit', compact('contact'));			
		}else{
			$sys_notifications[] = array( 'type' => 'danger', 'message' => 'Usuário não encontrado!' );		   		
		}

	   	$request->session()->flash( 'sys_notifications', $sys_notifications );	   	

		return back()->withInput($request->all());
	}

	/**
	 * Update the specified contact in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$validator = Validator::make($request->all(), [
            'email' => 'required|max:255|email'            
        ]);		

        if ($validator->fails()) {        
        	$sys_notifications[] = array( 'type' => 'danger', 'message' => $validator->errors()->first() );	
        	$request->session()->flash( 'sys_notifications', $sys_notifications );
            return back()->withInput( $request->all() );
        }

		// UPDATE RESOURCE
		$contact = Contact::find($id);       
		$contact->update( $request->all() );

		$sys_notifications[] = array( 'type' => 'success', 'message' => 'Contato atualizado com sucesso!' );	
		$request->session()->flash( 'sys_notifications', $sys_notifications );

		return back()->withInput($request->all());
	}

	/**
	 * Remove the specified contact from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{		
		$contact = Contact::find($id);		
		if(!$contact){
			return back()->withInput( $request->all() );
		}

		if( $contact->destroy( $id ) ){
			$sys_notifications[] = array( 'type' => 'success', 'message' => '<strong><i class="fa fa-check"></i></strong> Contato excluído com sucesso!' );		   			
		}else{
			$sys_notifications[] = array( 'type' => 'danger', 'message' => '<strong><i class="fa fa-warning"></i></strong> Não foi possível excluir o contato!' );		   		
		}

	   	$request->session()->flash( 'sys_notifications', $sys_notifications );	   	

		return back()->withInput( $request->all() );
	}

}