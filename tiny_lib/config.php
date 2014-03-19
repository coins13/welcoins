<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Config
 */

namespace Welcoins;

class Config
{
  public static function init()
  {
    ini_set('display_errors', 1);
    ini_set('short_open_tag', 1);
    ini_set('session.save_path', '/home/guest/shinkan/.session');
    date_default_timezone_set('Asia/Tokyo');
  }
}
