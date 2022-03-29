<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/restriction.php");

$table = 'products';

$products = selectAll($table);


$errors = array();
$id_product = "";
$name = "";
$price = "";
$description = "";

// un seul article
if (isset($_GET['id_product'])) {
    $products = selectOne("products", ['id_product' => $_GET['id_product']]);

    $id_product = $products['id_product'];
    $name = $products['name'];
    $price  = $products['price'];
    $description = $products['description'];
}

// suppresion d'un  products
if (isset($_GET['delete_id_product'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id_product']);
    $_SESSION['message'] = "produit supprimé avec succès";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/products/index.php"); 
    exit();
}



// ajouter un produits
if (isset($_POST['add-products'])) {
    adminOnly();

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
       array_push($errors, "L'image du products est requise");
    }
    if (count($errors) == 0) {
        unset($_POST['add-products']);
        $_POST['description'] = htmlentities($_POST['description']);
    
        $products_id = create($table, $_POST);
        $_SESSION['message'] = "products créé avec succes";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/products/index.php"); 
        exit();    
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}

// modifier un PRODUIT
if (isset($_POST['update-products'])) {
    adminOnly();

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
       array_push($errors, "image de l'article requis");
    }

    if (count($errors) == 0) {
        $id_product = $_POST['id_product'];
        unset($_POST['update-products'], $_POST['id_product']);
        $_POST['description'] = htmlentities($_POST['description']);
    
        $products_id = update($table, $id_product, $_POST);
        $_SESSION['message'] = "products modifié avec succes";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/products/index.php");       
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
    }

}