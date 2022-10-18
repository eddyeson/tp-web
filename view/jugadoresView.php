<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class jugadoresView{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function mostrarjugadores($jugadoresdeeseequipo){  
        //from=$jugadorArrays item=$jugador
        $this->smarty->assign('jugador', "Todas los jugadores");
        $this->smarty->assign('jugadorArrays', $jugadoresdeeseequipo);
        $this->smarty->display('templates/jugadoresList.tpl'); // muestro el template   

    }
    function mostrarDetalle($detailjugador){
        $this->smarty->assign('detalles',"Detalles de jugador");
        $this->smarty->assign('details',$detailjugador);
        $this->smarty->display('templates/detailjugador.tpl'); // muestro el template   
    }
    function jugadoresdeequipo($jugadoresdeeseequipo){
        $this->smarty->assign('jugadores',"jugadores de este equipo");
        $this->smarty->assign('jugadoresarrays', $jugadoresdeeseequipo);
        $this->smarty->display('jugadoresenesteequipo.tpl');
    }
    /*function vistaeditform($editarjugador){
        $this->smarty->assign('editarjugador',$editarjugador);
        $this->smarty->display('detailjugador.tpl');
    }*/
    function showeditform($id){
        $this->smarty->assign('id', $id);
        $this->smarty->display('formeditarjugador.tpl');
    }
}
