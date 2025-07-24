<?php

$grammarFile = 'vendor/laravel/framework/src/Illuminate/Database/Grammar.php';
$content = file_get_contents($grammarFile . '.backup');

// Find the wrapTable method and force string conversion
$newContent = str_replace(
    'return $this->wrap($this->tablePrefix.$table, true);',
    '$prefix = is_array($this->tablePrefix) ? "" : (string) $this->tablePrefix;
            return $this->wrap($prefix.$table, true);',
    $content
);

// Also fix other occurrences
$newContent = str_replace(
    '$segments[1] = $this->tablePrefix.$segments[1];',
    '$prefix = is_array($this->tablePrefix) ? "" : (string) $this->tablePrefix;
            $segments[1] = $prefix.$segments[1];',
    $newContent
);

// Fix setTablePrefix method
$newContent = str_replace(
    '$this->tablePrefix = $prefix;',
    '$this->tablePrefix = is_array($prefix) ? "" : (string) $prefix;',
    $newContent
);

file_put_contents($grammarFile, $newContent);
echo "Grammar.php patched successfully v4\n";
