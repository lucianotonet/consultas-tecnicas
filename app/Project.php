<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	protected $table = 'obras'; //projects
	public $timestamps = true;	
	protected $fillable = array('title', 'description', 'status', 'date', 'owner_id', 'client_id');
	protected $visible = array('title', 'description', 'status', 'date', 'owner_id', 'client_id');
	
	public function owner()
	{
		return $this->belongsTo('App\User', 'owner_id');
	}	

	public function client()
	{
		return $this->belongsTo('App\Client');
	}	

	public function contacts()
	{
		return $this->hasMany('App\Contact');
	}

	public function stages()
	{
		return $this->hasMany('App\ProjectStage', 'obra_id');
	}

	function scopeForUser($query, $id)
	{
		if( !$id ){
			$id = Auth::id();
		}
		
	    $query->whereHas('user_id', function($query) use($id) {
	        $query->where('id', $id);
	    });
	}

}