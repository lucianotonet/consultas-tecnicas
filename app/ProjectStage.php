<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model {

	protected $table = 'obras_etapas'; //project_stages
	public $timestamps = true;
	protected $fillable = array( 'title', 'project_id', 'description', 'status', 'owner_id' );
	protected $visible = array( 'id', 'title', 'project_id', 'description', 'status', 'owner_id' );

	public function technical_consults()
	{
		return $this->hasMany('App\TechnicalConsult', 'project_stage_id');
	}

	public function project()
	{
		return $this->belongsTo('App\Project', 'id', 'project_id');
	}

}