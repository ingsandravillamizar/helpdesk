<?php 

    require_once 'DataBase.php';

    class User extends DataBase{

        /**
         * C reate 
         * R ead
         * U pdate
         * D elete
         */

         //------------ READ ----------------------------------------
        public function selectAll(){
            $sql = "SELECT * FROM users";
            $query = $this->conexion->query($sql);
            return $query->fetch_all(MYSQLI_ASSOC);

            //Me muestra el indice y el nombre de los campos de la tabla, para en el index poder llamrlo por el nombre
        }

        public function selectById($id){
            $sql = "SELECT * FROM users WHERE id = $id";
            $query = $this->conexion->query($sql);
            return $query->fetch_all(MYSQLI_ASSOC);
        }

        // -------------------- CREATE ----------------------
        public function create($data){
            $sql = "INSERT INTO users (name, email, password, rol, created_at, updated_at) VALUES (\"{$data['name']}\", \"{$data['email']}\", \"{$data['password']}\", \"{$data['rol']}\",\"{$data['create']}\", \"{$data['update']}\")";
            $response = $this->conexion->query($sql);
            return $response;
        }


        // -------------------- UPDATE -----------------------
        public function update($id, $data){
            $sql = "UPDATE users SET name=\"{$data['name']}\", email=\"{$data['email']}\", rol = \"{$data['rol']}\", updated_at = \"{$data['update']}\" WHERE id = $id";
            $response = $this->conexion->query($sql);
            return $response;
        }

        // -------------------- DELETE -----------------------
        public function delete($id){
            $sql = "DELETE FROM users WHERE id = $id";
            $response = $this->conexion->query($sql);
            return $response;
        }

        
        public function searchEmail($email){
            $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
            $query = $this->conexion->query($sql);
            return $query->fetch_all(MYSQLI_ASSOC);
            
        }
    }

