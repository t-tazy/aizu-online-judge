<?php

[$a, $b] = explode(' ', fgets(STDIN));
$area = $a * $b;
$length = ($a + $b) * 2;
echo $area, ' ', $length, "\n";
