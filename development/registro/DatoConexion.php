<?php

class DatoConexion{
	
	
	private $motorDB;
	private $direccionServidor;
	private $puerto;
    private $db;
    private $usuario;
    private $clave;
    private $prefijo;

    
    function __construct(){
    	
		
    	
    }
    
    function setDatosConexion($nombre){
    	
    	if(is_array($nombre)){
    		
    		$this->motorDB=$nombre["dbsys"];
    		$this->direccionServidor=$nombre["dbdns"];
    		$this->puerto=$nombre["dbpuerto"];
    		$this->db=$nombre["dbnombre"];
    		$this->usuario=$nombre["dbusuario"];
    		$this->clave=$nombre["dbclave"];
    		$this->prefijo=$nombre["dbprefijo"];
    		
    		return true;
    		
    	}
    	
    	
    	switch($nombre){
    		
    		case "oracle":
    			
    			$this->motorDB="pgsql";
    			$this->direccionServidor="pgsql";
    			$this->puerto="5432";
    			$this->db="pgsql";
    			$this->usuario="pgsql";
    			$this->clave="pgsql";   			
    			break;
    			
    		case "postgresql":
    			    			 
    			$this->motorDB="pgsql";
    			$this->direccionServidor="localhost";
    			$this->puerto="5432";
    			$this->db="reportepagos";
    			$this->usuario="reportepagos";
    			$this->clave="reportepagos";
    			break;
    		
    		
    	}
    	
    	return true;
    	
    	
    }    
    
    function getMotorDB(){
    	return $this->motorDB;
    }

    function getDireccionServidor(){
    	return $this->direccionServidor;
    }
    
    function getPuerto(){
    	return $this->puerto;
    }
    
    function getDb(){
    	return $this->db;
    }
    
    function getUsuario(){
    	return $this->usuario;
    }
    
    function getClave(){
    	return $this->clave;
    }
    
    function getPrefijo(){
    	return $this->prefijo;
    }
    
	
}



?>