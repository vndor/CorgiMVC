<?php 

require __DIR__ . '/../src/Container.php';

$app = new aphp\Foundation\Container;

$app->prop0 = 'prop0';

$app->prop1 = function($c) {
	echo 'prop1 - init' . PHP_EOL;
	return 'prop1';
};
$app->prop2 = function($c) {
	echo 'prop2 - init' . PHP_EOL;
	return 'prop2 - ('. $c->prop0 .' '. $c->prop1 .')';
};

for ($i = 0; $i<10; $i++) {
	echo $i . ' - ' . $app->prop2 . PHP_EOL;
}

unset($app->prop1);
unset($app->prop2);

$app->prop1 = 'prop1 new';
$app->prop2 = function($c) {
	echo 'prop2 - init' . PHP_EOL;
	return 'prop2 - ('. $c->prop0 .' '. $c->prop1 .')';
};

for ($i = 0; $i<10; $i++) {
	echo $i . ' - ' . $app->prop2 . PHP_EOL;
}
