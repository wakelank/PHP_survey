<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="stylesheets/styles.css"/>
  <title>
    Idiot Box Survey
  </title>
</head>
<body>
  <h1> Idiot Box Survey </h1>

    <?php
      if (!$_POST){
        $filename = $_SERVER['PHP_SELF'];
        echo "<form action='" . $filename . "' method='post'>";
          echo "First name: <input type='text' name='firstName'><br>";
          echo "Last name: <input type='text' name='lastName'><br>";
          echo "Birthdate: ";
          echo "Year: <select name='birthYear'>";
          for ($i=2009; $i > 1997; --$i){
            echo "<option name='" . $i . "'>" . $i . "</option>";
          }
          echo "</select>";
          echo " Month: <select name='birthMonth'>";
            for ($i = 1; $i <= 12; ++$i){
              echo "<option name='" . $i ."'>" . $i . "</option>";
            }
          echo "</select>";
          echo " Day: <select name='birthDay'>";
            for ($i = 1; $i <= 31; ++$i){
              echo "<option name='" . $i . "'>". $i . "</option>";
            }
          echo"</select><br>";
          echo "Year at School: <select name='schoolYear'>";
            for ($i = 7; $i <= 12; ++$i){
              echo "<option name='" . $i ."'>" . $i . "</option>";
            }
            echo "</select><br>";
          echo "Number of siblings: <input type='text' name='noOfSiblings'><br>";
          echo "What time do you go to bed: <input type='text' name='bedTime'><br>";
          echo "What time do you wake up: <input type='text' name='wakeTime'><br>";
          echo "Time spent per day doing the following:<br>";
          echo "Homework: <input type='text' name='timeSpentHomework'><br>";
          echo "Watching TV/DVD etc.: <input type='text' name='timeSpentTV'><br>";
          echo "Using computer, game console: <input type='text' name='timeSpentComputer'><br>";
          echo "With family: <input type='text' name='timeSpentFamily'><br>";
          echo "With friends: <input type='text' name='timeSpentFriends'><br>";
          echo "<button type='submit'>submit</button>";
        echo "</form>";
      }
      else{
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
          $screenTime = $resultsArray['Time Spent Watching TV/DVD'] + $resultsArray['Time Spent with Computer/Game'];
          $hoursAwake = 12 - $resultsArray['Wake Time'] + $resultsArray['Bed Time'];
          $percentScreenTimePerDay = round(($screenTime / $hoursAwake) * 100);

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
            echo "<li>" . $percentScreenTimePerDay . "% of your day in front of a screen.</li>";
            echo "</ul>";

          echo "</div>";

          $emailToAddress = "wakelank@gmail.com";
          $emailSubject = "survey results: ". $fullName;
          $emailMessage = "";

          foreach($resultsArray as $key => $value){
            $emailMessage = $emailMessage .  $key . ": " . $value . "\r\n";
          }

          mail($emailToAddress, $emailSubject, $emailMessage);

      }
    ?>

</body>
</html>
