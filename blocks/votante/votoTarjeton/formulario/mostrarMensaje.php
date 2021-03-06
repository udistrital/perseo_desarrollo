

<?php
if (!isset($GLOBALS["autorizado"])) {
    include("../index.php");
    exit;
}

$mensaje = $_REQUEST['mensaje'];
$error = $_REQUEST['error'];
$datos = array("mensaje" => $mensaje, "error" => $error);

$esteBloque = $this->miConfigurador->getVariableConfiguracion("esteBloque");
$nombreFormulario = $esteBloque["nombre"];

$directorio = $this->miConfigurador->getVariableConfiguracion("host");
$directorio.= $this->miConfigurador->getVariableConfiguracion("site") . "/index.php?";
$directorio.=$this->miConfigurador->getVariableConfiguracion("enlace");

$valorCodificado = "pagina=certificadoVoto";
$valorCodificado = $this->miConfigurador->fabricaConexiones->crypto->codificar($valorCodificado);

//---------------Inicio Formulario (<form>)--------------------------------
$atributos["id"] = $nombreFormulario;
$atributos["tipoFormulario"] = "multipart/form-data";
$atributos["metodo"] = "POST";
$atributos["nombreFormulario"] = $nombreFormulario;
$verificarFormulario = "1";
echo $this->miFormulario->formulario("inicio", $atributos);
unset($atributos);

//-------------------------------Mensaje-------------------------------------
$esteCampo = $mensaje;
$atributos["id"] = "mensaje"; //Cambiar este nombre y el estilo si no se desea mostrar los mensajes animados
$atributos["etiqueta"] = "";
$atributos["estilo"] = "centrar";
$atributos["tipo"] = $error;
if ($datos != null) {
    $atributos["mensaje"] = $mensaje;
}else{
    $atributos["mensaje"] = $mensaje;
}
echo $this->miFormulario->cuadroMensaje($atributos);

exit;

//------------------Division para los botones-------------------------
$atributos["id"]="botones";
$atributos["estilo"]="marcoBotones";
echo $this->miFormulario->division("inicio",$atributos);

//-------------Control Boton-----------------------
$esteCampo="botonVolver";
$atributos["verificar"]="";
$atributos["tipo"]="boton";
$atributos["id"]=$esteCampo;
//$atributos["cancelar"]="true";
$atributos["tabIndex"]=$tab++;
$atributos["verificar"] = "true"; //Se coloca true si se desea verificar el formulario antes de pasarlo al servidor.
$atributos["tipoSubmit"] = ""; //Dejar vacio para un submit normal, en este caso se ejecuta la función submit declarada en ready.js
$atributos["valor"]=$this->lenguaje->getCadena($esteCampo);
$atributos["nombreFormulario"]=$nombreFormulario;
echo $this->miFormulario->campoBoton($atributos);
unset($atributos);
//-------------Fin Control Boton----------------------

//------------------Fin Division para los botones-------------------------
echo $this->miFormulario->division("fin");

//-------------Control cuadroTexto con campos ocultos-----------------------
//Para pasar variables entre formularios o enviar datos para validar sesiones
$atributos["id"]="formSaraData"; //No cambiar este nombre
$atributos["tipo"]="hidden";
$atributos["obligatorio"]=false;
$atributos["etiqueta"]="";
$atributos["valor"]=$valorCodificado;
echo $this->miFormulario->campoCuadroTexto($atributos);
unset($atributos);


//Fin del Formulario
echo $this->miFormulario->formulario("fin");

