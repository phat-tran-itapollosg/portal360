<?php

class AlphaNewsCategory extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alpha_ncategory';
	public $timestamps  = false;
	protected $primaryKey = 'nid';
}
