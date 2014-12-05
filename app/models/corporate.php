<?php

class Corporate extends Eloquent  {
	public function Users()
	{
		return $this->hasMany('User');
	}

	public function Projects()
	{
		return $this->hasMany('Project');
	}
}
