<?php

class Router
{

	public static function route($url)
	{
		$controller = (isset($url[0]) && $url[0] != "") ? ucwords($url[0]) : DEFAULT_CONTROLLER;
		$controllerName = $controller;

		array_shift($url);

		$action = (isset($url[0]) && $url[0] != "") ? $url[0] . "Action" : "indexAction";
		$actionName = $action;

		array_shift($url);

		$grantAccess = self::hasAccess($controllerName, $actionName);

		if (!$grantAccess)
		{
			$controllerName = $controller = ACCESS_RESTRICTED;
			$action = "indexAction";
		}

		$queryParams = $url;

		if (class_exists($controllerName))
		{
			if ($controllerName == "Profile")
			{
				$controller = new $controller($controller, "indexAction");
				$controller->indexAction();
			}
			else
			{
				$dispatch = new $controller($controllerName, $action);

				if (method_exists($controller, $action))
				{
					call_user_func_array([$dispatch, $action], $queryParams);
				}
				else
				{
					die("That method \"" . $action . "\" does not exists in the controller \"". $controllerName . "\"!");
				}
			}
		}
		else
		{
			die("That controller \"" . $controllerName . "\" does not exists!");
		}
	}

	public static function hasAccess($controllerName = DEFAULT_CONTROLLER, $actionName = "indexAction")
	{
		$aclFile = file_get_contents(ROOT . DS . "app" . DS . "acl.json");
		$acl = json_decode($aclFile);
		$currentUserAcls = ["Guest"];
		$grantAccess = false;

		foreach ($currentUserAcls as $level)
		{
			if (array_key_exists($level, $acl) && array_key_exists($controllerName, $acl->$level))
			{
				if (in_array($actionName, $acl->$level->$controllerName) || in_array("*", $acl->$level->$controllerName))
				{
					$grantAccess = true;

					break;
				}
			}
		}

		foreach ($currentUserAcls as $level)
		{
			$denied = $acl->$level->denied;

			if (!empty($denied) && array_key_exists($controllerName, $denied) && in_array($actionName, $denied->$controllerName))
			{
				$grantAccess = false;

				break;
			}
		}

		return $grantAccess;
	}

	public static function getMenu($menu)
	{
		$menuArray = [];
		$menuFile = file_get_contents(ROOT . DS . "app" . DS . $menu . ".json");
		$acl = json_decode($menuFile, true);
		$currentUserAcls = ["Guest"];

		foreach ($currentUserAcls as $level)
		{
			if (array_key_exists($level, $acl))
			{
				foreach ($acl[$level] as $key => $value)
				{
					if (is_array($value))
					{
						$submenu = [];

						foreach ($value as $k => $v)
						{
							if ($finalValue = self::getLink($v))
							{
								$submenu[$k] = $finalValue;
							}
						}

						if (!empty($submenu))
						{
							$menuArray[$key] = $submenu;
						}
					}
					else
					{
						if ($finalValue = self::getLink($value))
						{
							$menuArray[$key] = $finalValue;	
						}
					}
				}
			}
		}

		return $menuArray;
	}

	public static function getCSSFiles()
	{
		$cssArray = [];
		$cssFile = file_get_contents(ROOT . DS . "app" . DS . "css_acl.json");
		$css = json_decode($cssFile, true);

		foreach ($css as $files => $path)
		{
			$cssArray[$path] = self::getLink("assets/styles/" . $path . $files . ".css");
		}

		return $cssArray;
	}

	public static function getJSFiles()
	{
		$cssArray = [];
		$cssFile = file_get_contents(ROOT . DS . "app" . DS . "js_acl.json");
		$css = json_decode($cssFile, true);

		foreach ($css as $files => $path)
		{
			$cssArray[$path] = self::getLink("assets/scripts/" . $path . $files . ".js");
		}

		return $cssArray;
	}

	private static function getLink($value)
	{
		if (preg_match("/https?:\/\//", $value) == 1)
		{
			return $value;
		}

		return DEFAULT_URL . "/" . $value;
	}

}

?>