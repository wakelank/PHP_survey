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

    $tvPerYear = $resultsArray['Time Spent Watching TV/DVD'] * 365;
    $homeworkPerYear = $resultsArray['Time Spent on Homework'] * 365;
    $tvComputerPerYear = ($resultsArray['Time Spent Watching TV/DVD'] + $resultsArray['Time Spent with Computer/Game']) * 365;
    $friendsAndFamilyPerYear = ($resultsArray['Time Spent with Family'] + $resultsArray['Time Spent with Friends']) * 365;
    $totalHomeworkTime = (12 -$resultsArray['School Year']) * $homeworkPerYear;
    $totalTvComputerTime = (12 - $resultsArray['School Year']) * $tvComputerPerYear;
    $hoursAwake = 12 - $resultsArray['Wake Time'] + $resultsArray['Bed Time'];
    $percentScreenTimePerDay = ($hoursAwake / ($resultsArray['Time Spent Watching TV/DVD'] + $resultsArray['Time Spent with Computer/Game'])) * 100;




    echo "Great! Thanks, " . $resultsArray['First Name'] . " for responding to our survey.<br>";
    echo "<div class='results'>";
      echo "Name: " . $fullName . "<br>";
      echo "Birth year: " . $resultsArray['Birth Year']  . "<br>";
      echo "School year: " . $resultsArray['School Year'] . "<br>";
      echo "Number of siblings: " . $resultsArray['Number of Siblings'] . "<br>";
      echo "<br>";
      echo "Based on the information you've entered, you will spend:<br>";
      echo "<ul>";
      echo "<li>" . $tvPerYear . " hours watching TV or movies per year.</li>";
      echo "<li>" . $homeworkPerYear . " hours doing homework per year.</li>";
      echo "<li>" . $tvComputerPerYear . " hours spent in front of a TV or a computer per year.</li>";
      echo "<li>" . $friendsAndFamilyPerYear . " hours per year with friends and family.</li>";
      echo "<li>" . $totalHomeworkTime . " hours doing homework until you are out of school.</li>";
      echo "<li>" . $totalTvComputerTime . " hours in front of a screen until you are out of school.</li>";
      echo "<li>" . $percentScreenTimePerDay . "percent of your day in front of a screen.</li>";
      echo "</ul>";

    echo "</div>";

    $emailToAddress = "wakelank@gmail.com";
    $emailSubject = "survey results: ". $fullName;
    $emailMessage = "";

    foreach($resultsArray as $key => $value){
      $emailMessage = $emailMessage .  $key . ": " . $value . "\r\n";
    }

    mail($emailToAddress, $emailSubject, $emailMessage);

  ?>

</body>
</html>
