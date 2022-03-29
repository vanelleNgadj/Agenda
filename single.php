<?php include("path.php"); ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');
if(empty($_SESSION['id'])){
  $_SESSION['message'] = 'Vous devez d’abord vous connecter';
  $_SESSION['type'] = 'error';
  header('location: ' . BASE_URL .' /blog.php');
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);
$comments = selectAll('comments');
$table = 'users';
$user = selectOneuser($table, ['id' => $post['user_id']]);
$username = implode(' ',$user);
$numcom = 0;
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

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title><?php echo $post['title']; ?> | AgendasDuRoyaume</title>
</head>

<body>
  <!-- Facebook Page Plugin SDK -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=285071545181837&autoLogAppEvents=1">
  </script>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <!-- Content -->
    <div class="content clearfix">

      <!-- Main Content Wrapper -->
      <div class="main-content-wrapper">
        <div class="main-content single">
          <h1 class="post-title"><?php echo $post['title']; ?></h1>

          
          <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="">

          
          <div class="postinfo">
              <i class="far fa-user"> Organisateur: <?php echo $username; ?></i>
              &nbsp; </br>
              <i class="far fa-calendar"> posté le <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
            </div>

          <div class="post-content">
            <?php echo html_entity_decode($post['body']); ?>
          </div>
          <div class="infos">
            <h2> Infos: </h2>
            <p>
              <strong> Jour:</strong> &nbsp;<?php echo html_entity_decode($post['day']); ?> </br>
              <strong> Heure: </strong>&nbsp;<?php echo html_entity_decode($post['time']); ?> </br>
              <strong> ville:</strong>&nbsp; <?php echo html_entity_decode($post['ville']); ?> </br>
              <strong> region:</strong>&nbsp; <?php echo html_entity_decode($post['region']); ?></br>
              <strong>pays: </strong>&nbsp;<?php echo html_entity_decode($post['pays']); ?>
          </p>
          </div>


          <div class="comm">
              <h2 class="section-title">Commentaires</h2>
            <?php foreach ($comments as $comment): ?>
              <?php if ($comment['post_id'] == $post['id'] ): ?>
                <?php $numcom = $numcom +1 ?>
                <p><span style="font-size:smaller">Posté par</span> <strong><?php echo $comment['author']; ?> </strong> 
                <span style="font-size:smaller"> le <?php echo date('F j, Y', strtotime($comment['create_at'])); ?></span></br>
                <?php echo $comment['body']; ?> </br>


                

        <!--  esayu,himj;okù:przctveybrun-iè,o_plç^màù)*cv(b-nè_,çàm)ù-->
                <?php if ( $comment['user_id'] == $_SESSION['id'] ): ?>
                  <a href="edit.php?delete_com=<?php echo $comment['id']; ?>" style="color: green"><span style="font-size:smaller ;">modifier  &nbsp;   </span> </a> 

                <?php endif; ?>
                 
                 <a href="edit.php?delete_com=<?php echo $comment['id']; ?>" style="color: black"><span style="font-size:smaller ;">repondre </span> </a> 
                
                 <?php if ( $comment['user_id'] == $_SESSION['id'] ): ?>
                <form method="post"  enctype="multipart/form-data">
                <input type="hidden" name ="user_id" value="<?php echo $_SESSION['id'] ?>">
                  <input type="hidden" name ="delete_com" value="<?php echo $comment['id'] ?>">
                  <button type="submit" name="del-comment" style="border:none" >
                  <a href=""  style="color: red"><span style="font-size:smaller ;">supprimer </span> </a>
                  </button>
                </form>
                <?php endif; ?>


              </p>
                <?php endif; ?>  
            <?php endforeach; ?>
            <?php echo "($numcom)" ?> 
        </div>
        </div>

        
      <!-- // Main Content -->

      <!-- Sidebar -->
      <div class="sidebar single">

        <!-- <div class="fb-page" data-href="#" data-small-header="false"
          data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <blockquote cite="#" class="fb-xfbml-parse-ignore"><a
              href="#">_creator</a></blockquote>
        </div> -->
        
      


        <div class="section popular" >
          <h2 class="section-title">Populaire</h2>

          <?php foreach ($posts as $p): ?>
            <div class="post clearfix">
              <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
              <a href="" class="title">
                <h4><?php echo $p['title'] ?></h4>
              </a>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $topic): ?>
              <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
            <?php endforeach; ?>

          </ul>
        </div>

          
        <div class="section">
          
            <form method="post"  enctype="multipart/form-data">
            <!-- /controllers/comment.php?post_id=<php echo $post['id']; ?> -->
            <form action="edit.php" method="post" enctype="multipart/form-data">
           
              <input type="hidden" name ="post_id" value="<?php echo $post['id'] ?>">s
              <input type="hidden" name ="user_id" value="<?php echo $_SESSION['id'] ?>">
              <!-- <input type="hidden" name ="post_id" value="<php $post['id'] ?>"> -->

              <h3>Ajouter votre commentaire</h3><br/>
              
              <label for="Auteur">Auteur: </label> <input type="text" id="author" name="author"/><br/>
              <br/><label for="commentaire">Commentaire: </label><textarea name="body" id="body"></textarea><br/>
              <br/><button type="submit" name="add-comment" class="btn btn-big">Envoyer</button>
            </form>
          </div>
      
      
      
          
        <div class="section ">
          <h2 class="section-title">Rappel</h2>
        </div>
      

      <div class="section " >
          <h2 class="section-title">Contacter l'annoceur</h2>
          <form action="blog.php" method="post">
          <input type="email" name="email" class="text-input contact-input" placeholder="Votre adresse mail...">
          <textarea rows="2" name="message" class="text-input contact-input" placeholder="Ecrire à l'annoceur..."></textarea>
          <button type="submit" class="btn btn-big contact-btn">
            <i class="fas fa-envelope"></i>
            Enovoyer
          </button>
        </form>

        </div>

      </div>
      <!-- // Sidebar -->

    </div>
    <!-- // Content -->

  </div>
  <!-- // Page Wrapper -->

  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>

















