<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailMessage extends Model {

	protected $table = 'email_messages';
	public $timestamps = true;
	protected $fillable = array( 'from', 'to', 'subject', 'body_text', 'body_html', 'headers', 'consulta_tecnica_id');
	protected $visible = array( 'from', 'to', 'subject', 'body_text', 'body_html', 'headers', 'consulta_tecnica_id');

	public function tecnhical_consult()
	{
		return $this->belongsTo('App\TechnicalConsult');
	}

}