<?php

$sec = fgets(STDIN);
$h = intdiv($sec, 3600);
$m = intdiv($sec % 3600, 60);
$s = $sec % 3600 % 60;
echo $h, ':', $m, ':', $s, "\n";
