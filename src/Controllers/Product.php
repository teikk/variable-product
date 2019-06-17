<?php 
namespace TVP\Controllers;

use TVP\Traits\Singleton;

class Product extends Controller {
  use Singleton;

  public function hook() {
    add_action( 'woocommerce_dropdown_variation_attribute_options_html', [$this, 'displayCart'], 35, 2);

  }

  public function displayCart($html, $args) {
    $args = wp_parse_args(apply_filters('woocommerce_dropdown_variation_attribute_options_args', $args), array(
      'options'          => false,
      'attribute'        => false,
      'product'          => false,
      'selected'         => false,
      'name'             => '',
      'id'               => '',
      'class'            => '',
      'show_option_none' => __('Choose an option', 'woocommerce'),
    ));

    if(false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product) {
      $selected_key     = 'attribute_'.sanitize_title($args['attribute']);
      $args['selected'] = isset($_REQUEST[$selected_key])
                          ? wc_clean(wp_unslash($_REQUEST[$selected_key]))
                          : $args['product']->get_variation_default_attribute($args['attribute']);
    }

    $options               = $args['options'];
    $product               = $args['product'];
    $attribute             = $args['attribute'];
    $name                  = $args['name'] ? $args['name'] : 'attribute_'.sanitize_title($attribute);
    $id                    = $args['id'] ? $args['id'] : sanitize_title($attribute);
    $class                 = $args['class'];
    $show_option_none      = (bool)$args['show_option_none'];
    $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __('Choose an option', 'woocommerce');

    if(empty($options) && !empty($product) && !empty($attribute)) {
      $attributes = $product->get_variation_attributes();
      $options    = $attributes[$attribute];
    }
    ob_start();
    include TVP_DIR . 'templates/components/variation-radio.php';
    $radio = ob_get_clean();
    return $html.$radio;
  }
}