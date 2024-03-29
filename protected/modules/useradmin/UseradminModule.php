<?php

class UseradminModule extends CWebModule
{
    public $layout = 'application.modules.useradmin.views.layouts.user_layout';
    public $module_name = 'User Management';
    //public $layout = 'application.views.layouts.column1';
    
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'useradmin.models.*',
			'useradmin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
