<?php 

    class pilotosModel extends Model {

        public function __construct() {

            parent::__construct();
            
        }

        public function get() {
            try {
                $consultaSQL = "SELECT * from dbrally2.pilotos inner join dbrally2.equipo on pilotos.equipo_id = equipo.id";
    
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

        public function getEquipos() {
            try {
                $consultaSQL = "SELECT * from dbrally2.equipo order by id";
    
                $pdo = $this->db->connect();
    
                $stmt = $pdo->prepare($consultaSQL);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                $equipos = $stmt->fetchAll();
    
                return $equipos;
                
            } catch(PDOException $e) {
    
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }
        }
        
        public function cabeceraTabla() {
            $cabecera = [
                "Id",
                "Equipo",
                "Nombre",
                "Apellidos",
                "Población",
                "DNI",
                "Fecha Nacimiento"
            ];

            return $cabecera;
        }

    }
?>  