<?php 

require_once("controllers/HomeController.php");
require_once("helpers/Viewer.php");
require_once("models/voteModel.php");
require_once("config/config.php");
    


$home = new HomeController();

if(isset ($_GET['region'])){
    if($_GET['region'] != ''){
        $home->getComunasByRegion($_GET['region'] );
    }

}
else if(isset ($_GET['send']) ){
    if($_GET['send'] == 1){
        $home->saveVote($_POST );
    }
}
else{
    $home->getInterfaceHome();
}

?>