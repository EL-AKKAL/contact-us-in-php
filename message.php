<?php
// declaring the variables
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

// check if the fields are not empty
  if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)){

// check if the email is valid
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

// check if the phone is numeric
    if (is_numeric($phone)) {

// preparing the message 
      $to = "akkalayoub3@gmail.com"; //enter that email address where you want to receive all messages
      $body = "Name: $name\n\rEmail: $email\n\rPhone: $phone\n\rSubject: $subject\n\rMessage:\n\r$message\n\rRegards,\n\r$name";
      $sender = "From: $email";

// sending the message
      if(mail($to, $subject, $body, $sender)){
         echo "Your message has been sent";
      }else{ //else the message hasnt send
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Please enter a valid phone number";
    }
    }else{ //else the email is not valid
      echo "Please enter a valid email address!";
    }
  }else{ //else one of the fields is empty
    echo "All the fields are required!";
  }
?>
