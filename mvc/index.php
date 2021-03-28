<?php
require('./controller/frontend.php');
try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif ($_GET['action'] == 'viewComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                viewComment();
            }
            else {
                throw new Exception('Aucun commentaire trouvé !');
            }
        }
        
        elseif ($_GET['action'] == 'editComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    editComment($_GET['id'], $_POST['comment']);  
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }else {
        listPosts();
    }

}catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
        
}
    
