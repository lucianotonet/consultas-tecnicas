<?php 

namespace App\Http\Controllers;
use App\Client;
use Validator;
use Illuminate\Http\Request;
use App\Helpers\Alfred;

class ClientController extends Controller {


	private $sys_notifications = array();

   /**
    * Display a listing of clients
    *
    * @return Response
    */
   public function index(Request $request)
   {   		 		
   		$clients = $request->user()->clients;
	   	return view('clients.index')->with('clients', $clients);
   }

	/**
	 * Show the form for creating a new client
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clients.create');		
	}

	/**
	 * Store a newly created client in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'email' => 'required|unique:clientes|max:255|email'          
        ]);		

        if ($validator->fails()) {
        	        	
        	$this->sys_notifications[] = array( 'type' => 'danger', 'message' => $validator->errors()->first() );	

        	$request->session()->flash( 'sys_notifications', $this->sys_notifications );

            return back()->withInput( $request->all() );
        }

        $data = $request->all();
        $data['slug'] = Alfred::toSlug( $data['name'] );
        $data['owner_id'] = $request->user()->id;

        // Create a new Client
		$client = Client::create( $data );

		if( $client ){
			$this->sys_notifications[] = array( 'type' => 'success', 'message' => 'Cliente salvo com sucesso!' );		   			
		}else{
			$this->sys_notifications[] = array( 'type' => 'danger', 'message' => 'Não foi possível criar o cliente!' );		   		
		}

	   	$request->session()->flash( 'sys_notifications', $this->sys_notifications );	   	

		return back()->withErrors($validator)->withInput($request->all()); 
	}

	/**
	 * Display the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( $id, Request $request )
	{
		$client  	= Client::where( 'id', $id )->first();  

		if( $client ){				
			return view('clients.show')->with(['client'=>$client]);			
		}

		$this->sys_notifications[] = array( 'type' => 'danger', 'message' => 'Cliente não encontrado!' );		   		
	   	$request->session()->flash( 'sys_notifications', $this->sys_notifications );	   	

		return back();
	}

	/**
	 * Display the specified client by SLUG.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showBySlug( $slug, Request $request )
	{
		$client = Client::where( 'slug', 'like', $slug )->first();

		if( $client ){			
			return $this->show( $client->id, $request );			
		}else{		

			$this->sys_notifications[] = array( 'type' => 'danger', 'message' => 'Cliente slug não encontrado!' );		   		
		   	$request->session()->flash( 'sys_notifications', $this->sys_notifications );

			return redirect('/');
		}
	}

	/**
	 * Show the form for editing the specified client.
	 *
	 * @param  int  $slug
	 * @return Response
	 */
	public function edit($slug, Request $request)
	{
		$client = Client::where('slug',$slug)->first();      		

		if( $client ){						
			return view('clients.edit', compact('client'));			
		}else{
			$this->sys_notifications[] = array( 'type' => 'danger', 'message' => 'Cliente não encontrado!' );		   		
	   		$request->session()->flash( 'sys_notifications', $this->sys_notifications );	   	
		}

		return back()->withInput($request->all());
	}

	/**
	 * Update the specified client in storage.
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
        	$this->sys_notifications[] = array( 'type' => 'danger', 'message' => $validator->errors()->first() );	
        	$request->session()->flash( 'sys_notifications', $this->sys_notifications );
            return back()->withInput( $request->all() );
        }

		// UPDATE RESOURCE
		$client = Client::find($id);       
		$client->update( $request->all() );

		$this->sys_notifications[] = array( 'type' => 'success', 'message' => 'Cliente atualizado com sucesso!' );	
		$request->session()->flash( 'sys_notifications', $this->sys_notifications );

		return back()->withInput($request->all());
	}

	/**
	 * Remove the specified client from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{		
		$client = Client::find($id);		
		if(!$client){
			return back()->withInput( $request->all() );
		}

		if( $client->destroy( $id ) ){
			$this->sys_notifications[] = array( 'type' => 'success', 'message' => '<strong><i class="fa fa-check"></i></strong> Cliente excluído com sucesso!' );		   			
		}else{
			$this->sys_notifications[] = array( 'type' => 'danger', 'message' => '<strong><i class="fa fa-warning"></i></strong> Não foi possível excluir o cliente!' );		   		
		}

	   	$request->session()->flash( 'sys_notifications', $this->sys_notifications );	   	

		return back()->withInput( $request->all() );
	}

}