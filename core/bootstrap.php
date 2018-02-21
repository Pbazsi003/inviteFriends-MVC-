<?php

require_once(ROOT . DS . "config" . DS . "configs.php");

require_once(ROOT . DS . "app" . DS . "lib" . DS . "helpers" . DS . "functions.php");

function __autoload($className)
{
	if (file_exists(ROOT . DS . "core" . DS . "classes" . DS . $className . ".php"))
	{
		require_once(ROOT . DS . "core" . DS . "classes" . DS . $className . ".php");
	}
	else if (file_exists(ROOT . DS . "app" . DS . "controllers" . DS . $className . ".php"))
	{
		require_once(ROOT . DS . "app" . DS . "controllers" . DS . $className . ".php");
	}
	else if (file_exists(ROOT . DS . "app" . DS . "models" . DS . $className . ".php"))
	{
		require_once(ROOT . DS . "app" . DS . "models" . DS . $className . ".php");
	}
}

$route = new Router;
$route->route($url);

?>