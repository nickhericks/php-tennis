<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Elvis sent</title>
</head>
<body>

<?php

  $from = 'hello@nickhericks.com';
  $subject = $_POST['subject'];
  $msg = $_POST['message'];


  if (empty($subject) OR empty($msg)) {
    echo 'Message not sent. Neither the subject field or the message field can be blank.'
  } else {

    // connect to and send data to MySQL server
    $dbc = mysqli_connect('localhost', MY_USERNAME, MY_PASSWORD, MY_TABLE) or die ('Error connecting to MySQL server.');

    // variable to hold our database query
    $query = "SELECT * FROM email_list";

    // queries the database and stores the result in a variable
    // variable doesn't hold any query data, only an ID number for a MySQL resource
    // MySQL server temporarily stores the results of your query
    // must use this resource ID with the PHP mysqli_fetch_array() function to grab data one row at a time
    $result = mysqli_query($dbc, $query) or die('Error querying database.');

    while ($row = mysqli_fetch_array($result)) {
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $email = $row['email'];

      $body = "Dear $first_name $last_name,\n\n $msg";

      echo 'Email sent to: ' . $email . '<br>';

      // send email
      mail($email, $subject, $body, 'From:' . $from);
    };

    mysqli_close($dbc);


  }



?>

</body>
</html>
