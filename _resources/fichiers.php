<?php


function ecrire($nom,$txt) {
    $monfichier = fopen($nom, 'a');
    fputs($monfichier, $txt.PHP_EOL);
    fclose($monfichier);   
}



?>