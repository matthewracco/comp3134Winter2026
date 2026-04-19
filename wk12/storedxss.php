<?php
$file = "storedxss.txt";

$content = file_get_contents($file);

echo $content;
?>
