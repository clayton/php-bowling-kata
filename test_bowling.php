<?php

  class TestBowling extends PHPUnit_Framework_TestCase{
    public function test_all_gutter_balls()
    {
      $this->assertEquals(score([0]),0);
    }

    public function test_knocking_down_one_pin_each_roll()
    {
      $this->assertEquals(score([1,1,1,1,1,1,1,1,1,1]),10);
    }
  }

  function score($rolls)
  {
    return array_sum($rolls);
  }

?>
