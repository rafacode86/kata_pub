<?php

/*Kata 64 per l'especialitat fullstackPHP 18-9-25

Un bar de copes té taules pels clients:

Cada taula té:

Un nombre identificador
Núm. de cadires
Un indicador de si ja està reservada o no.
Imagina't que ets un client/a que vol fer una reserva en aquest bar. Per fer-ho, haurem d'indicar:

Nom de la reserva
Quantitat de persones.
Crea un programa que representi tota aquesta informació i lògiques proposades */

    require_once __DIR__ . '\Table.php';
    require_once __DIR__ . '\Client.php';
    require_once __DIR__ . '\Pub.php';

    $tables = [
        new Table(1, 2),
        new Table(2, 4),
        new Table(3, 4),
        new Table(4, 6),
        new Table(5, 2),
    ];

    $pub = new Pub($tables);

    echo "Bienvenido al bar de la IT \n
    -------------------------------------------\n";

   while (true) {

    echo "---- Nueva reserva ----\n";

    $client = new Client();

    $pub->processReservation($client);

    echo "\nQuieres hacer otra reserva? (s/n): ";
    $respuesta = strtolower(trim(readline()));

    if ($respuesta !== 's') {
        break;
    }

    echo "\n";
    }