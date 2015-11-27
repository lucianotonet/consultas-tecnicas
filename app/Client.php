<?php namespace App;

use App\Project;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	protected $table = 'clientes';
	public $timestamps = true;
	protected $fillable = array('email', 'name', 'company', 'address', 'phones', 'slug', 'owner_id');
	protected $visible = array('email', 'name', 'company', 'address', 'phones', 'slug', 'owner_id');

	protected $appends = array('slug');

	public function getSlugAttribute($value)
    {
    	$value = $this->name;

    	if (function_exists('iconv')) {
	        $value = @iconv('UTF-8', 'ASCII//TRANSLIT', $value);
	    }
	    $value = preg_replace("/[^a-zA-Z0-9 -]/", "", $value);
	    $value = strtolower($value);
	    $value = str_replace(" ", "-", $value);	  

    	return strtolower($value);
    }

    public function setSlugAttribute($value)
    {
    	$value = $this->name;

    	if (function_exists('iconv')) {
	        $value = @iconv('UTF-8', 'ASCII//TRANSLIT', $value);
	    }
	    $value = preg_replace("/[^a-zA-Z0-9 -]/", "", $value);
	    $value = strtolower($value);
	    $value = str_replace(" ", "-", $value);	  

        $this->attributes['slug'] = strtolower($value);
    }
	
	public function projects()
	{
		return $this->hasMany('App\Project', 'client_id');
	}

	public function owner()
	{
		return $this->belongsTo('App\User');
	}

}