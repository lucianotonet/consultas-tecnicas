<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDiscipline extends Model
{
	protected $table = 'disciplinas'; //project_disciplines
	public $timestamps = true;
	protected $fillable = array('title', 'description', 'owner_id');
	protected $visible = array('title', 'description', 'owner_id');

	public function projects()
	{
		return $this->belongsToMany('App\Project', 'disciplina_obra', 'obra_id');
	}

}
