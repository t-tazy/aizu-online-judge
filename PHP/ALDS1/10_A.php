<?php

function main(): void
{
    $n = intval(trim(fgets(STDIN)));
    $dp[0] = 1;
    $dp[1] = 1;

    for ($i = 2; $i <= $n; $i++) {
        $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
    }

    echo $dp[$n] . "\n";
}

main();
