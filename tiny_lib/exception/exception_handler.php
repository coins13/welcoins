<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Exception.ExceptionHandler

 */

namespace Welcoins\Exception;

use Welcoins\Controller\ApplicationController as ApplicationController;
use Welcoins\Parameter as Parameter;
use Welcoins\Logger as Logger;
use Welcoins\Exception\RouteException as RouteException;
use Welcoins\Exception\ActionException as ActionException;

final class ExceptionHandler
{
  public static function handle($exception)
  {
    Parameter::get()->pageId = 'error';

    $logger = new Logger;
    $logger->dumpError($exception->getMessage());

    $controller = new ApplicationController;

    if (self::isForNotFound($exception))
      $controller->invokeAction('not_found');
    else
      $controller->invokeAction('server_error');

    return true;
  }

  private static function isForNotFound($exception)
  {
    return $exception instanceof ActionException || $exception instanceof RouteException;
  }
}
