<?php

$n = intval(trim(fgets(STDIN)));
$cards = [];

while ($card = trim(fgets(STDIN))) {
    [$suit, $number] = explode(' ', $card);
    $number = (int) $number;
    $suitIndex = match ($suit) {
        'S' => 1,
        'H' => 2,
        'C' => 3,
        'D' => 4,
    };
    $cards[$suitIndex][$number] = 1;
}

// SHCDが与えられる前提になってしまっている
// ['S', 'H', 'C', 'D']でループすること
foreach ($cards as $suitIndex => $numbers) {
    for ($i = 1; $i <= 13; $i++) {
        if (!isset($numbers[$i])) {
            $suit = match ($suitIndex) {
                1 => 'S',
                2 => 'H',
                3 => 'C',
                4 => 'D',
            };
            echo "{$suit} {$i}\n";
        }
    }
}
