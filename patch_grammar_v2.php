<?php

$grammarFile = 'vendor/laravel/framework/src/Illuminate/Database/Grammar.php';
$content = file_get_contents($grammarFile);

// Restore original first
$content = file_get_contents($grammarFile . '.backup');

// Find the wrapTable method and add debugging
$newContent = str_replace(
    'return $this->wrap($this->tablePrefix.$table, true);',
    'if (is_array($this->tablePrefix)) {
                file_put_contents("/tmp/debug_prefix.log", "WARNING: tablePrefix is array: " . print_r($this->tablePrefix, true) . "\n", FILE_APPEND);
                $this->tablePrefix = "";
            }
            return $this->wrap($this->tablePrefix.$table, true);',
    $content
);

// Also fix the setTablePrefix method
$newContent = str_replace(
    '$this->tablePrefix = $prefix;',
    'if (is_array($prefix)) {
            file_put_contents("/tmp/debug_prefix.log", "WARNING: Setting tablePrefix to array: " . print_r($prefix, true) . "\n", FILE_APPEND);
            $this->tablePrefix = "";
        } else {
            $this->tablePrefix = $prefix;
        }',
    $newContent
);

file_put_contents($grammarFile, $newContent);
echo "Grammar.php patched successfully v2\n";
