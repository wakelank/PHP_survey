<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="stylesheets/styles.css">
  <title>
    Thank you!
  </title>
</head>
<body>

  <?php

  $resultsArray = array('First Name' => $_POST['firstName'],
                        'Last Name' => $_POST['lastName'],
                        'Birth Year' => $_POST['birthYear'],
                        'Birth Month' => $_POST['birthMonth'],
                        'Birth Day' => $_POST['birthDay'],
                        'School Year' => $_POST['schoolYear'],
                        'Bed Time' => $_POST['bedTime'],
                        'Wake Time' => $_POST['wakeTime'],
                        'Number of Siblings' => $_POST['noOfSiblings'],
                        'Time Spent on Homework' => $_POST['timeSpentHomework'],
                        'Time Spent Watching TV/DVD' => $_POST['timeSpentTV'],
                        'Time Spent with Computer/Game' => $_POST['timeSpentComputer'],
                        'Time Spent with Family' => $_POST['timeSpentFamily'],
                        'Time Spent with Friends' => $_POST['timeSpentFriends']
                      );
  $fullName = $resultsArray['First Name'] . ' ' . $resultsArray['Last Name'];

  echo "Great! Thanks, " . $resultsArray['First Name'] . " for responding to our survey.<br>";
  echo "<div class='results'>";
    echo "Name: " . $fullName . "<br>";
    echo "Birth year: " . $resultsArray['Birth Year']  . "<br>";
    echo "School year: " . $resultsArray['School Year'] . "<br>";
    echo "Number of siblings: " . $resultsArray['Number of Siblings'] . "<br>";
  echo "</div>";

  $emailToAddress = "wakelank@gmail.com";
  $emailSubject = "survey results: ". $fullName;
  $emailMessage = "";

  foreach($resultsArray as $key => $value){
    $emailMessage = $emailMessage .  $key . ": " . $value . "\r\n";
  }

  mail($emailToAddress, $emailSubject, $emailMessage);
  echo $emailMessage;

  ?>

</body>
</html>
