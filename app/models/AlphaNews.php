<?php

class AlphaNews extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alpha_news';
	public $timestamps  = false;
	protected $primaryKey = 'id';
    public function categories()
    {
        return $this->hasOne('AlphaNewsCategory', 'idcate', 'nid');
    }

}
