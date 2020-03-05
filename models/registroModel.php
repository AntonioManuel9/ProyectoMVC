<?php 

    class RegistroModel extends Model {

        public function __construct() {

            parent::__construct();
            
        }

        public function get() {
            try {
                $consultaSQL = "SELECT * from dbrally2.registro 
                    inner join 
                        dbrally2.pilotos 
                    inner join 
                        dbrally2.coches on registro.piloto_id = pilotos.id 
                        & registro.coche_id = coches.id";
    
                $pdo = $this->db->connect();
    
                $stmt = $pdo->prepare($consultaSQL);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                $registro = $stmt->fetchAll();
    
                return $registro;
                
            } catch(PDOException $e) {
    
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }
        }
        
        public function cabeceraTabla() {
            $cabecera = [
                "Id",
                "Etapa",
                "Piloto",
                "Coche",
                "Salida",
                "Llegada",
                "Tiempo"
            ];

            return $cabecera;
        }

    }
?>  