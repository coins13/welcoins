<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Exception.RouteException
 */

namespace Welcoins\Exception;

class RouteException extends \RuntimeException
{
  public function __construct($route)
  {
    $this->route = $route;
    parent::__construct("The route '{$route}' is not found.");
  }
}
