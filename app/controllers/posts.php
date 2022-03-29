<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/restriction.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");

$table = 'posts';

$topics = selectAll('topics');
$posts = selectAll($table);


$errors = array();
$id = "";
$title = "";
$body = "";
$topic_id = "";
$day= "";
$time= "";
$region= "";
$pays= "";
$ville= "";
$published = "";

// un seul evenements
if (isset($_GET['id'])) {
    $post = selectOne("posts", ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $day = $post['day'];
    $time = $post['time'];
    $ville=  $post['ville'];
    $pays=  $post['pays'];
    $region=  $post['region'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];
}

// suppresion d'un  evenement
if (isset($_GET['delete_id'])) {
    adminorg();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Post supprimé avec succès";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/posts/index.php"); 
    exit();
}

// punlier ou non l'evenements
if (isset($_GET['published']) && isset($_GET['p_id'])) {
    adminorg();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = "L'état de la publication a changé !";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/posts/index.php"); 
    exit();
}


// ajouter un evenements
if (isset($_POST['add-post'])) {
    adminorg();
    var_dump ($_POST); 
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
           $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Échec du téléchargement de l'image");
        }
    } else {
       array_push($errors, "L'image du post est requise");
    }
    if (count($errors) == 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);
    
        $post_id = create($table, $_POST);
        $_SESSION['message'] = "évenement créé avec succes";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/posts/index.php"); 
        exit();    
    } else {

        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $day = $_POST['day'];
        $time = $_POST['time'];
        $ville= $_POST['ville'];
        $pays= $_POST['pays'];
        $region= $_POST['region'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}

// modifier un evenements
if (isset($_POST['update-post'])) {
    adminorg();
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
           $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Échec du téléchargement de l'image");
        }
    } else {
       array_push($errors, "image de l'evenements requis");
    }

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-post'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);
    
        $post_id = update($table, $id, $_POST);
        $_SESSION['message'] = "Post modifié avec succes";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/posts/index.php");       
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $day = $_POST['day'];
        $time = $_POST['time'];
        $ville= $_POST['ville'];
        $pays= $_POST['pays'];
        $region= $_POST['region'];
        $published = isset($_POST['published']) ? 1 : 0;
    }

}

// $table2 = 'comments';

//commentaire
// echo $_POST['add-comment'];
if (isset($_POST['add-comment'])) {
    usersOnly();
        unset($_POST['add-comment']);
        // var_dump ($_POST); 

       $com_id= create('comments', $_POST);
    //    var_dump ($com_id);
    
}


// suppresion d'un  commentaire
if (isset($_POST['del-comment'])) {
    usersOnly();
    if( $_POST['user_id'] != $_SESSION['id'] ){
        $_SESSION['message'] = "Ceci n'est pas votre commentaire";
        $_SESSION['type'] = "success"; 
    } else {
        unset($_POST['del-comment']);
      
       $count= delete('comments', $_POST['delete_com']);
       $_SESSION['message'] = "commentaire supprimé avec succès";
       $_SESSION['type'] = "success";  
    //    var_dump ($com_id);
     }
}