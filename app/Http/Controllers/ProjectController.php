<?php namespace App\Http\Controllers;

use App\Project;
use App\Client;

use Validator;
use Illuminate\Http\Request;

class ProjectController extends Controller {

    private $sys_notifications = array();

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Request $request ) {
        
        $projects  = Project::orderBy( $request->input( 'orderby', 'id' ), $request->input( 'order', 'ASC' ) )->paginate( $request->input( 'paginate', 50 ) );

        $user = $request->user();
        
        dd( $user->clients() );

        return view( 'projects.index' )->with( 'projects', $projects );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

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
        }

        $project->load('stages'); // Carrega etapas
        return view( 'projects.show' )->with( 'project', $project );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int     $id
     * @return Response
     */
    public function edit( $id ) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int     $id
     * @return Response
     */
    public function update( $id ) {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int     $id
     * @return Response
     */
    public function destroy( $id ) {

    }

}

?>
