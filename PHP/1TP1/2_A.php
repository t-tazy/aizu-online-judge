<?php

[$a, $b] = explode(' ', trim(fgets(STDIN)));

$output = '';

if ($a < $b) $output = 'a < b';
else if ($a > $b) $output = 'a > b';
else if ($a === $b) $output = 'a == b';

echo $output, "\n";
