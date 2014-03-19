<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Welcoins.Main
 */

namespace Welcoins;

require_once(ED .'/load_class_exception.php');
require_once(ED .'/class_format_exception.php');

use Welcoins\Exception\LoadClassException as LoadClassException;
use Welcoins\Exception\ClassFormatException as ClassFormatException;

/**
 * Main class of welcoins framework
 *
 * @package Main
 */
class ClassArbiter
{
  /**
   * The class prefix.
   *
   * @var string
   */
  const CLASS_PREFIX = 'Welcoins\\';

  /**
   * The class separator.
   *
   * @var string
   */
  const CLASS_SEPARATOR = '\\';

  /**
   * The extension of php file.
  
   * @var string
   */
  const EXTENSION = '.php';

  /**
   * The class format. All of the classes in the welcoins framewark must follow this format.
   *
   * @var string
   */
  private static $classFormat = '/^$/';

  /**
   * Apply framework settings.
   *
   * @return void
   */
  public static function init()
  {
    self::$classFormat = '/^'
      . preg_quote(self::CLASS_PREFIX)
      . '[a-zA-Z][a-zA-Z0-9]*('
      . preg_quote(self::CLASS_SEPARATOR)
      . '[a-zA-Z][a-zA-Z0-9]*)*$/';

    spl_autoload_register(array('self', 'loadClass'));
    set_exception_handler(array('Welcoins\\Exception\\ExceptionHandler', 'handle'));
  }

  /**
   * Handle class loading.
   *
   * @param   string $className
   * @return  void
   */
  private static function loadClass($prcn)
  {
    if (!preg_match(self::$classFormat, $prcn))
      throw new ClassFormatException($prcn);

    // Remove class prefix from the class name.
    $className = substr($prcn, strlen(self::CLASS_PREFIX));

    // Replace the class name with specify directory format and lower it.
    $className = strtolower(preg_replace('/([a-z])([A-Z])/' ,'$1_$2', $className));

    // Parse class name as path.
    $path = __DIR__ . DS
      . str_replace(self::CLASS_SEPARATOR, DS, $className)
      . self::EXTENSION;

    // If the given file is not a regular file, abort loading.
    if (!is_file($path))
      throw new LoadClassException($prcn, $path);

    require_once($path);
  }
}
