<?php

$grammarFile = 'vendor/laravel/framework/src/Illuminate/Database/Grammar.php';
$content = file_get_contents($grammarFile);

// Find the wrapTable method and add debugging
$newContent = str_replace(
    'return $this->wrap((string) $this->tablePrefix.$table, true);',
    'if (is_array($this->tablePrefix)) {
                error_log("WARNING: tablePrefix is array: " . print_r($this->tablePrefix, true));
                $this->tablePrefix = "";
            }
            return $this->wrap($this->tablePrefix.$table, true);',
    $content
);

// Also fix the setTablePrefix method
$newContent = str_replace(
    '$this->tablePrefix = (string) $prefix;',
    'if (is_array($prefix)) {
            error_log("WARNING: Setting tablePrefix to array: " . print_r($prefix, true));
            $this->tablePrefix = "";
        } else {
            $this->tablePrefix = $prefix;
        }',
    $newContent
);

file_put_contents($grammarFile, $newContent);
echo "Grammar.php patched successfully\n";
