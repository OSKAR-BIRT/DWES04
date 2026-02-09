<?php

namespace app\utils;

use app\controllers\Booking;
use app\models\reserva;

class CsvDataHandle {

    private $csvFile;

    function __construct(string $fileName) {
        $this->csvFile = __DIR__ . '/../../data/' . $fileName;
    }

    public function readBooking(): array {
        // Abrimos el archivo en modo read y guardamos la referencia al stream
        $handle = fopen(filename: $this->csvFile, mode: 'r');

        // Si no se ha podido abrir, finalizamos el proceso
        if ($handle === false) {
            die('Failed to open the file');
        }

        // Leemos el primer registro, que es la cabecera de la tabla
        $headers = fgetcsv(stream: $handle, length: 0, separator: ',');

        // Creamos un array vacio para almacenar los registros que vayamos leyendo
        $booking = [];

        // Bucle que lee uno a uno los registros, los convierte en objeto reserva  y los añade al array
        while (($row = fgetcsv(stream: $handle, length: 0, separator: ',')) !== false) {
            $data = array_combine(keys: $headers, values: $row);
            $booking[] = new Reserva(
                $data['id'],
                $data['usuario'],
                $data['fecha'],
                $data['hora'],
                $data['intervalo'],
                $data['periodo'],
                $data['precio'],
                $data['pagado']
            );
        }

        // Cerramos el fichero csv
        fclose(stream: $handle);

        // Devolvemos el array de objetos reserva
        return $booking;
    }


    public function appendBooking(array $bookingData): void
    {
        // Abrimos el archivo en modo append y guardamos la referencia al stream
        $handle = fopen(filename: $this->csvFile, mode: 'a');

        // Si no se ha podido abrir, finalizamos el proceso
        if ($handle === false) {
            die('Failed to open the file');
        }

        // Añadimos el array al final del csv
        fputcsv(stream: $handle, fields: $bookingData);

        // Cerramos el fichero
        fclose(stream: $handle);
    }

    public function writeBooking(array $bookingData): void {
        // Abrimos el archivo en modo write y guardamos la referencia al stream
        $handle = fopen(filename: $this->csvFile, mode: 'w');

        // Si no se ha podido abrir, finalizamos el proceso
        if ($handle === false) {
            die('Failed to open the file');
        }

        // Cambiamos el contenido del archivo por el contenido del array
        fputcsv(stream: $handle, fields: $bookingData);
        
        // Cerramos el fichero
        fclose(stream: $handle);    }

}






