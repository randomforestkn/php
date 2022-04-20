<?php foreach ($posts as $post): ?>
    <div class="post">
      <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="slider-image">
      <div class="post-info">
        <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
        <i class="far fa-user"><?php echo $post['username']; ?></i>
        &nbsp;
        <i class="far fa-calendar"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
      </div>
    </div>
<?php endforeach; ?>
