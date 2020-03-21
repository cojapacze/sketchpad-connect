<?php

// We are on backend so we can have some secrets here
// lets define our school secret key - make sure that is unique!
$_SCHOOL_SECRET_KEY = "88a4acbed6e3562bfc95504a081c07f51748db73";

function getNormalisedChar($type, $char) {
  // !fixme:
  switch ($type) {
    case "y":
      return strtoupper(dechex(10 + hexdec($char) % 6));
    break;
    case "x":
      return strtoupper($char);
    break;
    case "d":
      return hexdec($char) % 10;
    break;
    default:
      return $char;
  }
}

function generateSketchpadRoomFromString($str) {
  global $_SCHOOL_SECRET_KEY;
  $hash = hash("sha256", $_SCHOOL_SECRET_KEY.$str);
  $mask = "yxxxxxxxxxxddxxxxxx";
  $key = "";
  for ($i = 0; $i < strlen($mask); $i += 1) {
    $key .= getNormalisedChar($mask[$i], $hash[$i]);
  }
  $key .= ":".substr($hash, -8);
  return $key;
}