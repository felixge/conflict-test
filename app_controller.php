<?php
class AppController extends Controller{	
	var $components = array(
		"RequestHandler",
		"Authsome.Authsome" => array(
            "model" => "User"
        ),
        "DebugKit.Toolbar",
        "Session"
	);
	
	var $helpers = array(
		"Html",
		"Cms",
		"Form",
		"Javascript",
		"Session"
	);
	
	function beforeRender(){
		if(!isset($this->viewVars['aktive_navigation']))
			$this->set("aktive_navigation", "");
		if(isset($this->params['lang'])){
			$this->set("lang", $this->params['lang']);
		}
		else
			$this->set("lang", "de");
		
	}

	function beforeFilter(){
		$this->set("languages", array(
			"de" => "Deutsch",
			"en" => "English",
			"fr" => "Felix",
			"es" => "Espanol",
			"ca" => "Catalan"
		));
					
		if(isset($this->params['admin']) && $this->params['admin'])
		{
			$user = Authsome::get();
			if(!$user && $this->action != "admin_login"){
				
				$this->redirect(array("controller" => "users", "action" => "admin_login"));
			}
		}
		if(isset($this->params['manage']) && $this->params['manage'])
		{
		}
	}
}
?>