<?php
class Engine{
	static function start(){
		date_default_timezone_set('PRC');//时区设为东八区
		Config::init();

		$name = Config::get('dbConnectionName');
		if(!empty($name)){
			$host = Config::get('dbHost');
			$password = Config::get('dbPswd');
			Database::connect($host, $name, $password);
			Database::selectDatabase(Config::get('dbName'));			
		}

		self::control();
	}

	/*
	 * 控制中心
	 */
	private function control(){
		$tmp_uri = parseUrl();
		$method = getMethodName($tmp_uri);

		$action = Factory::getInstance('ActionController');
		call_user_func_array(array($action, $method), array());

		if(Config::get('log')){
			Log::trace('ActionController::'.$method);
		}
	}
}
?>