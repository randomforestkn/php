<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/topics.php");
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
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!--  Admin CSS -->
  <link rel="stylesheet" href="../../assets/css/admin.css">

  <title>Admin - Edit Topics</title>
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
      <div class="button-group">
        <a href="create.php" class="btn btn-big">Add Topic</a>
        <a href="index.php" class="btn btn-big">Manage Topics</a>
      </div>

      <div class="content">
        <h2 class="page-title">Edit Topic</h2>
        <!-- validation error-->
          <?php include(ROOT_PATH .  "/app/helpers/formErrors.php"); ?>

        <form  action="edit.php" method="post">
          <input type="hidden" name="id" value="<?php echo $id; ?>" >
          <div>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>" class="text-input">
          </div>
          <div>
            <label>Description</label>
            <textarea name="description" id="body"><?php echo $description; ?></textarea>
          </div>


          <div>
            <button type="submit" name="update-topic" class="btn btn-big">Update Topic</button>
          </div>


        </form>
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
  <script src="../../assets/js/scripts.js"> </script>
</body>

</html>
