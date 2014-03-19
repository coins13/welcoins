<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Exception.ClassFormatException
 */

namespace Welcoins\Exception;

class ClassFormatException extends \RuntimeException
{
  public function __construct($className)
  {
    $this->className = $className;
    parent::__construct("The class name '{$className}' is not match with class format.");
  }
}
