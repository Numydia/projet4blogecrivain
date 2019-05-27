<?php

require 'controller/frontend.php';
require 'controller/backend.php';

$frontend = new Alaska2\Controller\Frontend();
$backend = new Alaska2\Controller\Backend();


try {
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        if ($_GET['action'] == 'dashboard') {
            include 'view/backend/dashboardView.php';
        } elseif ($_GET['action'] == 'listChaptersBackend') {
            $backend->listChaptersBackend();
        } elseif ($_GET['action'] == 'chapterBackend') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backend->chapterBackend();
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        } elseif ($_GET['action'] == 'adminNewChapter') {
                $backend->adminNewChapter();
            
        } elseif ($_GET['action'] == 'addChapter') {
            if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image'])) {
                $backend->newChapter($_POST['title'], $_POST['content'], $_POST['image']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
            
        } elseif ($_GET['action'] == 'adminUpdateChapter') {
                $backend->adminUpdateChapter();
            
        } elseif ($_GET['action'] == 'updateChapter') {           
                if (isset($_GET['id']) && $_GET['id'] > 0) {            
                    if ($_POST['title'] != NULL && $_POST['content'] != NULL) {
                        $backend->updateChapter($_GET['id'], $_POST['title'], $_POST['content']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis..');
                    }
                }
            else {           
                throw new Exception('Aucun identifiant de chapitre envoyé !');
            }    
        } elseif ($_GET['action'] == 'addCommentBackend') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $backend->addCommentBackend($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
        } elseif ($_GET['action'] == 'deleteChapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backend->deleteChapter($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé'); 
            }
        } elseif ($_GET['action'] == 'adminUpdateComment') {
            $backend->adminUpdateComment();
        } elseif ($_GET['action'] == 'updateComment') {
                if (isset($_GET['chapter_id']) && $_GET['chapter_id'] > 0) {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if ($_POST['author'] != NULL && $_POST['comment'] != NULL) {
                            $backend->updateComment($_GET['id'], $_GET['chapter_id'], $_POST['author'], $_POST['comment']);
                        }
                        else {
                            throw new Exception('Tous les champs ne sont pas remplis..');
                        }
                    }
                    else {
                        throw new Exception('Aucun identifiant de commentaire envoyé !');
                    }
                }
                else {
                    throw new Exception('Aucun identifiant de chapitre envoyé !');
                }
        } elseif ($_GET['action'] == 'commentSignal') {
            $backend->signalCommentBackend();
        } elseif ($_GET['action'] == 'deleteCommentReport') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backend->deleteCommentReport($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            }
        } elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backend->deleteComment($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            }
        } elseif ($_GET['action'] == 'approveComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backend->approveComment($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            }
        } elseif ($_GET['action'] == 'deconnexion') {
            $backend->logOut();
        } elseif ($_GET['action'] === 'connexion') {
            include 'view/frontend/connexionView.php';
        } elseif ($_GET['action'] == 'home') {
            $frontend->home();
        } elseif ($_GET['action'] == 'contact') {
            $frontend->contact();
        } elseif ($_GET['action'] === 'login') {
            if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
                $frontend->connexion($_POST['pseudo'], $_POST['password']);
            } else {
                throw new Exception('Le pseudo et/ou le mot de passe sont incorrects');
            } 
        } elseif ($_GET['action'] === 'listChapters') {
            $frontend->listChapters();
        } elseif ($_GET['action'] === 'chapter') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $frontend->chapter($_GET['id']);
            } else {
                    throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        } elseif ($_GET['action'] =='comment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontend->comment($_GET['id']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontend->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            } 
        } elseif ($_GET['action'] == 'signalComment') {
            if (!empty($_GET['id']) && $_GET['id'] > 0) {
                $frontend->signalComment($_GET['id'], $_GET['chapterId']);
            } else {
                throw new Exception('Votre requête n\'a pu aboutir :(');
            }
        } elseif ($_GET['action'] == 'commentsCount') {
            if (!empty($_GET['id']) && $_GET['id'] > 0) {
                $frontend->commentsCount($_GET['id'], $_GET['chapterId']);
            } else {
                throw new Exception('Votre requête n\'a pu aboutir :(');
            }
        } 
    } else {
        $frontend->home();        
    }
}    
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}