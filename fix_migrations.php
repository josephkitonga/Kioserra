<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== Custom Migration Fix ===" . PHP_EOL;

try {
    // Use raw PDO to avoid Laravel's migration system
    $pdo = new PDO(
        'mysql:host=' . env('DB_HOST') . ';dbname=' . env('DB_DATABASE'), 
        env('DB_USERNAME'), 
        env('DB_PASSWORD')
    );
    
    // Check if migrations table exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'migrations'");
    if ($stmt->rowCount() == 0) {
        echo "Creating migrations table..." . PHP_EOL;
        $pdo->exec("
            CREATE TABLE migrations (
                id int unsigned NOT NULL AUTO_INCREMENT,
                migration varchar(255) NOT NULL,
                batch int NOT NULL,
                PRIMARY KEY (id)
            )
        ");
        echo "Migrations table created successfully." . PHP_EOL;
    } else {
        echo "Migrations table already exists." . PHP_EOL;
    }
    
    // Now try to run a simple Laravel migration command that doesn't use the problematic methods
    echo "Testing Laravel connection..." . PHP_EOL;
    $result = DB::select('SELECT COUNT(*) as count FROM migrations');
    echo "Migrations table has " . $result[0]->count . " entries." . PHP_EOL;
    
    echo "Migration system fixed successfully!" . PHP_EOL;
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}

echo "=== End Fix ===" . PHP_EOL;
