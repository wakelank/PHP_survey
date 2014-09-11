<?php

require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(__FILE__) . '/simpletest/web_tester.php');

class TestOne extends WebTestCase {
  function testGetTheTitle(){
    $this->get('http://localhost/php/idiotBoxSurvey/index.php');
    $this->assertTitle('Idiot Box Survey');
  }

  function testFirstNameHasAValue(){
    $this->get('http://localhost/php/idiotBoxSurvey/index.php');

    $this->click('submit');
    $this->assertText('First Name is required');
    }
}

?>
