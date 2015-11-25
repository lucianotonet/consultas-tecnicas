<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDiscipline extends Model
{
	protected $table = 'obras_disciplinas'; //project_stages
	public $timestamps = true;
	protected $fillable = array('name', 'project_id', 'description', 'client_id', 'owner_id');
	protected $visible = array('name', 'project_id', 'description', 'client_id', 'owner_id');

	public function project()
	{
		return $this->belongsTo('\Project');
	}

}
