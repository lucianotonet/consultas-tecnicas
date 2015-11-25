<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	protected $table = 'contatos';
	public $timestamps = true;
	protected $fillable = array('email', 'name', 'company', 'address', 'phones', 'notes', 'owner_id', 'client_id');
	protected $visible = array('email', 'name', 'company', 'address', 'phones', 'notes', 'owner_id', 'client_id');

	public function owner()
	{
		return $this->belongsTo('\User');
	}

	public function projects()
	{
		return $this->belongsToMany('\Project');
	}

	public function getEmailMessages()
	{
		return $this->hasMany('\EmailMessage', 'to', 'from');
	}

}