<?php

namespace App;

use App\Project;
use App\ProjectStage;

use Illuminate\Database\Eloquent\Model;

class TechnicalConsult extends Model {

	protected $table = 'consultas_tecnicas';
	public $timestamps = true;
	protected $fillable = array('date', 'type', 'title', 'description', 'status', 'project_id', 'project_stage_id', 'owner_id');
	protected $visible = array('id', 'date', 'type', 'title', 'description', 'status', 'project_id', 'project_stage_id', 'owner_id');

	public function status(){
		return $this->hasOne('\TechnicalConsultStatus');
	}

	public function emails(){
		return $this->hasMany('App\EmailMessage', 'consulta_tecnica_id');
	}

	public function type(){
		return $this->hasOne('\TechnicalConsultType');
	}

	public function project(){
		return $this->belongsTo('App\Project', 'project_id');
	}

	public function projectstage(){
		return $this->belongsTo('App\ProjectStage', 'project_stage_id');
	}	

}