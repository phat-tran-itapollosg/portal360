<?php

class AlphaFaq extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alpha_faq';
	public $timestamps  = false;
	protected $primaryKey = 'id';
	public function categories()
    {
        return $this->hasOne('AlphaFaqCategory', 'cid', 'idcate');
    }
}
