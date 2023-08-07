<?php 

    class homeController{

        private $model_vote = null;
        
        public function __construct(Type $var = null) {
            $this->model_vote = new voteModel();
            $this->view_home = new viewer();
        } 

        public function getInterfaceHome(){
            $param['candidates'] = $this->getCanditatesAll();
            $param['media'] = $this->getMediaAll();
            $param['region'] = $this->getRegionAll();
    
            $this->view_home->load_view($param, "HomeTemplate.php");
        }

        public function getComunasByRegion($id_region){
            echo  json_encode($this->model_vote->allcomunaById($id_region));
            exit;
        }

        public function saveVote($data){
            
            //validar votos previos
            $exist_vote = $this->model_vote->existVoto($data['rut']);
            if(count($exist_vote) > 0){
                echo "ya existe un rut asociado a este voto <a href=\"javascript:window.location.reload(true)\">Regresar</a>";
                exit;
            }
            
            $id_new_record = $this->model_vote->newVote($data);
            
            $media = explode(",", $data['media']);

            foreach($media as $m){
                if($m != ""){
                    $this->model_vote->newMediaVote(["id_vote" => $id_new_record[0]['id'], "id_media" => $m ]);
                }
            }
            echo "Datos guardados con éxito <a href=\"javascript:window.location.reload(true)\">Regresar</a>";
            exit;
        }

        private function getCanditatesAll(){
           return  $this->model_vote->allCanditates();
        }

        private function getMediaAll(){
            return  $this->model_vote->allMedia();
        }

        private function getRegionAll(){
            return  $this->model_vote->allregion();
        }

    }

?>