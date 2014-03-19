<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Controller.Controller
 */

namespace Welcoins\Controller;

use Welcoins\Parameter as Parameter;
use Welcoins\Renderer as Renderer;
use Welcoins\Validator\ApplicationValidator as ApplicationValidator;
use Welcoins\Exception\ActionException as ActionException;
use Welcoins\Component\SessionComponent as SessionComponent;

class Controller
{
  private $autoRendering = true;
  private $currentAction = null;

  public function __construct()
  {
    $this->parameter = Parameter::get();
    $this->session = new SessionComponent;
  }

  public function invokeAction($action)
  {
    $parts = explode('_', $action);
    $method = array_shift($parts);

    foreach ($parts as $part)
      $method .= ucfirst($part);

    if (!method_exists($this, $method) || !in_array($method, $this->allowActions))
      throw new ActionException($method);

    $this->session->start();

    $this->currentAction = $action;
    $this->{$method}();

    if ($this->autoRendering)
      $this->render($action);
  }

  public function accept($pathnames)
  {
    if (gettype($pathnames) !== 'array')
      $pathnames = [$pathnames];

    foreach ($pathnames as $pathname) {
      if($this->checkReferer($pathname))
        return true;
    }

    return false;
  }

  public function checkReferer($pathname)
  {
    $param = $this->parameter;
    $current = $param->https ? 'https://' : 'http://';
    $current .= $param->serverName .($param->port !== '80' ? ':' .$param->port : '');
    $current .= $pathname;

    $referer = explode('?', $param->referer);
    $referer = array_shift($referer);
    $referer = explode('#', $referer);
    $referer = array_shift($referer);

    return $current === $referer;
  }

  public function redirect($pathname)
  {
    header('HTTP/1.1 301 Moved Permanently');
    header("Location: {$pathname}");
    exit();
  }

  public function render($page, $option = [])
  {
    $renderer = new Renderer();
    $renderer->render($this->parameter->pageId, $page, $option);
    $this->autoRendering = false;
  }

  public function validate($id, array $post, array $omit = [])
  {
    $validator = new ApplicationValidator();
    return $validator->invokeValidation($id, $post, $omit);
  }
}
