<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Validator.Validator
 */

namespace Welcoins\Validator;

class Validator
{
  protected $rules = [];

  public function invokeValidation($id, array $param, array $omit = [])
  {
    $validation = $this->rules[$id];
    $result = ['error' => false, 'parameters' => []];

    foreach ($validation as $name => $case) {
      if (in_array($name, $omit)) continue;

      if (!isset($param[$name])) {
        $result['error'] = true;
        $result['parameters'][$name] = ['value' => '', 'error' => true];
      } else if (!$this->validate($case, $param[$name])) {
        $result['error'] = true;
        $result['parameters'][$name] = ['value' => $this->escape($param[$name]), 'error' => true];
      } else {
        $result['parameters'][$name] = ['value' => $this->escape($param[$name]), 'error' => false];
      }
    }

    return $result;
  }

  public function toJson($id, array $omit = [])
  {
    return json_decode($this->omit($omit, $this->validation[$id]));
  }

  private function validate(array $case, $value)
  {
    if (isset($case['required']) && $value === '')
      return false;

    switch ($case['rule'])
    {
      case 'alphaNumeric':
        if (preg_match('/[a-zA-Z0-9]+/', $value))
          $result = true;
        else
          $result = false;
        break;
      case 'boolean':
        if ($value === 'false' || $value === 'true')
          $result = true;
        else
          $result = false;
        break;
      case 'email':
        if (filter_var($value, FILTER_VALIDATE_EMAIL))
          $result = true;
        else
          $result = false;
        break;
      case 'katakana':
        if (preg_match('/[ァ-ヶー]+/u', $value))
          $result = true;
        else
          $result = false;
        break;
      case 'list':
        if (count(explode(',', $value)) > 0)
          $result = true;
        else
          $result = false;
        break;
      case 'string':
        $result = true;
        break;
      default:
        $result = false;
        break;
    }

    return $result;
  }

  private function escape($str)
  {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
}
