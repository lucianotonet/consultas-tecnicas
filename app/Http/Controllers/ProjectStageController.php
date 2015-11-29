<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectStage;


class ProjectStageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

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
	public function show( $obra_id = null, $id ) {
		$projectstage = ProjectStage::find( $id );
		// $projectstage = ProjectStage::all();
		return $projectstage;
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
	public function destroy( Request $request, $project_id = null, $id ) {		
		$projectstage = ProjectStage::find($id);        
        if(!$projectstage){
        	$this->sys_notifications[] = array( 'type' => 'danger', 'message' => '<i class="fa fa-warning"></i> Etapa não encontrada!' );                
            $request->session()->flash( 'sys_notifications', $this->sys_notifications );        
            return back()->withInput( $request->all() );
        }

        if( $projectstage->destroy( $id ) ){
            $this->sys_notifications[] = array( 'type' => 'success', 'message' => '<strong><i class="fa fa-check"></i></strong> Etapa excluída com sucesso!' );                   
        }else{
            $this->sys_notifications[] = array( 'type' => 'danger', 'message' => '<strong><i class="fa fa-warning"></i></strong> Não foi possível excluir a etapa da obra!' );                         
        }
        $request->session()->flash( 'sys_notifications', $this->sys_notifications );                    
        return app('Illuminate\Routing\UrlGenerator')->previous()->withInput( $request->all() );  
	}

}