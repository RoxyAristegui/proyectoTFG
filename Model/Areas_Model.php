<?php


include_once 'Abstract_Model_Class.php';

include_once 'Validar_Model.php';

Class Areas extends Abstract_Model
{
    var $codigo_area;
    var $nombre;
    var $responsable;

    function __construct($codigo_area,$nombre,$responsable){
    $this->codigo_area=$codigo_area;
    $this->nombre=$nombre;
    $this->responsable=$responsable;
    }

    function ADD(){

    }
    function EDIT(){

    }
    function DELETE()
    {
        // TODO: Implement DELETE() method.
    }
    function getById()
    {
        $this->query="select * from AREAS where codigo_area ='".$this->codigo_area."' ";
        $this->get_results_from_query();
        if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
            $this->ok=false;
            $this->code="005073"; // no existe el area
            $this->construct_response();
            return $this->feedback;
        }
        return $this->rows;
    }

    function SEARCH()    {
        $this->query="select * from AREAS where codigo_area like '".$this->codigo_area."' or nombre like '%".$this->nombre."%' or responsable like '".$this->codigo_area."'";

        $this->get_results_from_query();
        if($this->feedback['ok']===false || $this->feedback['code']=='00007'){
            $this->ok=false;
            $this->code="005073";
            $this->construct_response();
            return $this->feedback;
        }
        return $this->rows;
    }
}