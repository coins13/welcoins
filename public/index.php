<?php
/**
 * Welcoins Framework : welcoins developers of shinkan committee (https://www.coins.tsukuba.ac.jp/shinkan/14)
 *
 * The PHP file is a entry point of the welcoins website. All of the request must be sent to this file.
 *
 * @author  Saneyuki TADOKORO <s1311374@coins.tsukuba.ac.jp>
 * @package Public.Index
 */

// Directory separator of the system.
define('DS', DIRECTORY_SEPARATOR);
// Library root
define('ROOT', '../../welcoins');
// Document base
define('BASE', '/~shinkan/14');
// Library exception
define('LD', ROOT .'/tiny_lib');
// Configration directory
define('CD', ROOT .'/config');
// Datasheet path
define('DJ', ROOT .'/data/datasheet.json');
// Admin profile file path
define('LJ', ROOT .'/data/login.json');
// Template directory.
define('TD', ROOT .'/templates');
// Exception directory.
define('ED', LD .'/exception');

require_once(LD .'/class_arbiter.php');

use Welcoins\ClassArbiter as ClassArbiter;
use Welcoins\Router as Router;
use Welcoins\Config as Config;

ClassArbiter::init();
Config::init();
Router::dispatch();
