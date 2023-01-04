<?php

if (count($primeFactors) === 0) {
    echo 'An error has occurred!';
}

foreach ($primeFactors as $number => $data) {
    $result = null;

    if ($data['isPrime']) {
        $result = '[PRIME]';
    } else if (count($data['factors']) > 0) {
        $result =   '[' . implode(', ', $data['factors']) . ']';
    } else {
        $result = 'None';
    }

    echo $number . ' - ' . $result . "<br/>";
}

?>