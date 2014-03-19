<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Helper
 */

namespace Welcoins;

use Welcoins\Parameter as Parameter;

class Helper
{
  const MAIN_MENU_ACTIVE_ANCHOR = 'header-menu-anchor-active';
  const MAIN_MENU_ANCHOR = 'header-menu-anchor';

  private $count = 0;

  public function mainMenuAnchor($id, $pathname, $value)
  {
    $classNames = [self::MAIN_MENU_ANCHOR];

    if (Parameter::get()->pageId === $id)
      array_push($classNames, self::MAIN_MENU_ACTIVE_ANCHOR);

    return '<a href="' .$pathname .'" class="' .implode(' ', $classNames) .'">' .$value .'</a>';
  }

  public function formTextInput(array $attrs, array $option = [])
  {
    $class = isset($attrs['class']) ? $attrs['class'] : [];
    $name = isset($attrs['name']) ? $attrs['name'] : '';
    $type = isset($attrs['type']) ? $attrs['type'] : 'text';
    $placeholder = isset($attrs['placeholder']) ? $attrs['placeholder'] : '';

    if (isset($attrs['value']))
      $value = $attrs['value'];
    else if (isset($option[$name]) && isset($option[$name]['value']))
      $value = $option[$name]['value'];
    else
      $value = '';

    if (isset($option['error']) && $option['error'] === true || isset($option[$name]) && $option[$name]['error'])
      array_push($class, 'form-error');

    $htmlAttrs = [
      'type="' .$type .'"',
      count($class) > 0 ? 'class="' .implode(' ', $class) .'"' : '',
      $name !== '' ? 'name="' .$name .'"' : '',
      $value !== '' ? 'value="' .$value .'"' : '',
      $placeholder !== '' ? 'placeholder="' .$placeholder .'"' : ''
    ];

    if (isset($attrs['textarea']))
      return '<textarea ' .implode(' ', $htmlAttrs) .'>' .$value .'</textarea>';

    return '<input ' .implode(' ', $htmlAttrs) .' />';
  }

  public function formRadioInput(array $attrs, array $option = [])
  {
    $class = isset($attrs['class']) ? $attrs['class'] : [];
    $name = isset($attrs['name']) ? $attrs['name'] : '';
    $value = isset($attrs['value']) ? $attrs['value'] : '';
    $for = isset($attrs['for']) ? $attrs['for'] : '';
    $label = isset($attrs['label']) ? $attrs['label'] : '';

    if (isset($attrs['checked']))
      $checked = true;
    else if (isset($option[$name]) && $option[$name]['value'] && $option[$name]['value'] === $value)
      $checked = true;
    else
      $checked = false;

    if (isset($option[$name]) && $option[$name]['error'])
      array_push($class, 'form-error');

    $htmlAttrs = [
      'type="radio"',
      count($class) > 0 ? 'class="' .implode(' ', $class) .'"' : '',
      $checked === true ? 'checked' : '',
      $name !== '' ? 'name="' .$name .'"' : '',
      $value !== '' ? 'value="' .$value .'"' : ''
    ];

    $elems = '<input ' .implode(' ', $htmlAttrs) .' />';
    $elems .= '<label ' .$this->markError($name, $option) .' for="' .$for .'">' .$label .'</label>';

    return $elems;
  }

  public function shouldAskAllergy(array $param)
  {
    return $param['gathering']['value'] === 'true' || $param['training']['value'] === 'true';
  }

  public function shouldAskReason(array $param)
  {
    return $param['training']['value'] === 'false';
  }

  public function formCount()
  {
    return ++$this->count;
  }

  public function isForAdmin($id, $pageId)
  {
    return $id === 'admin' && preg_match('/^(admin|password)$/', $pageId);
  }

  public function markError($key, array $param)
  {
    if (isset($param[$key]) && $param[$key]['error'])
      return 'class="form-error"';
    return '';
  }
}
