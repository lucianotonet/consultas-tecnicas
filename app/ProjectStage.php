<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model {

	protected $table = 'obras_etapas'; //project_stages
	public $timestamps = true;
	protected $fillable = array('name', 'project_id', 'description', 'owner_id');
	protected $visible = array('name', 'project_id', 'description', 'owner_id');

	public function tecnhical_consults()
	{
		return $this->hasMany('App\TechnicalConsult');
	}

	public function project()
	{
		return $this->belongsTo('App\Project', 'id', 'project_id');
	}

}