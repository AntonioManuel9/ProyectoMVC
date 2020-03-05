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
        
        public function insert($carrera) {

            try 
            {
            
                $insertSQL ="
    
                INSERT INTO articulos (descripcion, precio_costo, precio_venta, categoria_id, stock,  imagen)
                VALUES ( :descripcion, :precio_costo, :precio_venta, :categoria_id, :stock, :imagen)
    
                ";
    
                $pdo = $this->db->connect();
                $pdoStmt = $pdo->prepare($insertSQL);
    
                $pdoStmt->bindParam(':descripcion', $articulo['descripcion'], PDO::PARAM_STR, 50);
                $pdoStmt->bindParam(':precio_costo', $articulo['precio_costo']);
                $pdoStmt->bindParam(':precio_venta', $articulo['precio_venta']);
                $pdoStmt->bindParam(':categoria_id', $articulo['categoria_id'], PDO::PARAM_INT);
                $pdoStmt->bindParam(':stock', $articulo['stock'], PDO::PARAM_INT);
                $pdoStmt->bindParam(':imagen', $articulo['imagen'], PDO::PARAM_STR, 50);
        
                $pdoStmt->execute();
    
                return 'Registro Añadido Con Éxito';
                    
            } 
    
            catch (PDOException $e) 
            {
            
                $error = 'Error al añadir registro: ' . $e->getMessage() . " en la línea: " . $e->getLine();
                return $error;
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