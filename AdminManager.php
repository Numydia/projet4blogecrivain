<?php

namespace Alaska2\Model;


class AdminManager extends Manager {

	public function checkLogin($pseudo, $password) {

		$db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, password FROM administrateur WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $admin = $req->fetch();
        $hash = sha1($_POST['password']);
       
        if ($admin['password'] == $hash) {
            $adminInfo = array(
               'pseudo' => $admin['pseudo']
            );
            return $adminInfo;
        } else {
            return false;
        }
    }
    

    public function isAdmin() {

    	if (isset($_SESSION['administrateur']) && !empty($_SESSION['administrateur'])) {
            return $_SESSION['administrateur'] === true;
        } else {
             return false;
        }
    }    



}