<?php

class Project extends Eloquent  {
	
    //protect against mass assignment
    protected $guarded = array('id');

	public function Corporate()
	{
		return $this->belongsTo('Corporate');
	}
}
