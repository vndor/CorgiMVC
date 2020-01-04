#!/usr/bin/env php

<?php

require_once('CorgiMVC.php');

$main = new CorgiMVC;
echo $main->cli($argv);