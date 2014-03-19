<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Component.HtmlComponent

 */

namespace Welcoins\Component;

class HtmlComponent
{
  const STYLESHEET_URI = '/stylesheets';
  const SCRIPT_URI = '/javascripts';

  public function styleSheet($pathname)
  {
    return '<link rel="stylesheet" href="' .self::STYLESHEET_URI ."/{$pathname}.css" .'" />';
  }

  public function script($pathname)
  {
    return '<script type="text/javascript" charset="utf-8" src="' .self::SCRIPT_URI ."/{$pathname}.js" .'"></script>';
  }
}
