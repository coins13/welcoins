<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Renderer

 */

namespace Welcoins;

use Welcoins\Component\HtmlComponent as HtmlComponent;
use Welcoins\Helper as Helper;

/**
 * The renderer which renders HTML file.
 *
 * @package Welcoins.Renderer
 */
class Renderer
{
  public $html;
  private $helper;

  public function __construct()
  {
    $this->html = new HtmlComponent;
    $this->helper = new Helper;
  }

  public function __call($name, $args)
  {
    if (method_exists($this->helper, $name))
      return call_user_func_array(array($this->helper, $name), $args);

    throw new \RuntimeException("The method '{$name}' is not callable.");
  }

  public function render($dir, $page, $option = array())
  {
    $this->option = $option;
    $this->id = $dir;
    $this->pageId = $page;
    $this->currentPathname = "/{$dir}/${page}.php";
    echo $this->fetch(TD .'/layouts/main.php');
  }

  public function embedTemplate($pathname)
  {
    $pathname = TD . "/{$pathname}.php";

    if (!is_file($pathname))
      throw new \RuntimeException($pathname);

    return $this->fetch($pathname);
  }

  public function embedContent($pathname = null)
  {
    $pathname = TD .(is_null($pathname) ? $this->currentPathname : $pathname);

    if (!is_file($pathname))
      throw new \RuntimeException(_notFile($pathname));

    return $this->fetch($pathname);
  }

  public function fetch($pathname)
  {
    if (!is_file($pathname))
      throw new \RuntimeException(_notFile($pathname));

    ob_start();

    include($pathname);

    $data = ob_get_contents();
    ob_clean();

    return $this->removeBom($data);
  }

  public function removeBom($data)
  {
    if (!is_null($data) && count($data) >= 3 && ord($data[0]) === 0xEF && ord($data[1]) === 0xBB && ord($data[2]) === 0xBF)
      return substr($data, 3);

    return $data;
  }
}

function _notFile($filename)
{
  return "The file is not a regular file: {$filename}";
}
