<?php

define('BASE_URL','/payroll');
define('DB_HOST','127.0.0.1');
define('DB_DATABASE','payroll');
define('DB_USER','root');
define('DB_PASSWORD','');

session_start();

require 'autoload.php';
require 'routes.php';