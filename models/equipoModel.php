<?php 

    class EquipoModel extends Model {

        public function __construct() {

            parent::__construct();
            
        }

        public function get() {
            try {
                $consultaSQL = "SELECT * FROM dbrally2.equipo ORDER BY id";
    
                $pdo = $this->db->connect();
    
                $stmt = $pdo->prepare($consultaSQL);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                $equipo = $stmt->fetchAll();
    
                return $equipo;
                
            } catch(PDOException $e) {
    
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }
        }
        
        public function cabeceraTabla() {
            $cabecera = [
                "Id",
                "Nombre",
                "Número de mecánicos"
            ];

            return $cabecera;
        }

    }
?>  