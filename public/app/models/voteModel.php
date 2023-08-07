<?php 
    
    class voteModel{

        private $db_handle;
        private $config;


        public function __construct(Type $var = null) {
            $this->var = $var;
            $this->config = new config();
            
        }

        private function run_query($query){
           $db_handle = pg_connect($this->config->getConfigDB()['db_connect']);
            
           if ($db_handle) {
                //echo 'Connection attempt succeeded.';
            } else {
                echo 'Connection attempt failed.';
            }
        
            $result=pg_query($db_handle, $query);
            if  (!$result) {
                echo "query did not execute";
            }
            $rs = pg_fetch_all($result);
            if (!$rs) {
                //echo "0 records";
            }
            pg_close($db_handle);
            
            return $rs;
        }

        public function allCanditates(){
           return  $this->run_query("SELECT * FROM canditate");   
        }
        public function allMedia(){
            return  $this->run_query("SELECT * FROM media");   
        }

        public function allregion(){
            return  $this->run_query("SELECT * FROM region");   
        }

        public function allcomunaById($id){
            return  $this->run_query("SELECT * FROM comuna WHERE id_region='$id'");   
        }

        public function newVote($data){
            return  $this->run_query('INSERT INTO vote ("name", "last_name", "alias", "rut", "comuna", "candidate")
            VALUES (\''.$data['name'].'\', \''.$data['last_name'].'\', \''.$data['alias'].'\', \''.$data['rut'].'\', \''.$data['comuna'].'\', \''.$data['candidato'].'\') RETURNING "id" ');   
        }

        public function newMediaVote($data){
            return  $this->run_query('INSERT INTO vote_media ("id_vote", "id_media")
            VALUES (\''.$data['id_vote'].'\', \''.$data['id_media'].'\')');   
        }

        public function existVoto($rut){
            return  $this->run_query('SELECT * from vote where rut=\''.$rut.'\' ');   
        }


    }
?>