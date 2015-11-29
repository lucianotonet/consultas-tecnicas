<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicalConsult extends Model {

	protected $table = 'consultas_tecnicas';
	public $timestamps = true;
	protected $fillable = array('date', 'type', 'project_stage_id', 'owner_id');
	protected $visible = array('date', 'type', 'project_stage_id', 'owner_id');

	public function getStatus()
	{
		return $this->hasOne('\TechnicalConsultStatus');
	}

	public function getEmailMessages()
	{
		return $this->hasMany('EmailMessage');
	}

	public function getType()
	{
		return $this->hasOne('\TechnicalConsultType');
	}

}