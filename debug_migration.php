<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== Debug Migration Issue ===" . PHP_EOL;

// Check current database configuration
$config = config('database.connections.mysql');
echo "Database config prefix: ";
var_dump($config['prefix']);

// Get the connection
$connection = DB::connection();
echo "Connection prefix type: " . gettype($connection->getTablePrefix()) . PHP_EOL;
echo "Connection prefix value: ";
var_dump($connection->getTablePrefix());

// Try to replicate the exact hasTable call that's failing
try {
    $schema = $connection->getSchemaBuilder();
    echo "Schema builder class: " . get_class($schema) . PHP_EOL;
    
    // This is the line that's failing
    echo "Testing hasTable('migrations')..." . PHP_EOL;
    $hasTable = $schema->hasTable('migrations');
    echo "hasTable result: " . ($hasTable ? 'true' : 'false') . PHP_EOL;
    
} catch (Exception $e) {
    echo "ERROR in hasTable: " . $e->getMessage() . PHP_EOL;
    echo "Error line: " . $e->getLine() . PHP_EOL;
    echo "Error file: " . $e->getFile() . PHP_EOL;
    
    // Let's debug the actual values being used
    echo "Debugging connection->getTablePrefix():" . PHP_EOL;
    $prefix = $connection->getTablePrefix();
    echo "Type: " . gettype($prefix) . PHP_EOL;
    if (is_array($prefix)) {
        echo "Array contents: ";
        print_r($prefix);
    } else {
        echo "Value: ";
        var_dump($prefix);
    }
}

echo "=== End Debug ===" . PHP_EOL;
