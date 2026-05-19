<?php

function getLCS(string $x, string $y): int
{
    $xLen = strlen($x);
    $yLen = strlen($y);

    $dp = array_fill(0, $xLen + 1, array_fill(0, $yLen + 1, 0)); // i = 0 or j = 0の漸化式に合わせるため、長さ+1

    for ($i = 1; $i <= $xLen; $i++) {
        for ($j = 1; $j <= $yLen; $j++) {
            if ($x[$i - 1] === $y[$j - 1]) { // $dp[$i][$j] は 1文字目スタートなので、文字列の1文字目とindexをあわせるため-1
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }

    return $dp[$xLen][$yLen];
}

function main(): void
{
    global $n;

    $n = intval(trim(fgets(STDIN)));

    for ($i = 0; $i < $n; $i++) {
        $x = trim(fgets(STDIN));
        $y = trim(fgets(STDIN));
        echo getLCS($x, $y) . "\n";
    }
}

main();
