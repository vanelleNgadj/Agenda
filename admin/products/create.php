<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/products.php"); 
adminorg();
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"
            rel="stylesheet">

        <!-- style -->
        <link rel="stylesheet" href="../../assets/css/style.css">

        <!-- style admin -->
        <link rel="stylesheet" href="../../assets/css/admin.css">

        <title>Admin Section - Ajouter produits</title>
    </head>

    <description>
        
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>


            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="btn btn-big">Ajouter produits</a>
                    <a href="index.php" class="btn btn-big">Gerer produits</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Ajouter produits</h2>

                    <?php include(ROOT_PATH . '/app/helpers/formErrors.php'); ?>

                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label>Nom</label>
                            <input type="text" name="name" value="<?php echo $name ?>" class="text-input">
                        </div>

                        <div>
                            <label>Prix</label>
                            <input type="text" name="price" value="<?php echo $price ?>" class="text-input">
                        </div>

                        <div>
                            <label>Description</label>
                            <textarea name="description" id="description"><?php echo $description ?></textarea>
                        </div>
                        <div>
                            <label>Image</label>
                            <input type="file" name="image" class="text-input">
                        </div>
                       
                       
                        <div>
                            <button type="submit" name="add-products" class="btn btn-big">Ajouter produit</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->



        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Ckeditor -->
        <script
            src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
        <!-- Custom Script -->
        <script src="../../assets/js/scripts.js"></script>

    </description>

</html>