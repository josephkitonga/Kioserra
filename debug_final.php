<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== Final Debug ===" . PHP_EOL;

$connection = DB::connection();
$prefix = $connection->getTablePrefix();

echo "getTablePrefix() type: " . gettype($prefix) . PHP_EOL;
echo "getTablePrefix() is_array: " . (is_array($prefix) ? 'true' : 'false') . PHP_EOL;

if (is_array($prefix)) {
    echo "Array contents:" . PHP_EOL;
    foreach ($prefix as $key => $value) {
        echo "  [$key] => " . var_export($value, true) . PHP_EOL;
    }
} else {
    echo "Value: " . var_export($prefix, true) . PHP_EOL;
}

// Test the problematic line directly
try {
    $table = 'migrations';
    echo "Testing concatenation..." . PHP_EOL;
    $result = (is_array($prefix) ? "" : (string) $prefix) . $table;
    echo "Concatenation result: " . $result . PHP_EOL;
} catch (Exception $e) {
    echo "Error in concatenation: " . $e->getMessage() . PHP_EOL;
}

echo "=== End Debug ===" . PHP_EOL;
