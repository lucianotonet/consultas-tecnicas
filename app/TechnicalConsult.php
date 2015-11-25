<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnicalConsult extends Model {

	protected $table = 'technical_consults';
	public $timestamps = true;
	protected $fillable = array('date', 'type', 'obra_etapa_id', 'owner_id');
	protected $visible = array('date', 'type', 'obra_etapa_id', 'owner_id');

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