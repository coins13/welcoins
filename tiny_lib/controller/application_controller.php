<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Controller.ApplicationController
 */

namespace Welcoins\Controller;

use Welcoins\JsonManager as JsonManager;
use Welcoins\Controller\Controller as Controller;
use Welcoins\Utility\Hash as Hash;

class ApplicationController extends Controller
{
  const ERROR_PATH                = '/error';
  const REGISTER_PATH             = '/register';
  const REGISTER_ADDITIONAL_PATH  = '/register/additional';
  const REGISTER_CONFIRM_PATH     = '/register/confirm';
  const REGISTER_SENT_PATH        = '/register/sent';
  const ADMIN_PATH                = '/admin';
  const ADMIN_LOGIN_PATH          = '/admin/login';
  const ADMIN_LOGOUT_PATH         = '/admin/logout';
  const ADMIN_PASSWORD_PATH       = '/admin/password';

  protected $allowActions = [
    'register',    'additional', 'confirm',
    'sent',        'error',      'notFound',
    'serverError', 'admin',      'login',
    'logout',      'password'];

  public function __construct()
  {
    parent::__construct();
  }

  public function redirectDefault()
  {
    $this->redirect(self::REGISTER_PATH);
  }

  public function register()
  {
    $method = $this->parameter->requestMethod;

    if ($method === 'POST') {
      if (!$this->accept(self::REGISTER_PATH))
        $this->redirect(self::ERROR_PATH);

      $result = $this->validate('register', $this->parameter->post);

      if (!$result['error']) {
        $this->session->clear('base');
        $this->session->base = $result['parameters'];
        $this->redirect(self::REGISTER_ADDITIONAL_PATH);
      }

      $this->render('register', $result['parameters']);

    } else if ($method === 'GET') {
      if ($this->accept([self::REGISTER_ADDITIONAL_PATH, self::REGISTER_CONFIRM_PATH]) && $this->session->has('base'))
        $this->render('register', $this->session->base);
      else
        $this->session->clear(['base', 'additional']);
    }
  }

  public function additional()
  {
    $method = $this->parameter->requestMethod;
    
    if ($method === 'POST') {
      if (!$this->accept(self::REGISTER_ADDITIONAL_PATH) || !$this->session->has('base'))
        $this->redirect(self::ERROR_PATH);

      $omit = [];
      $base = $this->session->base;

      if ($base['training']['value'] === 'true')
        array_push($omit, 'reason');

      if ($base['gathering']['value'] === 'false' && $base['training']['value'] === 'false')
        array_push($omit, 'allergy');

      $result = $this->validate('additional', $this->parameter->post, $omit);

      if (!$result['error']) {
        $this->session->clear('additional');
        $this->session->additional = $result['parameters'];
        $this->redirect(self::REGISTER_CONFIRM_PATH);
      }

      $this->render('additional', array_merge($result['parameters'], $this->session->base));

    } else if ($method === 'GET' && $this->accept([self::REGISTER_CONFIRM_PATH, self::REGISTER_PATH])) {
      if ($this->session->has(['base', 'additional']))
        $this->render('additional', array_merge($this->session->base, $this->session->additional));
      else if ($this->session->has('base'))
        $this->render('additional', $this->session->base);
      else
        $this->redirect(self::ERROR_PATH);

    } else {
      $this->redirect(self::REGISTER_PATH);
    }
  }

  public function confirm()
  {
    $method = $this->parameter->requestMethod;

    if ($method === 'POST') {
      if (!$this->accept(self::REGISTER_CONFIRM_PATH) || !$this->session->has(['base', 'additional']))
        $this->redirect(self::ERROR_PATH);

      $result = $this->validate('confirm', $this->parameter->post);

      if ($result)
        $this->redirect(self::REGISTER_SENT_PATH);
      
      $this->redirect(self::ERROR_PATH);

    } else if ($method === 'GET' && $this->accept(self::REGISTER_ADDITIONAL_PATH)) {
      if ($this->session->has(['base', 'additional']))
        $this->render('confirm', $this->session);
      else
        $this->redirect(self::ERROR_PATH);

    } else {
      $this->redirect(self::REGISTER_PATH);
    }
  }

  public function sent()
  {
    if ($this->parameter->requestMethod !== 'GET'
      || !$this->accept(self::REGISTER_CONFIRM_PATH)
      || !$this->session->has(['base', 'additional']))
      $this->redirect(self::ERROR_PATH);

    $jsonManager = new JsonManager(DJ);
    $jsonManager->create(JsonManager::AUTO_INCREMENT);

    $data = array_merge($this->session->base, $this->session->additional);

    foreach ($data as $key => $datum)
      $jsonManager->{$key} = $datum['value'];

    $jsonManager->date = date('Y/m/d');
    $jsonManager->save();

    $this->session->destroy();
  }

  public function admin()
  {
    if (!$this->session->has('login') || $this->session->has('limited'))
      $this->redirect(self::ADMIN_LOGIN_PATH);

    $jsonManager = new JsonManager(DJ);
    $records = $jsonManager->read();
    $this->render('admin', $records);
  }

  public function password()
  {
    if (!$this->session->has('login'))
      $this->redirect(self::ADMIN_LOGIN_PATH);

    $method = $this->parameter->requestMethod;

    if ($method === 'POST') {
      if (!$this->accept(self::ADMIN_PASSWORD_PATH))
        $this->redirect(self::ERROR_PATH);

      $result = $this->validate('password', $this->parameter->post);

      if (!$result['error']) {
        $param = $result['parameters'];

        if ($param['password']['value'] === $param['recheck']['value']) {
          $jsonManager = new JsonManager(LJ);
          $jsonManager->modify('password');
          $jsonManager->set(Hash::mhash($this->session->username, $param['password']['value']));
          $jsonManager->save();

          if ($this->session->has('limited'))
            $this->redirect(self::ADMIN_LOGOUT_PATH);

          $this->render('password', ['success' => true]);
        }
      } else {
        $this->render('password', ['error' => true]);
      }
    }
  }

  public function login()
  {
    $method = $this->parameter->requestMethod;

    if ($method === 'POST') {
      if (!$this->accept(self::ADMIN_LOGIN_PATH))
        $this->redirect(self::ERROR_PATH);

      $post = $this->parameter->post;
      $result = $this->validate('login', $post);

      if (!$result['error']) {
        $jsonManager = new JsonManager(LJ);
        $json = $jsonManager->read();

        var_dump($json->password, Hash::mhash($post['username'], $post['password']));

        if ($json->username === $post['username'] && $json->password === Hash::mhash($post['username'], $post['password'])) {
          $this->session->login = true;
          $this->session->username = $json->username;
          $this->redirect(self::ADMIN_PATH);
        }
      }

      if (!$this->session->has('login'))
        $this->render('login', ['error' => true]);

    } else if ($method === 'GET') {
      if ($this->session->has('login') && !$this->session->has('limited'))
        $this->redirect(self::ADMIN_PATH);

      $jsonManager = new JsonManager(LJ);
      $json = $jsonManager->read();

      if (empty($json->password)) {
        $this->session->login = true;
        $this->session->username = $json->username;
        $this->session->limited = true;
        $this->redirect(self::ADMIN_PASSWORD_PATH);
      }
    }
  }

  public function logout()
  {
    if (!$this->session->has('login'))
      $this->redirect(self::ADMIN_LOGIN_PATH);

    $this->session->destroy();
    $this->redirect(self::ADMIN_LOGIN_PATH);
  }

  public function error()
  {}

  public function serverError()
  {}

  public function notFound()
  {}
}
