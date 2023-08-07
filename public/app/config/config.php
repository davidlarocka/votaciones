<?php 

class config {

    public $config;

    public function getConfigDB(){
        $this->config['db_connect'] = "host=db dbname=app_desis user=postgres password=postgres";
        return  $this->config;
    }

}



?>