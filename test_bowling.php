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

    public function test_getting_all_strikes()
    {
      $this->assertEquals(score([10,10,10,10,10,10,10,10,10,10,10,10,]),300);
    }

    public function test_getting_a_spare()
    {
      // Frame 1, ball 1: 7 pins
      // Frame 1, ball 2: 3 pins (spare)
      // Frame 2, ball 1: 4 pins
      // Frame 2, ball 2: 2 pins
      // The total score from these throws is:
      // Frame one: 7 + 3 + 4 (bonus) = 14
      // Frame two: 4 + 2 = 6
      // TOTAL = 20

      $this->assertEquals(score([7,3,4,2]),20);
    }
  }

  function score($rolls)
  {
    $score = 0;

    for ($i=0; $i < count($rolls); $i++) {
      if (is_strike($rolls, $i)) {
        $score += $rolls[$i] + strike_bonus($rolls, $i);
      }elseif (is_spare($rolls, $i)){
        $score += 10 + spare_bonus($rolls, $i);
        $i++;
      }else{
        $score += $rolls[$i];
      }
    }

    return $score;
  }

  function spare_bonus($rolls, $index)
  {
    return $rolls[$index + 2];
  }

  function is_strike($rolls, $index)
  {
    return $rolls[$index] == 10;
  }

  function is_spare($rolls, $index)
  {
    return ($rolls[$index] + $rolls[$index + 1]) == 10;
  }

  function strike_bonus($rolls, $index)
  {
    if ($index < 9){
      return ($rolls[$index + 1] + $rolls[$index + 2]);
    }
  }

?>
