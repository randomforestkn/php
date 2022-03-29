<?php include("path.php");
include(ROOT_PATH . "/app/controllers/posts.php");


if (isset($_GET['id'])) {
   $post = selectOne('posts', ['id' => $_GET['id']]);
}

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <!--  Font Awesome -->
  <script src="https://kit.fontawesome.com/49cbaeff60.js" crossorigin="anonymous"></script>

  <!--  Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,562;0,600;0,700;1,400;1,500;1,562;1,600;1,700&display=swap" rel="stylesheet">

  <!--  Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title><?php echo $post['title']; ?> | Greecereviews</title>
</head>

<body>

  <!--  Facebook plugin -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/el_GR/sdk.js#xfbml=1&version=v7.0" nonce="gDetja0X"></script>

  <!-- Header include-->
  <?php include(ROOT_PATH .  "/app/includes/header.php"); ?>


  <!-- START Page Wrapper -->
  <div class="page-wrapper">



    <!-- Content -->
    <div class="content clearfix">

      <!-- Main Content -->
      <div class="main-content-wrapper">
      <div class="main-content single">
        <h1 class="post-title"><?php echo $post['title']; ?></h1>

        <div class="post-content">
          <?php echo html_entity_decode($post['body']); ?>
        </div>
      </div>
      </div>
      <!-- END Main Content -->


      <!-- Sidebar-->
      <div class="sidebar single">

        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
        </div>


        <div class="section popular">
          <h2 class="section-title">Popular</h2>

            <?php foreach ($posts as $p): ?>
              <div class="post clearfix">
                <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                <a href="#" class="title">
                  <h4><?php echo $p['title']; ?></h4>
                </a>
              </div>
            <?php endforeach; ?>

        </div>

        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $topic): ?>
               <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
            <?php endforeach; ?>


          </ul>
        </div>



      </div>
      <!--  END Sidebar-->

    </div>

    <!-- END Content -->

  </div>
  <!-- END Page Wrapper -->

  <!-- Footer include-->
  <?php include(ROOT_PATH .  "/app/includes/footer.php"); ?>

  <!--  JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


  <!--  Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!--  Custom Script -->
  <script src="assets/js/scripts.js"> </script>
</body>

</html>
