<?php 
namespace TVP;

use TVP\Controllers\Controller;
use TVP\Controllers\Product;
use TVP\Traits\Singleton;

class Plugin extends Controller {
  use Singleton;
  public function hook() {
    Product::instance()->hook();
  }
}