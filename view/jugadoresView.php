<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class jugadoresView{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function mostrarjugadores($jugador,$equipos){  
        $this->smarty->assign('jugador', "Todas los jugadores");
        $this->smarty->assign('jugadorArrays', $jugador);
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('templates/jugadoresList.tpl');  

    }
    function mostrarDetalle($detailjugador){
        $this->smarty->assign('detalles',"Detalles de jugador");
        $this->smarty->assign('details',$detailjugador);
        $this->smarty->display('templates/detailjugador.tpl'); 
    }
    function jugadoresdeequipo($jugadoresdeeseequipo){
        $this->smarty->assign('jugadores',"jugadores de este equipo");
        $this->smarty->assign('jugadoresarrays', $jugadoresdeeseequipo);
        $this->smarty->display('jugadoresenesteequipo.tpl');
    }
    
    function showeditform($id,$equipos,$jugador){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('equipos',$equipos);
        $this->smarty->assign('jugador',$jugador);
        $this->smarty->display('formeditarjugador.tpl');
    }
}
