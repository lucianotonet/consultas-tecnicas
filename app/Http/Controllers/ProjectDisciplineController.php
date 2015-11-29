<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProjectDiscipline;

use App\Http\Controllers\Controller;

class ProjectDisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $projectstage = ProjectDiscipline::find($id);        
        if(!$projectstage){
            return back()->withInput( $request->all() );
        }

        if( $projectstage->destroy( $id ) ){
            $this->sys_notifications[] = array( 'type' => 'success', 'message' => '<strong><i class="fa fa-check"></i></strong> Disciplina excluída com sucesso!' );                   
            $request->session()->flash( 'sys_notifications', $this->sys_notifications );        
            return redirect( '/obras' );
        }else{
            $this->sys_notifications[] = array( 'type' => 'danger', 'message' => '<strong><i class="fa fa-warning"></i></strong> Não foi possível excluir a disciplina da obra!' );                
            $request->session()->flash( 'sys_notifications', $this->sys_notifications );        
            return back()->withInput( $request->all() );
        }
    }
}
