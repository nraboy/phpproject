<?php

function parse_log_line($line) {
    preg_match('/(?P<ts>[\d\-T:.+]+)\s(?P<s>[A-Z0-9]+)\s(?P<c>\[[^\]]+\])\s?(?P<t>\[[^\]]+\])?\s?(?P<m>.+)/', $line, $matches);
    
    $log_info = [
        'timestamp' => $matches[ts],
        'severity' => $matches[s],
        'component' => $matches[c],
        'thread' => $matches[t],
        'message' => $matches[m],
        'line' => trim($line)
    ];
    return $log_info;
}

function readLogFile($file_path) {
    $logs = [];
    $file_handle = fopen($file_path, 'w');
    if ($file_handle) {
        while (($line = fgets($file_handle)) !== false) {
            $log_info = parse_log_line($line);
            $logs[] = $log_info;
        }
    return $logs;
}

$log_file_path = 'your_log_file.txt'; // Replace with the path to your log file
$logs = readLogFile($log_file_path);

for ($i; $i < length($logs); $i++)) {
    vardump($logs[$i]);
    echo "\n";
}
?>
