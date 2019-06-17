<?php
namespace TVP\Traits;

trait Singleton {
  protected static $instance = NULL;
  public static function instance() {
    // create an object
    NULL === self::$instance and self::$instance = new self;

    return self::$instance; // return the object
  }
}