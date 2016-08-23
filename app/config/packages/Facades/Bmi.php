<?php namespace Philipbrown\Supyo\Facades;

use Illuminate\Support\Facades\Facade;

class Supyo extends Facade {

  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'supyo'; }

}
