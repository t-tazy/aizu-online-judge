<?php

$r = trim(fgets(STDIN));

$area = $r * $r * pi();
$length = 2 * $r * pi();

echo "{$area} {$length}\n";
