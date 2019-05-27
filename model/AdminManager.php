<?php

namespace Alaska2\Model;


class AdminManager extends Manager {

	public function checkLogin($pseudo) {

		$db = $this->dbConnect();
        $req = $db->prepare('SELECT id, id_group, pseudo, password FROM administrateur WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $user = $req->fetch();

        return $user;
       
        
    }
    

   /* public function isAdmin() {

    	if (isset($_SESSION['administrateur']) && !empty($_SESSION['administrateur'])) {
            return $_SESSION['administrateur'] === true;
        } else {
             return false;
        }
    }    */



}