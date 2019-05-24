<?php

namespace Alaska2\Model;

require_once 'model/Manager.php';


class CommentManager extends Manager {


	public function getComments($chapterId) {

		$db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE chapter_id = ? ORDER BY id DESC');
        $comments->execute(array($chapterId));
        return $comments;
	}


	public function getComment($commentId) {

        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();
        return $comment;
    }


    public function chapterComment($chapterId, $author, $comment) {
 
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($chapterId, $author, $comment));
        return $affectedLines;
    }


    public function updateComment($comment_id, $chapter_id, $author, $comment) {

    	$db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET chapter_id= :chapter_id, author= :author, comment= :comment, comment_date= NOW() WHERE id= :comment_id');
        $comments->bindParam('chapter_id', $chapter_id, \PDO::PARAM_INT);
        $comments->bindParam('author',$author, \PDO::PARAM_STR);
        $comments->bindParam('comment',$comment, \PDO::PARAM_STR);
        $comments->bindParam('comment_id', $comment_id, \PDO::PARAM_INT);
        $updateComment = $comments->execute();
        return $updateComment;
    }

    public function deleteComments($chapter_id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE chapter_id = ?');
        $deleteComments = $comments->execute(array($chapter_id));
        return $deleteComments;
    }

    public function signalComment($commentId) {
 
        $db = $this-> dbConnect();
        $req = $db->prepare('UPDATE comments SET signal_comment = 1 WHERE id = ?');
        $req->execute(array($commentId));
        $signal = $req->rowCount(); 
       
        return $signal;         
    }

    public function getSignalComments() {

    	$db = $this->dbConnect();
        $comments = $db->query('SELECT comments.id, chapters.title, comments.chapter_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS comment_date_fr FROM comments INNER JOIN chapters ON chapters.id = comments.chapter_id WHERE signal_comment =1 ORDER BY comment_date DESC');
        
        return $comments;
    }

    public function deleteComment($id) {
    
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($id));
        $delete = $req->rowCount();
        
        return $delete;
    }

    public function approveComment($id) {
    
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET signal_comment = 0 WHERE id = ?');
        $req->execute(array($id));
        $signal = $req->rowCount(); 
       
        return $signal;     
    }

    public function countComments($id) {

    	$db = $this->dbConnect();
    	$comments = $db->query('SELECT comments.*, chapters.id FROM comments
                        INNER JOIN chapters
                        ON comments.chapter_id = chapters.id
                        WHERE chapters.id = :id ');
    	$comments->bind(':id', $id);
    	$comments->resultSet();
    	$results = $comments->rowCount();
        $data = [
            '$countComm' => $countComm,
        ];


    	return $results;
    }

    

}