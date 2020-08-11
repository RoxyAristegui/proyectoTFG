<?php

include_once 'Abstract_Model_Class.php';
include_once 'Validar_Model.php';

class Trabajadores_Model extends Abstract_Model
{

    var $DNI;
    var $nombre_completo;
    var $erroresdatos=[];

    function __construct($DNI,$nombre_completo)
    {
        $this->DNI=$DNI;
        $this->nombre_completo=$nombre_completo;
    }

    // function Validar_atributos
    // se lanzan las funciones de comprobacion de atributos
    //sino hay errores devuelve true, sino el array de errores.

    function Validar_atributos(){
        $this->Comprobar_nombre();
        $this->Comprobar_DNI();
        if($this->erroresdatos==[]){
            return true;
        }else{
        return $this->erroresdatos;
        }
    }

    // Comprueba el formato del nombre
    //	solo letras, entre 3 y 80 carácteres
    //	no vacio
    // si se detectaron errores los añade al array de erroers
    function Comprobar_nombre()
    {
        $validar= new Validar();
        if($validar->Longitud_minima($this->nombre_completo,3)===false){
            $this->code='000121';
            $this->ok=false;
            $this->resource='Nombre';
            $this->construct_response();
            array_push($this->erroresdatos, $this->feedback);
        }
        if($validar->Longitud_maxima($this->nombre_completo,80)===false){
            $this->code='000122';
            $this->ok=false;
            $this->resource='Nombre';
            $this->construct_response();
            array_push($this->erroresdatos, $this->feedback);
        }
        if($validar->Es_string_espacios($this->nombre_completo)===false){
            $this->code='000123';
            $this->ok=false;
            $this->resource='Nombre';
            $this->construct_response();
            array_push($this->erroresdatos, $this->feedback);
        }
        return $this->erroresdatos;
    }

    //Comprueba el formato del DNI,
    function Comprobar_DNI(){
        $validar= new Validar();
        if($validar->Longitud_minima($this->DNI,8)===false){

            $this->code='000162';
            $this->ok=false;
            $this->resource='DNI';
            $this->construct_response();
            array_push($this->erroresdatos, $this->feedback);
        }else if($validar->Longitud_maxima($this->DNI,10)===false) {
            $this->code = '000162';
            $this->ok = false;
            $this->resource = 'DNI';
            $this->construct_response();
            array_push($this->erroresdatos, $this->feedback);

        } else if($validar->Formato_DNI($this->DNI)===false){
            $this->code='000162';
            $this->ok=false;
            $this->resource='DNI';
            $this->construct_response();
            array_push($this->erroresdatos, $this->feedback);
        }
        return $this->erroresdatos;
    }

//Añade un trabajador a la BD
//Comprueba si ya existe en el trabajador
//Si existe devuelve el trabajador, sino devuelve un c´digo de respuesta
    function ADD()
    {
        if($this->Validar_atributos() !== true){
            return $this->erroresdatos;
        }
        $comp_existe=$this->getById();
        if(!isset($comp_existe['code'])){
            //si no devuelve un código ya está añaido en la BD
            $this->ok=false;
            $this->code = '006071';
            $this->construct_response();
            return $comp_existe;
        }

       $this->query="INSERT INTO TRABAJADORES (DNI,nombre_completo) values (
       '$this->DNI',
       '$this->nombre_completo'
       )";

        $this->execute_single_query();

        if($this->feedback['code']!='00001'){
            $this->ok=false;
            $this->code = '006074'; // no se ha podiddo añadir al trabajador
            $this->construct_response();
        }
        return $this->feedback;

    }


    protected function DELETE(){

        $this->query = "	DELETE FROM 
   				TRABAJADORES
   			WHERE(
   				DNI = '$this->DNI' )
   			";
        $this->execute_single_query();

        if ($this->feedback['ok']) {
            $this->ok = true;
            $this->code = '000055'; //BOrrado realizado con exito
        } else {    //Error de gestor de base de datos
            $this->ok = false;
            $this->code = '000051';
        }
        $this->construct_response();
        return $this->feedback;
    }

    function getById()
    {
        $this->query = "SELECT *
                FROM TRABAJADORES
                WHERE 
                    DNI = '$this->DNI'
                ";

        $this->get_one_result_from_query();

        if ($this->feedback['code'] == '00007')
        {
                $this->code= "000057"; //no se ha encontrado el trabajador con ese DNI
                $this->ok="false";
                $this->construct_response();
                return $this->feedback;
        }

        return $this->rows;
    }
    protected function EDIT()
    {
        // TODO: Implement EDIT() method.
    }
    protected function SEARCH()
    {
        // TODO: Implement SEARCH() method.
    }


}