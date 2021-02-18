<?php 

    class Login{
        public $user;
        public $password;
        public $state = 0;



        
        public function __construct(String $user, String $password,PDO $pdo)
        {
        /**
         * Valida que el usuario exista en el sistema, debe existir una tabla en la base de datos llamada usuario,
         * con los campos de usuario llamados user y el campo de password llamado pass
         * 
         * @param $usuario Es el usuario que va a ingresar al sistema 
         * @param $password Es el password del usuario que va a ingresar al sistema
         *  
         * @param $pdo Es el objeto de conexion a la base de datos para comprobar si el usuario existe en el sistema
         * 
         * Si se reconoce al usuario en el sistema el state del objeto pasara a 1 indicando que esta logueado sino
         * seguira con el state en 0 indicando que ah fallado la autenticacion
         */
            if(!is_string($user) || is_null($user) || $user ==""){
                return false;
            }else{
                if(!is_string($password) || is_null($password) || $password == ""){
                    return false;
                }else{
                    $this->user = $user;
                    $this->password = $password;

                    
                    $sql = 'SELECT * FROM usuario WHERE user = :usr AND pass = :pass';
                    $stmt = $pdo->prepare($sql);

                    
                    $response = $stmt->execute(array(':usr' => $this->user,
                                                    ':pass' => $this->password));
                                    
                    
                    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $this->state = 1;
                        return;
                    }else{
                        return false;
                    }
                }
            }

            

            
        }

        public function getState(){
            return $this->state;
        }


    }



    
?>