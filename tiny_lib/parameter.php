<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Parameter
 */

namespace Welcoins;

final class Parameter
{
  public $get = [];
  public $post = [];
  public $serverName = '';
  public $pathinfo = '';
  public $pathname = '';
  public $referer = '';
  public $requestMethod = '';

  private static $parameter = null;

  private function __construct()
  {
    $this->get        = isset($_GET) ? $_GET : [];
    $this->post       = isset($_POST) ? $_POST : [];
    $this->port       = isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : '';
    $this->serverName = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '';
    $this->pathinfo   = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $this->referer    = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $this->requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '';
    $this->setPathname();
    $this->setProtocol();
  }

  private function setPathname()
  {
    $queries = explode('?', $_SERVER['REQUEST_URI']);
    $this->pathname = array_shift($queries);
  }

  private function setProtocol()
  {
    if (isset($_SERVER['HTTPS'])) {
      $this->protocol = 'https:';
      $this->https = true;
    } else {
      $this->protocol = 'http';
      $this->https = false;
    }
  }

  public static function get()
  {
    if (is_null(self::$parameter))
      self::$parameter = new self;

    return self::$parameter;
  }
}
