<?php

$n = intval(trim(fgets(STDIN)));
$intArray = array_map('intval', explode(' ', trim(fgets(STDIN))));

for ($i = $n - 1; $i >= 0; $i--) {
    echo $intArray[$i];
    if ($i != 0) echo " ";
}

echo "\n";
