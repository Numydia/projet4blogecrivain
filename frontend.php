<?php

namespace Alaska2\Controller;

use Alaska2\Model\Manager; 



// Loading classes
require_once "model/Manager.php";
require_once "model/ChapterManager.php";
require_once "model/CommentManager.php";
require_once "model/AdminManager.php";


class Frontend extends Manager {

	function home () {

		$chapterManager = new \Alaska2\Model\ChapterManager();
		$chapter = $chapterManager->getLastChapter();

		require ('view/frontend/indexView.php');
	}

	function contact () {

		require ('view/frontend/contactView.php');
	}

	function listChapters () {

		$chapterManager = new \Alaska2\Model\ChapterManager();
		$chapters = $chapterManager->getChapters();

		include 'view/frontend/listChaptersView.php';
	}


	function chapter() {

		$chapterManager = new \Alaska2\Model\ChapterManager();
		$chapter = $chapterManager->getChapter($_GET['id']);

		$commentManager = new \Alaska2\Model\CommentManager();
		$comments = $commentManager->getComments($_GET['id']);

		include 'view/frontend/chapterView.php';
	}


	function comment() {

		$commentManager = new \Alaska2\Model\CommentManager();
		$comment = $commentManager->getComment($_GET['id']);

		include 'view/frontend/commentView.php';
	}


	function addComment($chapterId, $author, $comment) {
 
        $commentManager = new \Alaska2\Model\CommentManager();
        $affectedLines = $commentManager->chapterComment($chapterId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=chapter&id=' . $chapterId);
        }
    }

    function signalComment($commentId, $chapterId) {
    
        $commentManager = new \Alaska2\Model\CommentManager();
        $signal = $commentManager->signalComment($commentId);
        if ($signal > 0) {
            header('Location: index.php?action=chapter&id=' . $chapterId);
        } 

        include 'view/frontend/commentView.php';
    }

    function commentsCount($id) {

    	$commentManager = new \Alaska2\Model\CommentManager();
    	$countComm = $commentManager->countComments($id);

        $data = [
            'countComm' => $countComm,
        ];

    	include 'view/frontend/chapterView.php';
    }


    function connexion($login, $password) {
    
        $adminManager = new \Alaska2\Model\AdminManager();
        $adminInfo = $adminManager->checkLogin($pseudo, $password);
        
        if ($adminInfo) {
        
            $_SESSION['administrateur'] = true;
            $_SESSION['pseudo'] = $adminInfo['pseudo'];
            
            header('Location: index.php?action=dashboard');
        } else {
            include 'view/frontend/connexionView.php';
        }
    }



} 