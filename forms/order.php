<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $order_for_takeout = new PHP_Email_Form;
  $order_for_takeout->ajax = true;
  
  $order_for_takeout->to = $receiving_email_address;
  $order_for_takeout->from_name = $_POST['name'];
  $order_for_takeout->from_email = $_POST['email'];
  $order_for_takeout->subject = "New table booking request from the website";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $order_for_takeout->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $order_for_takeout->add_message( $_POST['name'], 'Name');
  $order_for_takeout->add_message( $_POST['email'], 'Email');
  $order_for_takeout->add_message( $_POST['phone'], 'Phone', 4);
  $order_for_takeout->add_message( $_POST['date'], 'Date', 4);
  $order_for_takeout->add_message( $_POST['time'], 'Time', 4);
  $order_for_takeout->add_message( $_POST['people'], '# of people', 1);
  $order_for_takeout->add_message( $_POST['message'], 'Message');

  echo $order_for_takeout->send();
?>
