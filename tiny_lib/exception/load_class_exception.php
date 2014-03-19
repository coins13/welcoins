<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Exception.LoadClassExceptEception.LoadClassExceptEception.LoadClassExceptEception.LoadClassException
 */

namespace Welcoins\Exception;

class LoadClassException extends \RuntimeException
{
  public function __construct($className, $filePath)
  {
    $this->className = $className;
    $this->filePath = $filePath;
    parent::__construct("The class '{$className}' could not be loaded after reading a file '{$filePath}'.");
  }
}
