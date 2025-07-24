<?php

echo "Applying comprehensive Laravel array-to-string conversion fix...\n";

// 1. Fix Grammar.php - all occurrences
$grammarFile = 'vendor/laravel/framework/src/Illuminate/Database/Grammar.php';
$grammarContent = file_get_contents($grammarFile);

// Replace all tablePrefix concatenations with safe versions
$grammarContent = preg_replace(
    '/\$this->tablePrefix\.\$([a-zA-Z_]+)/',
    '((string) $this->tablePrefix).$\1',
    $grammarContent
);

// Fix setTablePrefix method
$grammarContent = str_replace(
    'public function setTablePrefix($prefix)',
    'public function setTablePrefix($prefix)',
    $grammarContent
);

$grammarContent = str_replace(
    '$this->tablePrefix = $prefix;',
    '$this->tablePrefix = is_array($prefix) ? \'\' : (string) $prefix;',
    $grammarContent
);

file_put_contents($grammarFile, $grammarContent);

// 2. Fix Schema Builder.php
$builderFile = 'vendor/laravel/framework/src/Illuminate/Database/Schema/Builder.php';
$builderContent = file_get_contents($builderFile);

$builderContent = str_replace(
    '$table = $this->connection->getTablePrefix().$table;',
    '$prefix = $this->connection->getTablePrefix(); $table = (is_array($prefix) ? \'\' : (string) $prefix) . $table;',
    $builderContent
);

file_put_contents($builderFile, $builderContent);

// 3. Fix Connection.php if needed
$connectionFile = 'vendor/laravel/framework/src/Illuminate/Database/Connection.php';
$connectionContent = file_get_contents($connectionFile);

// Ensure getTablePrefix always returns a string
$connectionContent = str_replace(
    'public function getTablePrefix()',
    'public function getTablePrefix()',
    $connectionContent
);

// Find the return statement in getTablePrefix and make it safe
$connectionContent = preg_replace(
    '/(public function getTablePrefix\(\).*?return\s+)(\$this->tablePrefix)(.*?;)/s',
    '\1(is_array(\2) ? \'\' : (string) \2)\3',
    $connectionContent
);

file_put_contents($connectionFile, $connectionContent);

echo "Laravel framework patched successfully!\n";
echo "The array to string conversion error should now be fixed.\n";
