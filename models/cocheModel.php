<?php 

    class CocheModel extends Model {

        public function __construct() {

            parent::__construct();
            
        }

        public function get() {
            try {
                $consultaSQL = "SELECT c.id, c.marca, c.modelo, e.nombreE nombreEquipo, c.cilindrada 
                FROM dbrally2.coches c INNER JOIN dbrally2.equipo e ON c.equipo_id = e.id order by c.id";    
                $pdo = $this->db->connect();
    
                $stmt = $pdo->prepare($consultaSQL);
                $stmt->setFetchMode(PDO::FETCH_OBJ);
    
                $stmt->execute();
    
                $coche = $stmt->fetchAll();
    
                return $coche;
                
            } catch(PDOException $e) {
    
                $error = 'Error al leer registros '.$e->getMessage().' en la línea '.$e->getLine();
    
            }
        }

        public function getCoche($id){
            try{ 
                $sql = "SELECT * FROM dbrally2.coches WHERE id = :id LIMIT 1";
                $pdo = $this->db->connect();
                $stmt = $pdo->prepare($sql);
                
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                
                $coche = $stmt->fetch();
                

            return $coche;
            }
                
            catch (PDOException $e){
            
            exit($e->getMessage());
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

        public function insert($coche) {

            try 
            {
            
                $insertSQL =" INSERT INTO dbrally2.coches
                VALUES (null, :equipo_id, :marca, :modelo, :cilindrada)
                ";
    
                $pdo = $this->db->connect();
                $stmt = $pdo->prepare($insertSQL);
    
                $stmt->bindParam(':equipo_id', $coche['equipo_id'], PDO::PARAM_STR, 50);
                $stmt->bindParam(':marca', $coche['marca'], PDO::PARAM_STR, 40);
                $stmt->bindParam(':modelo', $coche['modelo'], PDO::PARAM_STR, 90);
                $stmt->bindParam(':cilindrada', $coche['cilindrada'], PDO::PARAM_STR, 20);
        
                $stmt->execute();
    
                return 'Registro Añadido Con Éxito';
                    
            } 
    
            catch (PDOException $e) 
            {
            
                $error = 'Error al añadir registro: ' . $e->getMessage() . " en la línea: " . $e->getLine();
                return $error;
            }
    
        }

        public function update($coche) {
            try {
                $updateSQL ="UPDATE dbrally2.coches SET
                equipo_id = :equipo_id,
                marca = :marca,
                modelo = :modelo,
                cilindrada = :cilindrada
                WHERE id = :id";
    
                $pdo = $this->db->connect();
                $stmt = $pdo->prepare($updateSQL);
                
                $stmt->bindParam(':id', $coche['id'], PDO::PARAM_INT);
                $stmt->bindParam(':equipo_id', $coche['equipo_id'], PDO::PARAM_INT);
                $stmt->bindParam(':marca', $coche['marca'], PDO::PARAM_STR, 40);
                $stmt->bindParam(':modelo', $coche['modelo'], PDO::PARAM_STR, 90);
                $stmt->bindParam(':cilindrada', $coche['cilindrada'], PDO::PARAM_STR, 20);
        
                $stmt->execute();
    
                return 'Registro actualizado Con Éxito';
                    
            } catch (PDOException $e) {
            
                $error = 'Error al actualizar el registro: ' . $e->getMessage() . " en la línea: " . $e->getLine();
                return $error;
            }
        }

        public function delete($id) {
            try {
            
                $deleteSQL ="DELETE FROM dbrally2.coches WHERE id = :id";
    
                $pdo = $this->db->connect();
                $stmt = $pdo->prepare($deleteSQL);
    
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
                $stmt->execute();
    
                return 'Registro borrado Con Éxito';
                    
            } catch (PDOException $e) {
            
                $error = 'Error al borrar registro: ' . $e->getMessage() . " en la línea: " . $e->getLine();
                return $error;
            }
        }
        
        public function cabeceraTabla() {
            $cabecera = [
                "Id",
                "Equipo",
                "Marca",
                "Modelo",
                "Cilindrada"
            ];

            return $cabecera;
        }

        public function order($param){
            $campo = $param[0];
            try {
                $consultaSQL = "SELECT c.id, c.marca, c.modelo, e.nombreE nombreEquipo, c.cilindrada 
                FROM dbrally2.coches c INNER JOIN dbrally2.equipo e ON c.equipo_id = e.id ORDER BY $campo ASC";
    
                $pdo = $this->db->connect();
                $pdoStmt = $pdo->prepare($consultaSQL);
    
                $pdoStmt->setFetchMode(PDO::FETCH_OBJ);
    
                $pdoStmt->execute();
    
                $coche = $pdoStmt->fetchAll();
    
                return $coche;

            } catch (PDOException $e) {
                $error = "Error al leer registros: " . $e->getMessage() .  " en la línea " . $e->getLine();
            }
        }
    
        public function buscar($param){
            $campo = $param;
            try {
                $consultaSQL = "SELECT c.id, c.marca, c.modelo, e.nombreE nombreEquipo, c.cilindrada 
                FROM dbrally2.coches c INNER JOIN dbrally2.equipo e ON c.equipo_id = e.id
                WHERE e.nombreE LIKE '%$campo%' OR
                c.marca LIKE '%$campo%' OR
                c.modelo LIKE '%$campo%' OR
                c.cilindrada LIKE '%$campo%'";
    
                $pdo = $this->db->connect();
                $pdoStmt = $pdo->prepare($consultaSQL);
    
                $pdoStmt->setFetchMode(PDO::FETCH_OBJ);
    
                $pdoStmt->execute();
    
                $coche = $pdoStmt->fetchAll();
    
                return $coche;
            } catch (PDOException $e) {
                $error = "Error al leer registros: " . $e->getMessage() .  " en la línea " . $e->getLine();
            }
        }

    }
?>  