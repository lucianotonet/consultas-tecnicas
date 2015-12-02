<?php namespace App\Http\Controllers;

use App\TechnicalConsult;
use Validator;
use Illuminate\Http\Request;

class TechnicalConsultController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index( Request $request ) {
		$consults 	= TechnicalConsult::orderBy( $request->input('order', 'id'), $request->input('orderby', 'DESC'))->paginate( $request->input('paginate', 50) );  	   			
	   	return view('technical_consults.index')->with('consults', $consults);
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
	public function show( $id ) {

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
