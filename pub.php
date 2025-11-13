<?php

    class Pub {

        private array $tables = [];
        private array $reservations = [];

        public function __construct(array $tables) {
            $this->tables = $tables;
            $this->reservations = [];
        }

        public function getTables(): array {
            return $this->tables;  
        }

        public function addTable(Table $table): void {
            $this->tables[] = $table;
        }

// primero el metodo que queria hacer era un for each con numero exacto y si no coincidia sumarle +1 a people
//pero si lo hago y quieren hacer una reserva para mas gente de la que tengo mesa sera un bucle infinito, asi que 
//de momento no teendre en cuenta la adecuacion mas parecida.
        public function makeReservation(Client $client): ?Table {
            $people = $client->getPeople();

            foreach ($this->tables as $table) {
                if (!$table->getReserved() && $table->getChairs() >= $people) {
                    $table->setReserved(true);

                    $this->reservations[] = [
                    'name' => $client->getName(),
                    'people' => $client->getPeople(),
                    'tableId' => $table->getId()
                ];
                    return $table;
                }
            }
            return null;
        }

        public function processReservation(Client $client): void {
        $table = $this->makeReservation($client);

        if ($table === null) {
            echo "Lo sentimos, no hay mesa disponible para {$client->getPeople()} personas.\n";
        } else {
            echo "Reserva hecha!\n";
            echo "Nombre: {$client->getName()}\n";
            echo "Numero de mesa: {$table->getId()} \n";
        }
    }

        public function getReservations(): array {
        return $this->reservations;
    }
    } 


?>
