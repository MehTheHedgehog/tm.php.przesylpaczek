<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

class User
{
    private $dbarray = array();


    function __construct() {
        if(file_exists("./database/users.csv")){

            $file = fopen("./database/users.csv", "r");
            if($file != FALSE){
                while(($data = fgetcsv($file, 1000, ',', ';')) !== FALSE){
                    $this->dbarray[] = $data;
                }
                fclose($file);
            }
        }
        
    }

    private function hashit ($haslo){
      $haslo1 = $haslo."ZAQ!@#$%67890P:?";
      $haslo2 = hash("sha512", $haslo1);
      return md5($haslo2);
    }

    public function search($login){
        foreach($this->dbarray as $data){
            if($data[0] == $login)
                return true;
        }

        return false;
    }

    public function login($login, $password)
    {
        foreach($this->dbarray as $data){
            if($data[0] == $login)
                //if($data[1] == $this->hashit($password))
                    return true;
        }

        return false;
    }

    public function add($login, $password){
        if(!$this->search($login)){
            if(array_push($this->dbarray, array($login, $this->hashit($password))))
                return true;
            else
                return false;
        }
    }

    public function all(){
        return $this->dbarray;
    }

    function __destruct() {
        $file = fopen("./users.csv", "w+");
        if($file != FALSE){
            foreach($this->dbarray as $data){
                fputcsv($file, $data, ',', ';');
            }
                
            
            fclose($file);
        }

    }

}

?>