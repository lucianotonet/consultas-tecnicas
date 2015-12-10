<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Client;
use App\Contact;
use App\Project;
use App\ProjectStage;
use App\TechnicalConsult;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $resource_name = null, $resource_id = null, $resource_relationship = null, $resource_relationship_id = null, $related_related_resource = null)
    {
        $status = array();

        if( $request->user()->$resource_name ){
            
            if( $request->user()->$resource_name->find($resource_id) ){
                
                if( $resource_relationship != null && $request->user()->$resource_name->find($resource_id)->{$resource_relationship} ){
                    
                    if( $resource_relationship_id != null && $request->user()->$resource_name->find($resource_id)->{$resource_relationship}->find($resource_relationship_id) ){
                        
                         if( $related_related_resource != null && $request->user()->$resource_name->find($resource_id)->{$resource_relationship}->find($resource_relationship_id)->{$related_related_resource} ){
                    
                            $return = $request->user()->$resource_name->find($resource_id)->{$resource_relationship}->find($resource_relationship_id)->{$related_related_resource};
                            if( $request->ajax() ){ return $return; }
                            else{ dd( $return ); };

                        }

                        $return = $request->user()->$resource_name->find($resource_id)->{$resource_relationship}->find($resource_relationship_id);
                        if( $request->ajax() ){ return $return; }
                        else{ dd( $return ); };

                    }

                    $return = $request->user()->$resource_name->find($resource_id)->{$resource_relationship};
                    if( $request->ajax() ){ return $return; }
                    else{ dd( $return ); };

                }

                $return = $request->user()->$resource_name->find($resource_id);
                if( $request->ajax() ){ return $return; }
                else{ dd( $return ); }

            }

            $return = $request->user()->$resource_name;
            if( $request->ajax() ){ return $return; }
            else{ dd($return); }

        }
        else{
            $status['error'] = ':(';
            $return = $status;
            if( $request->ajax() ){ return $return; }
            else{ dd($status); }
        }




        if( $resource_id != null && $resource_name != null && $resource_relationship = null ){

            if( $request->user()->$resource_name ){
                $resource = $request->user()->$resource_name->find($resource_id);
                $status[ $resource_name ] = $resource;
                return $status;
            }else{
                $status['error'] = ':(';
                return $status;
            }

        }else
        if( $resource_id != null && $resource_name != null ){

            if( $request->user()->$resource_name ){
                $resource = $request->user()->$resource_name->find($resource_id);
                $status[ $resource_name ] = $resource;
                return $status;
            }else{
                $status['error'] = ':(';
                return $status;
            }

        }else
        if( $resource_name != null ){

            if( $request->user()->$resource_name ){
                $status[ $resource_name ] = $request->user()->$resource_name->toArray();
                return $status;
            }else{
                $status['error'] = ':(';
                return $status;
            }

        }

        $status['clientes'] = $request->user()->clients->toArray();
        $status['contatos'] = $request->user()->contacts->toArray();
        $status['obras'] = $request->user()->projects->toArray();
        $status['consultas-tecnicas'] = $request->user()->tecnhical_consults->toArray();

        return $status;
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
    public function store(Request $request, $resource_name = null, $resource_id = null, $resource_relationship = null, $resource_relationship_id = null, $related_related_resource = null)
    {
        $status = array();

        if( $request->user()->$resource_name ){
            
            if( $request->user()->$resource_name->find($resource_id) ){
                
                if( $resource_relationship != null && $request->user()->$resource_name->find($resource_id)->{$resource_relationship} ){
                    
                    if( $resource_relationship_id != null && $request->user()->$resource_name->find($resource_id)->{$resource_relationship}->find($resource_relationship_id) ){
                        
                         if( $related_related_resource != null && $request->user()->$resource_name->find($resource_id)->{$resource_relationship}->find($resource_relationship_id)->{$related_related_resource} ){
                    
                            $return = $request->user()->$resource_name->find($resource_id)->{$resource_relationship}->find($resource_relationship_id)->{$related_related_resource};
                            
                            if( $request->ajax() ){ return $return; }
                            else{ dd( $return ); };

                        }

                        $return = $request->user()->$resource_name->find($resource_id)->{$resource_relationship}->find($resource_relationship_id);
                        if( $request->ajax() ){ return $return; }
                        else{ dd( $return ); };

                    }

                    $return = $request->user()->$resource_name->find($resource_id)->{$resource_relationship};
                    if( $request->ajax() ){ return $return; }
                    else{ dd( $return ); };

                }

                $return = $request->user()->$resource_name->find($resource_id);
                if( $request->ajax() ){ return $return; }
                else{ dd( $return ); }

            }

            $return = $request->user()->$resource_name;
            if( $request->ajax() ){ return $return; }
            else{ dd($return); }

        }
        else{
            $status['error'] = ':(';
            $return = $status;
            if( $request->ajax() ){ return $return; }
            else{ dd($status); }
        }




        if( $resource_id != null && $resource_name != null && $resource_relationship = null ){

            if( $request->user()->$resource_name ){
                $resource = $request->user()->$resource_name->find($resource_id);
                $status[ $resource_name ] = $resource;
                return $status;
            }else{
                $status['error'] = ':(';
                return $status;
            }

        }else
        if( $resource_id != null && $resource_name != null ){

            if( $request->user()->$resource_name ){
                $resource = $request->user()->$resource_name->find($resource_id);
                $status[ $resource_name ] = $resource;
                return $status;
            }else{
                $status['error'] = ':(';
                return $status;
            }

        }else
        if( $resource_name != null ){

            if( $request->user()->$resource_name ){
                $status[ $resource_name ] = $request->user()->$resource_name->toArray();
                return $status;
            }else{
                $status['error'] = ':(';
                return $status;
            }

        }

        $status['clientes'] = $request->user()->clients->toArray();
        $status['contatos'] = $request->user()->contacts->toArray();
        $status['obras'] = $request->user()->projects->toArray();
        $status['consultas-tecnicas'] = $request->user()->tecnhical_consults->toArray();

        return $status;    
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
    public function destroy($id)
    {
        //
    }
}
