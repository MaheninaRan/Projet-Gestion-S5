<?php
if (!function_exists('returnGrand')) {
    function returnGrand($a, $b, $valinyA, $valinyB) {
        if ($a > $b) {
            return $valinyA;
        } else {
            return $valinyB;
        }
    }
}

?>