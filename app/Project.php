<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $with = ['lastCopy'];

	protected $fillable = [
		'name', 
		'ip', 
		'domain_name',
		'copy_files', 
		'ftp_port',
		'ftp_user',
		'ftp_password',
		'ftp_host',
		'db_user',
		'db_password',
		'db_host',
		'db_port',
		'db_connection',
		'db_name',
		'max_memory_gb',
	];

	// the folders of the project
	public function folders()
	{
		return $this->hasMany('App\Folder')
    			->orderBy('created_at','desc');
	}

	// copies of the project
	public function copies()
	{
    	return $this->hasMany('App\Copy')
    				->orderBy('created_at','desc');
	}

	// the last copy of the project
	public function lastCopy()
	{
    	return $this->hasMany('App\Copy')
	    			->orderBy('created_at','desc')
	    			->first();
	}

	// call to create a project
	public function create($request)
	{
		// hacemos el fill
		$this->fill($request->all());

	}


}
