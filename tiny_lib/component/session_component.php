<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Component.SessionComponent
 */

namespace Welcoins\Component;

class SessionComponent
{
  public function start()
  {
    session_start();
    session_regenerate_id(true);
  }

  public function destroy()
  {
    $_SESSION = [];

    if (isset($_COOKIE[session_name()])) {
      $params = session_get_cookie_params();
      setCookie(session_name(), '', time() - 20000,
        $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    session_destroy();
  }

  public function clear($keys)
  {
    if (gettype($keys) !== 'array')
      $keys = [$keys];

    foreach ($keys as $key)
      if (isset($_SESSION[$key])) unset($_SESSION[$key]);
  }

  public function has($keys)
  {
    if (!isset($_SESSION))
      return false;

    if (gettype($keys) !== 'array')
      $keys = [$keys];

    $result = true;

    foreach ($keys as $key)
      if (!isset($_SESSION[$key])) $result = false;

    return $result;
  }

  public function __set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function __get($key)
  {
    return $_SESSION[$key];
  }

  public function __isset($key)
  {
    return isset($_SESSION[$key]);
  }
}
