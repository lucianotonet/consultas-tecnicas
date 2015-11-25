<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailMessage extends Model {

	protected $table = 'email_messages';
	public $timestamps = true;
	protected $fillable = array('subject', 'body_text', 'body_html', 'headers', 'consulta_tecnica_id');
	protected $visible = array('subject', 'body_text', 'body_html', 'headers', 'consulta_tecnica_id');

}