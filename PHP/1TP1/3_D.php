<?php

[$a, $b, $c] = array_map('intval', explode(' ', trim(fgets(STDIN))));

$count = 0;
for ($i = $a; $i <= $b; $i++) {
    if ($c % $i === 0) $count++;
}

echo $count, "\n";
