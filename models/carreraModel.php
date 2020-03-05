<?php 

    class CarreraModel extends Model {

        public function __construct() {

            parent::__construct();
            
        }

        public function get() {
            try {
                $consultaSQL = "SELECT * from dbrally2.carrera inner join dbrally2.pilotos on carrera.piloto_id = carrera.id";
    
                $pdo = $this->db->connect();
    
                $stmt = $pdo->prepare($consultaSQL);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                $carrera = $stmt->fetchAll();
    
                return $carrera;
                
            } catch(PDOException $e) {
    
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }
        }

        public function getPilotos() {

            try {
                $consultaSQL = "SELECT * from dbrally2.pilotos order by id";
    
                $pdo = $this->db->connect();
    
                $stmt = $pdo->prepare($consultaSQL);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                $pilotos = $stmt->fetchAll();
    
                return $pilotos;
                
            } catch(PDOException $e) {
    
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }
        }
        
        public function cabeceraTabla() {
            $cabecera = [
                "Id",
                "Piloto",
                "Localización",
                "Número de participantes",
                "Fecha"
            ];

            return $cabecera;
        }

    }
?>  