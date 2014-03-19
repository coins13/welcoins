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
  protected $rules = [
    'register' => [
      'name' => [
        'rule' => 'string',
        'required' => true
      ],
      'ruby' => [
        'rule' => 'katakana',
        'required' => true
      ],
      'email' => [
        'rule' => 'email',
        'required' => true
      ],
      'gathering' => [
        'rule' => 'boolean',
        'required' => true
      ],
      'training' => [
        'rule' => 'boolean',
        'required' => true
      ]
    ],

    'additional' => [
      'allergy' => [
        'rule' => 'string',
        'allowEmpty' => true
      ],
      'reason' => [
        'rule' => 'string',
        'required' => true
      ],
      'question' => [
        'rule' => 'string',
        'allowEmpty' => true
      ]
    ],

    'confirm' => [
      'confirm' => [
        'rule' => 'boolean',
        'required' => true
      ]
    ],

    'login' => [
      'username' => [
        'rule' => 'alphaNumeric',
        'required' => true
      ],
      'password' => [
        'rule' => 'string',
        'required' => true
      ]
    ],

    'password' => [
      'password' => [
        'rule' => 'string',
        'required' => true
      ],
      'recheck' => [
        'rule' => 'string',
        'required' => true
      ]
    ]
  ];
}
