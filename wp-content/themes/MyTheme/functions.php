<?php

namespace App;

use App\Core\Bootstrap;

Bootstrap::getInstance()->boot([
    //'theme' => 'tailwind',
    'debug' => false
]);

// add_filter( 'acf/blocks/wrap_frontend_innerblocks', function( $wrap, $name ) {
//     // Отключаем обертку для конкретного блока или всех сразу
//     if ( $name === 'acf/sidebar' ) {
//         return false;
//     }
//     return $wrap;
// }, 10, 2 );