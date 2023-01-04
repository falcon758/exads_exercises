<?php

if (count($ascii) === 0) {
    echo 'An error has occurred!';
}

foreach ($ascii['ascii'] ?? [] as $character) {
    echo 'Character: ' . $character . "<br/>";
}

echo '<br/>Missing: ' . $ascii['missing'];

?>