<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/restriction.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");


$table = 'users';

$admin_users = selectAll($table);

$errors = array();
$id = '';
$username = '';
$admin = '';
$org = '';
$email = '';
$password = '';
$passwordConf = '';


function loginUser($user)
{
    //pour login il suffit de mettre les variable dans la session
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['org'] = $user['org'];
    // message pour confirmer a connexion
    $_SESSION['message'] = 'Vous êtes connectez !';
    $_SESSION['type'] = 'success';

    // si cest un admin on le redirige sur le tableau de bord
    if ($_SESSION['admin'] || $_SESSION['org']) {
        header('location: ' . BASE_URL . '/admin/dashboard.php'); 
    } else {
        // utilsateur à l'index 
        header('location: ' . BASE_URL . '/blog.php');
    }
    exit();
}



//enregistrement utilisateur.
if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        //on ibere les variable dont on a pas besoin d'entrer dans la base de donnée
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);

        // hashage de mode de poste pour plus de sécurité
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        //pour creer un administrateur 
        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = 'utilisateur adminsitateur créé';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/admin/users/index.php'); 
            exit();
        } else {
            //pour créer un utilisateur simple
            $_POST['admin'] = 0;
            // insertion des données dans la base de donnée pour un compte
            $user_id = create($table, $_POST);
            // extraire l'ulisateur pour le connecter
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        }


        //pour creer un organisateur 
        if (isset($_POST['org'])) {
            $_POST['org'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = 'utilisateur adminsitateur créé';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/admin/users/index.php'); 
            exit();
        } else {
            //pour créer un utilisateur simple
            $_POST['org'] = 0;
            // insertion des données dans la base de donnée pour un compte
            $user_id = create($table, $_POST);
            // extraire l'ulisateur pour le connecter
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        }
    } else {
        // revoyer les valeurs en cas d'ereurs
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $org = isset($_POST['org']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

if (isset($_POST['update-user'])) {
    adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $org = isset($_POST['org']) ? 1 : 0;
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = 'utilisateur adminsitateur créé';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/users/index.php'); 
        exit();
        
    } else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $org = isset($_POST['org']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

// selectionner un utilsateur 
if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    
    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'];
    $org = $user['org'];
    $email = $user['email'];
}

//login par le formuaire
if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    // aucune erreur
    if (count($errors) === 0) {
        // trouver l'utilisateur dans la base 
        $user = selectOne($table, ['username' => $_POST['username']]);

        // si l'utilisaeur existe et le mot de passe match password_verify() le mdp recu par la method post et le mdp de la base
        if ($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        } else {
           array_push($errors, 'Identifiants erronés');
        }
    }

    // pour le cas d'erreur
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'Administrateur supprimé';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/users/index.php'); 
    exit();
}