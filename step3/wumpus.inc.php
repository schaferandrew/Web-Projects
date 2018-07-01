<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 1/30/18
 * Time: 8:04 PM
 */
/**
 * Create an array that represents the cave
 * @returns Array
 */
function cave_array() {
    $cave = array(1 => array(5, 6, 2),
        2 => array(1, 8, 3),
        3 => array(4, 10, 2),
        4 => array(5, 12, 3),
        5 => array(1, 14, 4),
        6 => array(1, 7, 15),
        7 => array(6, 8, 16),
        8 => array(2, 9, 7),
        9 => array(8, 10, 17),
        10 => array(9, 3, 11),
        11 => array(18, 10, 12),
        12 => array(11, 4, 13),
        13 => array(19, 12, 14),
        14 => array(15, 13, 5),
        15 => array(6, 20, 14),
        16 => array(7, 17, 20),
        17 => array(9, 18, 16),
        18 => array(17, 11, 19),
        19 => array(20, 18, 13),
        20 => array(16, 19, 15));

    return $cave;
}