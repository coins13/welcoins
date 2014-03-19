<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Router
 */

namespace Welcoins;

use Welcoins\Parameter as Parameter;
use Welcoins\Controller\ApplicationController as ApplicationController;
use Welcoins\Exception\RouteException as RouteException;

class Router
{
  private static $routes = array(
    '/'                     => array('id' => 'root',     'action' => 'redirect_default'),
    '/error'                => array('id' => 'error',    'action' => 'error'),
    '/register'             => array('id' => 'register', 'action' => 'register'),
    '/register/additional'  => array('id' => 'register', 'action' => 'additional'),
    '/register/confirm'     => array('id' => 'register', 'action' => 'confirm'),
    '/register/sent'        => array('id' => 'register', 'action' => 'sent'),
    '/admin'                => array('id' => 'admin',    'action' => 'admin'),
    '/admin/logout'         => array('id' => 'admin',    'action' => 'logout'),
    '/admin/login'          => array('id' => 'admin',    'action' => 'login'),
    '/admin/password'       => array('id' => 'admin',    'action' => 'password')
  );

  public static function dispatch()
  {
    $param = Parameter::get();
    $pathname = $param->pathname;

    foreach (self::$routes as $route => $data) {
      if (preg_match('/^' .preg_quote(BASE .$route, '/') .'$/', $pathname)) {
        $param->pageId = $data['id'];
        $controller = new ApplicationController;
        $controller->invokeAction($data['action']);
      }
    }

    if (!isset($controller))
      throw new RouteException($pathname);
  }
}
