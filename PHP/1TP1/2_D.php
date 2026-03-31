<?php

[$w, $h, $x, $y, $r] = explode(' ', trim(fgets(STDIN)));

if ($x + $r <= $w && $y + $r <= $h && $x - $r >= 0 && $y - $r >= 0) echo "Yes\n";
else echo "No\n";
