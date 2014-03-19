<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Validator.ApplicationValidator
 */

namespace Welcoins\Validator;

use Welcoins\Validator\Validator as Validator;

class ApplicationValidator extends Validator
{
  protected $rules = array(
    'register' => array(
      'name' => array(
        'rule' => 'string',
        'required' => true
      ),
      'ruby' => array(
        'rule' => 'katakana',
        'required' => true
      ),
      'email' => array(
        'rule' => 'email',
        'required' => true
      ),
      'gathering' => array(
        'rule' => 'boolean',
        'required' => true
      ),
      'training' => array(
        'rule' => 'boolean',
        'required' => true
      )
    ),

    'additional' => array(
      'allergy' => array(
        'rule' => 'string',
        'allowEmpty' => true
      ),
      'reason' => array(
        'rule' => 'string',
        'required' => true
      ),
      'question' => array(
        'rule' => 'string',
        'allowEmpty' => true
      )
    ),

    'confirm' => array(
      'confirm' => array(
        'rule' => 'boolean',
        'required' => true
      )
    ),

    'login' => array(
      'username' => array(
        'rule' => 'alphaNumeric',
        'required' => true
      ),
      'password' => array(
        'rule' => 'string',
        'required' => true
      )
    ),

    'password' => array(
      'password' => array(
        'rule' => 'string',
        'required' => true
      ),
      'recheck' => array(
        'rule' => 'string',
        'required' => true
      )
    )
  );
}
