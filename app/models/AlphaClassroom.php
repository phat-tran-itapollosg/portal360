<?php

// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableInterface;implements UserInterface, RemindableInterface 

class AlphaClassroom extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alpha_classroom';
	public $timestamps  = false;
	protected $primaryKey = 'classroom_id';
}
