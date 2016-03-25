<?php

  $dogs = "Dogs";
  $cats = "Cats";
  $fish = "Fish";

  $pets = [
    $dogs,
    $cats,
    $fish
  ];

  var_dump($pets);
  echo "<br>";
  var_dump($pets[2]);
  echo "<br>";
  $pets[1] = $fish;
  var_dump($pets);
  echo "<br>";
  $pets[4] = "gecko";
  var_dump($pets);
  echo "<br>";
  $pets[] = "horses";
  var_dump($pets);
  echo "<br>";
  unset($pets[2]);
  var_dump($pets);
  echo "<br>";
  var_dump(count($pets));

  echo "<hr>";

  $pets = [];

  for ($i = 0; $i < 21; $i++) {
    $pets[] = $i;
  }

  var_dump($pets);

  echo "<hr>";

  $numbers = [];
  $x = 1;
  while($x < 51) {
    $numbers[] = $x;
    $x++;
  }
  var_dump($numbers);

  echo "<hr>";

  $array = [];
  $array[] = "apples";
  $array[] = "oranges";
  $array[] = "apricots";

  foreach($array as $item) {
    echo $item . "<br>";
  }

 ?>
