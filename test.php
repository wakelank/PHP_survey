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

  function testNumberOfSiblingsCantBeALetter(){
    $this->get('http://localhost/php/idiotBoxSurvey/index.php');
    $this->setField('noOfSiblings', 'a');
    $this->click('submit');
    $this->assertText('Number of Siblings must be a number');
  }

  function testBedTimeMustBeANumber(){
    $this->get('http://localhost/php/idiotBoxSurvey/index.php');
    $this->setField('bedTime', 'a');
    $this->click('submit');
    $this->assertText('Bed time must be a number between 1 and 12');
  }

  function testBedTimeMustBeOneOrGreater(){
    $this->get('http://localhost/php/idiotBoxSurvey/index.php');
    $this->setField('bedTime', '-2');
    $this->click('submit');
    $this->assertText('Bed time must be a number between 1 and 12');
  }

  function testBedTimeCanBeOne(){
    $this->get('http://localhost/php/idiotBoxSurvey/index.php');
    $this->setField('bedTime', '1');
    $this->click('submit');
    $this->assertNoText('Bed time must be a number between 1 and 12');
  }
  function testBedTimeCanBeTwelve(){
    $this->get('http://localhost/php/idiotBoxSurvey/index.php');
    $this->setField('bedTime', '12');
    $this->click('submit');
    $this->assertNoText('Bed time must be a number between 1 and 12');
  }

}

?>
