<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Exception.ActionException
 */

namespace Welcoins\Exception;

class ActionException extends \RuntimeException
{
  public function __construct($action)
  {
    $this->action = $action;
    parent::__construct("The action '{$action}' could not be invoked.");
  }
}
