<?php

class AlphaFaqCategory extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alpha_category';
	public $timestamps  = false;
	protected $primaryKey = 'cid';
	
}
