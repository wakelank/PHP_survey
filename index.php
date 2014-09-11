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
    $errorMessage = "";
    $firstName = $lastName = $birthYear = $birthMonth = $birthDay = $schoolYear = $bedTime = $wakeTime = $noOfSiblings =
    $timeSpentHomework = $timeSpentTV = $timeSpentComputer =
    $timeSpentFamily = $timeSpentFriends = "";

    if (empty($_POST["firstName"])) {
      $errorMessage = $errorMessage .  "First Name is required<br>";
    } else {
       $firstName = $_POST["firstName"];
    }
    if (empty($_POST["lastName"])) {
      $errorMessage = $errorMessage .  "Last Name is require<br>";
    } else {
       $lastName = $_POST["lastName"];
    }
    if (empty($_POST["birthYear"])) {
      $errorMessage = $errorMessage .  "Birth Year is required<br>";
    } else {
       $birthYear = $_POST["birthYear"];
    }
    if (empty($_POST["birthMonth"])) {
      $errorMessage = $errorMessage .  "Birth Month is require<br>";
    } else {
       $birthMonth = $_POST["birthMonth"];
    }
    if (empty($_POST["birthDay"])) {
      $errorMessage = $errorMessage .  "Birth Day is required<br>";
    } else {
       $birthDay = $_POST["birthDay"];
    }
    if (empty($_POST["schoolYear"])) {
      $errorMessage = $errorMessage .  "School Year is require<br>";
    } else {
       $schoolYear = $_POST["schoolYear"];
    }
    if (empty($_POST["bedTime"])) {
      $errorMessage = $errorMessage .  "Bed Time is required<br>";
    } else {
       $bedTime = $_POST["bedTime"];
       if (!is_numeric($bedTime)) {
         $errorMessage = $errorMessage . "Bed time must be a number between 1 and 12<br>";
       }
       if($bedTime < 1 || $bedTime > 12){
         $errorMessage = $errorMessage . "Bed time must be a number between 1 and 12<br>";
       }
    }
    if (empty($_POST["wakeTime"])) {
      $errorMessage = $errorMessage .  "Wake up time is required<br>";
    } else {
       $wakeTime = $_POST["wakeTime"];
    }
    if (empty($_POST["noOfSiblings"])) {
      $errorMessage = $errorMessage .  "Number of siblings is required<br>";
    } else {
       $noOfSiblings = $_POST["noOfSiblings"];
       if (!is_numeric($noOfSiblings)) {
         $errorMessage = $errorMesssage . "Number of Siblings must be a number<br>";
       }
    }
    if (empty($_POST["timeSpentHomework"])) {
      $errorMessage = $errorMessage .  "Time spent on homework is required<br>";
    } else {
       $timeSpentHomework = $_POST["timeSpentHomework"];
    }
    if (empty($_POST["timeSpentTV"])) {
      $errorMessage = $errorMessage .  "Time spent watching TV/DVDs is required<br>";
    } else {
       $timeSpentTV = $_POST["timeSpentTV"];
    }
    if (empty($_POST["timeSpentComputer"])) {
      $errorMessage = $errorMessage .  "Time Spent with a computer or game is required<br>";
    } else {
       $timeSpentComputer = $_POST["timeSpentComputer"];
    }
    if (empty($_POST["timeSpentFamily"])) {
      $errorMessage = $errorMessage .  "Time spent with family is required<br>";
    } else {
       $timeSpentFamily = $_POST["timeSpentFamily"];
    }
    if (empty($_POST["timeSpentFriends"])) {
      $errorMessage = $errorMessage .  "Time spent with friends is required<br>";
    } else {
       $timeSpentFriends = $_POST["timeSpentFriends"];
    }

      if($_POST && $errorMessage != ""){
        echo "<div class='errorMessage'>";
        echo $errorMessage;
        echo "</div>";
      }

      if (!$_POST || $errorMessage != ""){
        $filename = $_SERVER['PHP_SELF'];

        echo "<form action='" . $filename . "' method='post'>";
          echo "First name: <input type='text' name='firstName' value='" . $firstName . "'><br>";
          echo "Last name: <input type='text' name='lastName' value='" . $lastName . "'><br>";
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
          echo "Number of siblings: <input type='text' name='noOfSiblings' value='" . $noOfSiblings. "'><br>";
          echo "What time do you go to bed: <input type='text' name='bedTime' value='" . $bedTime. "'><br>";
          echo "What time do you wake up: <input type='text' name='wakeTime' value='" . $wakeTime. "'><br>";
          echo "Time spent per day doing the following:<br>";
          echo "Homework: <input type='text' name='timeSpentHomework' value='" . $timeSpentHomework . "'><br>";
          echo "Watching TV/DVD etc.: <input type='text' name='timeSpentTV' value='" . $timeSpentTV. "'><br>";
          echo "Using computer, game console: <input type='text' name='timeSpentComputer' value='" . $timeSpentComputer . "'><br>";
          echo "With family: <input type='text' name='timeSpentFamily' value='" . $timeSpentFamily . "'><br>";
          echo "With friends: <input type='text' name='timeSpentFriends' value='" . $timeSpentFriends . "'><br>";
          echo "<input type='submit' value='submit'>";
        echo "</form>";
      }
      else{

          $fullName = $firstName . ' ' . $lastName;

          $tvPerYear = $timeSpentTV * 365;
          $homeworkPerYear = $timeSpentHomework * 365;
          $tvComputerPerYear = ($timeSpentTV+ $timeSpentComputer) * 365;
          $friendsAndFamilyPerYear = ($timeSpentFamily + $timeSpentFriends) * 365;
          $totalHomeworkTime = (12 -$schoolYear) * $homeworkPerYear;
          $totalTvComputerTime = (12 - $schoolYear) * $tvComputerPerYear;
          $screenTime = $timeSpentTV + $timeSpentComputer;
          $hoursAwake = 12 - $wakeTime + $bedTime;
          $percentScreenTimePerDay = round(($screenTime / $hoursAwake) * 100);

          echo "Great! Thanks, " . $firstName . " for responding to our survey.<br>";
          echo "<div class='results'>";
            echo "Name: " . $fullName . "<br>";
            echo "Birth year: " . $birthYear  . "<br>";
            echo "School year: " . $schoolYear . "<br>";
            echo "Number of siblings: " . $noOfSiblings. "<br>";
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
          $emailMessage = "test message";

          //put code here to generate email message

          mail($emailToAddress, $emailSubject, $emailMessage);

          $result = mysql_connect("localhost", "idiotbox", "wakelank");

          if (!$result)
          {
            print("<h2>Failed to connect to database!</h2>");
          }
          else
          {
            $result = mysql_select_db("idiotbox");

            if (!$result)
            {
              print("<h2>Failed to select database!</h2>");
            }
            else
            {
              $sql = "INSERT INTO survey (firstName,
                                          lastName,
                                          birthdate,
                                          schoolYear,
                                          bedTime,
                                          wakeTime,
                                          timeSpentHomework,
                                          timeSpentTV,
                                          timeSpentComputer,
                                          timeSpentFamily,
                                          timeSpentFriends)
                                          VALUES
                                          (\"" . $firstName . "\",
                                          \"" . $lastName . "\",
                                          \"" . $birthYear . "-" .  $birthMonth . "-" . $birthDay . "\",
                                          \"" . $schoolYear . "\",
                                          \"" . $bedTime . "\",
                                          \"" . $wakeTime . "\",
                                          \"" . $timeSpentHomework . "\",
                                          \"" . $timeSpentTV . "\",
                                          \"" . $timeSpentComputer . "\",
                                          \"" . $timeSpentFamily . "\",
                                          \"" . $timeSpentFriends . "\");";

              $result = mysql_query($sql);
              if (!$result)
              {
                print("<h2>Failed to run the query! Error is:" . mysql_error(). "</h2>");
              }
              else
              {
                print("<p>Your answers have been recorded</p>");
              }
            }
          }

      }

    ?>

</body>
</html>
