
<?php

//	Variable //
$text = "Hello World 123";
$integer = 8;
$float = 08.08;
$boolean = true;
$array = array($text, $integer, $float, $boolean);

//displaying variable type
var_dump($text . "<br/>");
var_dump($integer . "<br/>");
var_dump($float . "<br/>");
var_dump($boolean . "<br/>");
var_dump($array);
echo "<br/><br/>";

//	String Function //

//concatenate
echo $text . " " . $integer . "<br/>";

//string length
echo (strlen($text) . "<br/>");

//string replace (wants to replace, what to replace, subject)
echo (str_replace(" ", "..", $text) . "<br/>");

//get position of a character (subject, want to find)
echo strpos($text, "World");

// Constants // (constant name, value of constant, True or False if you want to be case sensitive)
define("Master", "Ronald");
echo "<br/><br/>";
echo Master;

//	Operators //
$x = 15;
$y = 12;
