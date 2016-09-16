<?php

// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableInterface;implements UserInterface, RemindableInterface 

class AlphaLessons extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alpha_lessons';
	public $timestamps  = false;
	protected $primaryKey = 'lesson_id';
}
