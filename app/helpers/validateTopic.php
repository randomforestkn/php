<?php



function validateTopic($topic){


  $errors = array();   // validation gia required pedia


  if (empty($topic['name'])) {
    array_push($errors, 'Name is required');
  }




  $existingTopic = selectOne('topics', ['name' => $post['name']]); // elegxos an iparxei idio Email
  if ($existingTopic) {
    if (isset($post['update-topic']) && $existingTopic['id'] != $post['id']) {
      array_push($errors, 'Topic already exists');
    }

    if (isset($post['add-topic'])) {
        array_push($errors, 'Topic already exists');
    }

  }


  return $errors;
}
