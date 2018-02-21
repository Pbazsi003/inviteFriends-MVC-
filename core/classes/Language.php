<?php

class Language
{

	protected static $_language;

	public function __construct()
	{
		self::$_language = "hu_HU";
	}

	public static function get($value)
	{
		$languageFile = file_get_contents(ROOT . DS . "app" . DS . "languages" . DS . "hu_HU.json");
		$language = json_decode($languageFile);

		return $language->$value;
	}

}

?>