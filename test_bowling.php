<?php

  class TestBowling extends PHPUnit_Framework_TestCase{
    public function test_all_gutter_balls()
    {
      $this->assertEquals(score([0]),0);
    }
  }

  function score($rolls)
  {
    return 0;
  }

?>
