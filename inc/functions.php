<?php

// Start the session
session_start();

/**
 * Function to set a session message
 *
 * @param string $message The message to be set
 * @param string $className The class name for styling the message (e.g., 'success', 'danger')
 */
function set_message($message, $className)
{
  // Store the message and class name in the session
  $_SESSION['message'] = $message;
  $_SESSION['className'] = $className;
}

/**
 * Function to get and display the session message
 */
function get_message()
{
  // Check if a message is set in the session
  if (isset($_SESSION['message'])) {
    // Display the message inside a Bootstrap alert div
    echo
    '<div class="alert alert-' . $_SESSION['className'] . '" role="alert">' .
      $_SESSION['message']
      . '</div>';

    // Unset the message and class name from the session
    unset($_SESSION['message']);
    unset($_SESSION['className']);
  }
}

?>