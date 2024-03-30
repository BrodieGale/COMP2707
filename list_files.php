<?php
$dir = "uploads/";
$files = scandir($dir);
$result = [];

foreach ($files as $file) {
    if ($file != "." && $file != "..") {
        $result[] = $file;
    }
}

echo json_encode($result);
?>