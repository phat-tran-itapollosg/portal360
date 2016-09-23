<?php

class AlphaNews extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alpha_news';
	public $timestamps  = true;
	protected $primaryKey = 'id';
	public function get_category_by_id_news()
    {
        return $this->hasMany('AlphaNewsCategory', 'idcate', 'nid');
    }

}
