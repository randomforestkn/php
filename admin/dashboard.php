<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminOnly();
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
  <link rel="stylesheet" href="../assets/css/style.css">

  <!--  Admin CSS -->
  <link rel="stylesheet" href="../assets/css/admin.css">

  <title>Admin - Dashboard</title>
</head>

<body>
  <!--  Admin Header -->
  <?php include(ROOT_PATH .  "/app/includes/adminHeader.php"); ?>


  <!-- START Admin Page Wrapper -->
  <div class="admin-wrapper">


    <!--  LEFT SIDEBAR -->
    <?php include(ROOT_PATH .  "/app/includes/adminSidebar.php"); ?>



    <!-- START Admin Content -->
    <div class="admin-content">


         <div class="content">
           <h2 class="page-title">Dashboard</h2>

           <!-- validation error-->
             <?php include(ROOT_PATH .  "/app/includes/messages.php"); ?>




         </div>


       </div>


    <!-- END Admin Content -->




  </div>
  <!-- END Admin Page Wrapper -->



  <!--  JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

  <!--  ckeditor5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>


  <!--  Custom Script -->
  <script src="../assets/js/scripts.js"> </script>
</body>

</html>
