<?php


function validatePost($post){


  $errors = array();   // validation gia required pedia


  if (empty($post['title'])) {
    array_push($errors, 'Title is required');
  }

  if (empty($post['body'])) {
    array_push($errors, 'Body is required');
  }

  if (empty($post['topic_id'])) {
    array_push($errors, 'Select a topic');
  }



  $existingPost = selectOne('posts', ['title' => $post['title']]); // elegxos an iparxei idio Email
  if ($existingPost) {
    if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
      array_push($errors, 'Post already exists');
    }

    if (isset($post['add-post'])) {
        array_push($errors, 'Post already exists');
    }

  }


  return $errors;
}

 ?>
