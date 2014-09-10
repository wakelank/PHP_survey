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
      echo "<form action='thankyou.php' method='post'>";
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
    ?>

</body>
</html>
