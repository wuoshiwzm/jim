<?php
die('hello');

$binarydata = "\x04\x00\xa0\x00";
$array = unpack("C", $binarydata);
var_dump($array);