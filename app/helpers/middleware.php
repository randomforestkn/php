<?php

function usersOnly($redirect = '/index.php') {
    if (empty($_SESSION['id'])) {
          $_SESSION['message'] = 'Login first';
          $_SESSION['type'] = 'error';
          header("location: " . BASE_URL . $redirect);
          exit(0);
    }
}


function adminOnly($redirect = '/index.php') {
  if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
        $_SESSION['message'] = 'Restricted access';
        $_SESSION['type'] = 'error';
        header("location: " . BASE_URL . $redirect);
        exit(0);
  }
}

function guestsOnly($redirect = '/index.php') {
  if (isset($_SESSION['id'])) {
        header("location: " . BASE_URL . $redirect);
        exit(0);
  }
}
 ?>
