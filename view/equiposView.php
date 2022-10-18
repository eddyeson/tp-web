<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class equiposView{
    private $smarty;

    function __construct()
    {
        $this->smarty=new Smarty();
    }

    function mostrarequipos($equipos){
        $this->smarty->assign('equipos',"Todos los equipos");
        $this->smarty->assign('equipoArrays', $equipos);
        $this->smarty->display('templates/equipList.tpl');
}
function showeditformequipo($id){
    $this->smarty->assign('id', $id);
    $this->smarty->display('formeditarequipo.tpl');
}

   
}