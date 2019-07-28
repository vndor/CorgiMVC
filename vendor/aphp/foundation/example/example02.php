<?php 

require __DIR__ . '/../src/ANullObject.php';

$null = new aphp\Foundation\ANullObject;

$null->method1();
$null->method2(1, 2);
$z = $null->method3(1, [ 'string' => 'value'], false);
var_dump($z);

$null->a = 1;
$null->b = 'value';

$z = isset($null->a);
var_dump($z);
$z = isset($null->b);
var_dump($z);

$z = $null->a . $null->b . $null->method4();
var_dump($z);