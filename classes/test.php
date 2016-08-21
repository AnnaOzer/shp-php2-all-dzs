<?php

require_once __DIR__ . '/Storage.php';

$st = new Storage();

$st->alfa = 'Keyer';
$st->beta = 'Semenov';
$st->gamma = 'Lurie';
$st->delta = 'Petrov';

$i=0;
foreach ($st as $v) {
    $i++;
}

if( assert(count($st) == 4 && $i==4 ) ) {
    echo 'Assertion that Storage implements Countable is passed';
    echo '<br>';
};

if (
    assert( $st->current() == 'Keyer' ) &&
    assert ( $st->next() == 'Semenov' ) &&
    assert ( $st->key() == 'beta' ) &&
    assert ( $st->valid() ) &&
    assert ( $st->next() == 'Lurie') &&
    assert ( $st->next() == 'Petrov') &&
    assert ( !( $st->valid() )) &&
    $st->rewind() &&
    assert ( $st->current() == 'Keyer' )
) {
    echo 'Assertion that Storage implements Iterator is passed';
}