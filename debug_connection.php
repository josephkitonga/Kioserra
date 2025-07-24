<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== Debug Connection Creation ===" . PHP_EOL;

// Check the raw database config
$dbConfig = config('database');
echo "Default connection: " . $dbConfig['default'] . PHP_EOL;
echo "MySQL connection config: " . PHP_EOL;
print_r($dbConfig['connections']['mysql']);

// Check if there are any service providers modifying the connection
$connection = DB::connection();
echo "Connection class: " . get_class($connection) . PHP_EOL;

// Check the grammar
$grammar = $connection->getQueryGrammar();
echo "Grammar class: " . get_class($grammar) . PHP_EOL;

// Access the protected tablePrefix property using reflection
$reflection = new ReflectionClass($grammar);
$tablePrefixProperty = $reflection->getProperty('tablePrefix');
$tablePrefixProperty->setAccessible(true);
$actualPrefix = $tablePrefixProperty->getValue($grammar);

echo "Grammar tablePrefix type: " . gettype($actualPrefix) . PHP_EOL;
echo "Grammar tablePrefix value: ";
if (is_array($actualPrefix)) {
    print_r($actualPrefix);
} else {
    var_dump($actualPrefix);
}

echo "=== End Debug ===" . PHP_EOL;
