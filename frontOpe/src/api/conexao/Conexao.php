<?php
namespace Src\Api\Conexao;



require_once 'config.php';


class Conexao{


	private static $instance;

	public static function getInstance(){

		if(!isset(self::$instance)){

			try {
				self::$instance = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			} catch (\Exception $e) {
				echo $e->getMessage();
			}

		}

		return self::$instance;
	}

}