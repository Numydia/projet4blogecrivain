<?php

namespace Alaska2\Controller;

use Alaska2\Model\Manager; 



// Loading classes
require_once "model/Manager.php";
require_once "model/ChapterManager.php";
require_once "model/CommentManager.php";
require_once "model/AdminManager.php";



class Backend extends Manager {

	
	/* =====================
	=============== Chapters
	======================*/
	function listChaptersBackend() {
    
        $chapterManager = new \Alaska2\Model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        include 'view/backend/listChaptersViewBackend.php';
    }

    function chapterBackend() {
    
        $chapterManager = new \Alaska2\Model\ChapterManager();
        $commentManager = new \Alaska2\Model\CommentManager();

        $chapter = $chapterManager->getChapter($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        include 'view/backend/chapterViewBackend.php';
    }

    function adminUpdateChapter() {

    	$chapterManager = new \Alaska2\Model\ChapterManager();
    	$chapter = $chapterManager->getChapter($_GET['id']);

    	require ('view/backend/editChapter.php');
    }	


    function updateChapter($id, $title, $content) {
       
        $chapterManager = new \Alaska2\Model\ChapterManager();
        $updateChapter = $chapterManager->updateChapter($id, $title, $content);
        
        if ($updateChapter === false) {
            throw new Exception('Impossible de modifier ce chapitre !');
        } else {
            header('Location: index.php?action=listChaptersBackend');
        }
    }

    function addCommentBackend($chapterId, $author, $comment) {
 
        $commentManager = new \Alaska2\Model\CommentManager();
        $affectedLines = $commentManager->chapterComment($chapterId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=chapterBackend&id=' . $chapterId);
        }
    }

    
    function deleteChapter($chapter_id) {

    	$chapterManager = new \Alaska2\Model\ChapterManager();
    	$commentManager = new \Alaska2\Model\CommentManager();

    	$deleteChapter = $chapterManager->deleteChapter($chapter_id);
    	$deleteComments = $commentManager->deleteComments($chapter_id);

    	if ($deleteChapter === false) {
    		throw new Exception('Impossible de supprimer le chapitre');
    	}
    	elseif ($deleteComments === false) {
    		throw new Exception('Impossible de supprimer les commentaires du chapitre');
    	}
    	else {
    		header('Location: index.php?action=listChaptersBackend');
    	}
    }

    function adminNewChapter() {

    	require ('view/backend/newChapterView.php');
    }

    function newChapter($title, $content, $image) {

    	$chapterManager = new \Alaska2\Model\ChapterManager();
    	$addChapter = $chapterManager->addChapter($title, $content, $image);

    	header('Location: index.php?action=listChaptersBackend');
    }

    /* =====================
	=============== Comments
	======================*/

	function adminUpdateComment() {

		$chapterManager = new \Alaska2\Model\ChapterManager();
		$commentManager = new \Alaska2\Model\CommentManager();

		$chapter = $chapterManager->getChapter($_GET['chapter_id']);
		$comment = $commentManager->getComment($_GET['id']);

		require ('view/backend/updateCommentView.php');
	}

	function updateComment($comment_id, $chapter_id, $author, $comment) {

		$commentManager = new \Alaska2\Model\CommentManager();

		$updateComment = $commentManager->updateComment($comment_id, $chapter_id, $author, $comment);
		if ($updateComment === false) {
			throw new Exception('Impossible de mettre à jour ce commentaire');
		}
		else {
			header('Location: index.php?action=chapterBackend&id=' . $chapter_id);
		}
	}

	function signalCommentBackend() {
   
        $commentManager = new \Alaska2\Model\CommentManager();
        $comments = $commentManager->getSignalComments();
        
        include 'view/backend/signalCommentView.php';
    }

    function deleteCommentReport($id) {
 
        $commentManager = new \Alaska2\Model\CommentManager();
        $supprimComment = $commentManager->deleteComment($id);
        if ($supprimComment > 0) {
            header('Location: index.php?action=commentSignal');
        } else {
            throw new Exception('Impossible de supprimer ce commentaire !');
        }
    }

    function deleteComment($id) {
 
        $commentManager = new \Alaska2\Model\CommentManager();
        $supprimComment = $commentManager->deleteComment($id);
        if ($supprimComment > 0) {
            include 'view/backend/deleteCommentView.php';
        } else {
            throw new Exception('Impossible de supprimer ce commentaire !');
        }
    }

    function approveComment($id) {
    
        $commentManager = new \Alaska2\Model\CommentManager();
        $commentApprove = $commentManager->approveComment($id);
        if ($commentApprove > 0) {
            header('Location: index.php?action=commentSignal');
        } else {
            throw new Exception('Impossible d\'approuver ce commentaire !');
        }
    }



}