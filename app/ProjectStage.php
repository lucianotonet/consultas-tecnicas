<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model {

	protected $table = 'obras_etapas'; //project_stages
	public $timestamps = true;
	protected $fillable = array('name', 'project_id', 'description', 'owner_id', 'client_id');
	protected $visible = array('name', 'project_id', 'description', 'owner_id', 'client_id');

	public function getTechnicalConsults()
	{
		return $this->hasMany('\TechnicalConsult');
	}

	public function project()
	{
		return $this->belongsTo('\Project', 'obra_id');
	}

}