<?php
$command = escapeshellcmd('python3 /var/www/html/python/schoolplan.py');
$rcmd=shell_exec($command);
$output=file_get_contents('/var/www/html/python/schoolplan.txt');
$out=(base64_decode($output));

echo $out;
?>