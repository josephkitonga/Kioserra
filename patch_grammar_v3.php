<?php

$grammarFile = 'vendor/laravel/framework/src/Illuminate/Database/Grammar.php';
$content = file_get_contents($grammarFile . '.backup');

// Find the wrapTable method and add debugging
$newContent = str_replace(
    'return $this->wrap($this->tablePrefix.$table, true);',
    'try {
                if (is_array($this->tablePrefix)) {
                    file_put_contents("/tmp/debug_prefix.log", "tablePrefix is array, converting to empty string\n", FILE_APPEND);
                    $this->tablePrefix = "";
                }
                return $this->wrap($this->tablePrefix.$table, true);
            } catch (Exception $e) {
                file_put_contents("/tmp/debug_prefix.log", "Exception in wrapTable: " . $e->getMessage() . "\n", FILE_APPEND);
                $this->tablePrefix = "";
                return $this->wrap($this->tablePrefix.$table, true);
            }',
    $content
);

file_put_contents($grammarFile, $newContent);
echo "Grammar.php patched successfully v3\n";
