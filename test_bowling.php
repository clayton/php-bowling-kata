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

    public function test_getting_a_strike()
    {
      // Frame 1, ball 1: 10 pins (strike)
      // Frame 2, ball 1: 3 pins
      // Frame 2, ball 2: 6 pins
      // The total score from these throws is:
      // Frame one: 10 + (3 + 6) = 19 (Strike Bonus)
      // Frame two: 3 + 6 = 9
      // TOTAL = 28
      $this->assertEquals(score([10,3,6]),28);
    }
  }

  function score($rolls)
  {
    $score = 0;

    for ($i=0; $i < count($rolls); $i++) {
      if (is_strike($rolls, $i)) {
        $score += $rolls[$i] + ($rolls[$i + 1] + $rolls[$i + 2]);
      }else{
        $score += $rolls[$i];
      }
    }

    return $score;
  }

  function is_strike($rolls, $index)
  {
    return $rolls[$index] == 10;
  }

?>
