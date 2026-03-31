<?php

for ($i = 1; ; $i++) {
    $n = intval(trim(fgets(STDIN)));
    if ($n === 0) break;
    echo "Case {$i}: {$n}\n";
}
