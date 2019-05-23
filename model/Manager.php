<?php

namespace Alaska2\Model;


class Manager {


	protected $name;
	protected $config;
	protected $db;


	public function __construct() {

		if (!$this->config) {
			$this->config = require 'config.php';
		}
		if (!$this->name) {
			$this->name = $this->config['Site']['name'];
		}

	}


	protected function dbConnect() {

	    $db = new \PDO('mysql:host=localhost;dbname=alaska;charset=utf8', 'root', '');
	        
	    return $db;
    }


    public function isAdmin() {

    	return (new AdminManager())->isAdmin();
    }


} 