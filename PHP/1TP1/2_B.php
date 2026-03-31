<?php

[$a, $b, $c] = explode(' ', trim(fgets(STDIN)));

if ($a < $b && $b < $c) echo "Yes\n";
else echo "No\n";
