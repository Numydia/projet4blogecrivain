<?php

namespace Alaska2\Model;

require_once "model/Manager.php";


class ChapterManager extends Manager {

	
	public function getLastChapter() {

		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, image, DATE_FORMAT(creation_date, \'%d/%m/%Y à %H:%i\') AS creation_date_fr FROM chapters ORDER BY creation_date DESC LIMIT 3');
		
        return $req;
	}

	public function getChapters() {

		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, image, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM chapters ORDER BY id ASC');

		return $req;
	}


	public function getChapter($chapter_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, image, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM chapters WHERE id = ?');
        $req->execute(array($chapter_id));
        $chapter = $req->fetch();

        return $chapter; 
    }


    public function updateChapter($id, $title, $content) {
      
        $db = $this->dbConnect();
        $chapter = $db->prepare('UPDATE chapters SET title = :title, content= :content, creation_date = NOW() WHERE id= :id');
        $chapter->bindParam('title', $title, \PDO::PARAM_STR);
        $chapter->bindParam('content', $content, \PDO::PARAM_STR);
        $chapter->bindParam('id', $id, \PDO::PARAM_INT);
        $updateChapter = $chapter->execute();

        return $updateChapter;
    }


    public function deleteChapter($chapter_id) {

    	$db = $this->dbConnect();
    	$chapter = $db->prepare('DELETE FROM chapters WHERE id = ?');
    	$deleteChapter = $chapter->execute(array($chapter_id));

    	return $deleteChapter;
    }

    public function addChapter($title, $content) {

		$db = $this->dbConnect();
        $chapter = $db->prepare('INSERT INTO chapters (title, content, creation_date)VALUES (?, ?, NOW())');
        $addChapter = $chapter->execute(array($title, $content));

        return $addChapter;    	
    }
    
}