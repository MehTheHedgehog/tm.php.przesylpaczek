<?php

class Paczki
{
    private $dbarray = array();


    function __construct() {
        if(file_exists("./database/paczki.csv")){

            $file = fopen("./database/paczki.csv", "r");
            if($file != FALSE){
                while(($data = fgetcsv($file, 1000, ',', ';')) !== FALSE){
                    $this->dbarray[] = $data;
                }
                fclose($file);
            }
        }
        
    }

    public function search_by_name($name){
        $array = array();
        foreach($this->dbarray as $data){
            if($data[1] == $name)
                $array[] = $data;
            
            if(!empty($array))
                return $array;
        }

        return NULL;
    }

    public function search_by_id($id){
        foreach($this->dbarray as $data){
            if($data[0] == $id)
                return $data;
        }

        return NULL;
    }

    public function add($user, $address, $city, $country, $status = '0'){
        $id = rand (0 , 15000);
        if(NULL == $this->search_by_id($id)){
            $new_pack = array($id, $user, $status, $address, $city, $country);
            if(array_push($this->dbarray, $new_pack))
                return $new_pack;
            else
                return NULL;
        }else{
            return $this->add($user, $address, $city, $country, $status);
        }
    }

    public function change_status($id, $new_status){
        $pack =  $this->search_by_id($id);
        if(NULL != $pack){
            $pack[2] = $new_status;
            return true;
        }else{
            return false;
        }
    }

    public function all(){
        return $this->dbarray;
    }

    function __destruct() {
        $file = fopen("./paczki.csv", "w+");
        if($file != FALSE){
            foreach($this->dbarray as $data){
                fputcsv($file, $data, ',', ';');
            }
                
            
            fclose($file);
        }

    }

}

?>