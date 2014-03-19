<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Utility.Hash
 */

namespace Welcoins\Utility;

class Hash
{
  public static function mhash($salt, $password)
  {
    return bin2hex(mhash(MHASH_SHA256, $password, $salt));
  }
}
