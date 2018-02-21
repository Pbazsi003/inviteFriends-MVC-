<?php

class Page extends Controller
{

	public function __construct($controller, $action)
	{
		parent::__construct($controller, $action);
	}

	public function registerAction()
	{
		$this->view->render("page/register");
	}

	public function loginAction()
	{
		$this->view->render("page/login");
	}

	public function logoutAction()
	{
		
	}

}

?>