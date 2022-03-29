<?php 
include("path.php");
include(ROOT_PATH . "/app/controllers/products.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!--style -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title>Shop</title>
</head>

<body>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

  <!-- enveloppe -->
  <div class="page-wrapper">

    <!-- Partie du site qui glise -->
    <div class="post-slider">
      <h1 class="slider-title">Nos Produits</h1>
      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>

      <div class="post-wrapper">
        <?php foreach ($products as $prod): ?>
          <div class="post">
            <img src="<?php echo BASE_URL . '/assets/images/' . $prod['image']; ?>" alt="" class="slider-image">
            <div class="post-info">
              <!-- <h4><a href="singleProduct.php?id_product=<php echo $prod['id_product']; ?>"><php echo $prod['name']; ?></a></h4> -->
              <h4><a href="#"><?php echo $prod['name']; ?></a></h4>
              <i class="fab fa-creative-commons-nc-eu"> Prix:  <?php echo $prod['price']; ?> euro.s</i>
              </br><?php echo html_entity_decode($prod['description']); ?>
            </div>
           
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- // Post Slider -->

    <!-- Content -->
    

  </div>
  <!-- // Page Wrapper -->

  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


  <!-- JQuery Ajax permet d'effectuer des requêtes au serveur web et, en conséquence,
   de modifier partiellement la page web affichée sur le poste client sans avoir à afficher une nouvelle page complète. -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- script de slick carousel pour la glissiere dans nouveau post; autopay -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>