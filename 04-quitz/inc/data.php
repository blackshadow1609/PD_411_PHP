<?php
    $title = 'Quitz PD_411';
const ROOT = __DIR__ . '\\..';
//const LOGIN_STYLE_PATH = "{$_SERVER['DOCUMENT_ROOT']}\\04-quitz\\css\\login.css";
//const QUITZ_STYLE_PATH = "{$_SERVER['DOCUMENT_ROOT']}\\04-quitz\\css\\quitz.css";

$questions = 
[
    'Кто создал игру Max Payne?',
    'На какком движке создана игра Crysis 2?',
    'Как зовут главного персонажа GTA Vice City?',
    'В каком году вышла GTA V?',
    'На какком движке разработана игра GTA V?'
];

$answers = 
[
    ['Bethesda', 'Crytek', 'Rockstar', 'Remady'],
    ['Cruengine 3', 'Crytek', 'Cruengine 5', 'RAGE'],
    ['Max Payne', 'Tommy Vercetty', 'Ricardo Diaz'],
    ['2003', '2012', '2013', '2015'],
    ['Cruengine 3', 'Crytek', 'Cruengine 5', 'RAGE']
];

$correct_answers = 
[
    3,
    0,
    1,
    2,
    3
];
?>
