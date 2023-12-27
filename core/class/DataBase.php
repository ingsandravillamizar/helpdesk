<?php 

    class DataBase {

        private $dbHost     = 'localhost';      //Atributo
        private $dbName     = 'helpdesk';       //Atributo
        private $dbPassword = 'svillamizar';    //Atributo
        private $dbUser     = 'root';           //Atributo

        protected $conexion;     //Atributo Heredable

        public function __construct(){
            try {
                $this->conexion = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
            } catch (\Throwable $th) {
                die("Error de conexión a la base de datos, " . $th->getMessage());
            }
        }
        
    }


    // Una clase solo puede heredar atributos y metodos,  LAS VARIABLES NO 