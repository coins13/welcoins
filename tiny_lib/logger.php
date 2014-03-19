<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Logger

 */

namespace Welcoins;

class Logger
{
  private $log = array();
  private $errorLog = array();

  public function dumpError($obj)
  {
    array_push($this->errorLog, $obj);
    var_dump($obj);
  }

  public function dump($obj)
  {
    array_push($this->log, $obj);
  }
}
