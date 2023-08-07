<?php 

    class viewer{

        public function load_view($param, $template){
            require("views/$template");
        }

    }

?>