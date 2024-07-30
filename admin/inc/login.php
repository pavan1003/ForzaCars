<?php
include('../reusable/conn.php');
include('functions.php');

if (isset($_POST['login'])) {
  $query = 'SELECT * 
              FROM users
              WHERE username = "' . $_POST['username'] . '"
              AND password = "' . md5($_POST['password']) . '"
              LIMIT 1';
  $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result)) {
    $record = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $record['id'];
    $_SESSION['first_name'] = $record['first_name'];
    $_SESSION['last_name'] = $record['last_name'];
    $_SESSION['username'] = $record['username'];
    header('Location: ../pages/dashboard.php');
    die();
  } else {
    set_message('No records found!', 'danger');
    header('Location: ../index.php');
    die();
  }
}
