<?php

class User extends Model
{

	private $_isLoggedIn;
	private $_sessionName;

	public static $currentLoggedInUser = null;

	public function __construct($user = null)
	{
		parent::__construct("users");

		$this->_sessionName = SESSION_LOGGED_IN;
		$this->_softDelete = true;

		if ($user != null)
		{
			if (is_int($user))
			{
				$foundedUser = $this->_db->findFirst("users", ["conditions" => "id = ?", "bind" => [$user]]);
			}
			else
			{
				$foundedUser = $this->_db->findFirst("users", ["conditions" => "username = ?", "bind" => [$user]]);
			}

			if ($foundedUser)
			{
				foreach ($foundedUser as $key => $value)
				{
					$this->$key = $value;
				}
			}
		}
	}

	public function findByUsername($username)
	{
		return $this->findFirst(["conditions" => "username = ?", "bind" => [$username]]);
	}

}

?>