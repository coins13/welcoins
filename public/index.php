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
// Library exception
define('LD', '../tiny_lib');
// Configration directory
define('CD', '../config');
// Datasheet path
define('DJ', '../data/datasheet.json');
// Admin profile file path
define('LJ', '../data/login.json');
// Exception directory.
define('ED', LD .'/exception');

require_once(LD .'/class_arbiter.php');
require_once(CD .'/config.php');

use Welcoins\ClassArbiter as ClassArbiter;
use Welcoins\Router as Router;

ClassArbiter::init();
Router::dispatch();
