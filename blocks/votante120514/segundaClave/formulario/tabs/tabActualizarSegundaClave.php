<?php
if (!isset($GLOBALS["autorizado"])) {
    include("../index.php");
    exit;
}

$esteBloque = $this->miConfigurador->getVariableConfiguracion("esteBloque");
$nombreFormulario = $esteBloque["nombre"];

$valorCodificado="&action=" . $esteBloque["nombre"];
$valorCodificado.="&opcion=validarPreguntas";
$valorCodificado.="&bloque=" . $esteBloque["id_bloque"];
$valorCodificado.="&bloqueGrupo=" . $esteBloque["grupo"];
$valorCodificado = $this->miConfigurador->fabricaConexiones->crypto->codificar($valorCodificado);

$tab = 1;

//---------------Inicio Formulario (<form>)--------------------------------
$atributos["id"] = $nombreFormulario;
$atributos["tipoFormulario"] = "multipart/form-data";
$atributos["metodo"] = "POST";
$atributos["nombreFormulario"] = $nombreFormulario;
$verificarFormulario = "1";
echo $this->miFormulario->formulario("inicio", $atributos);
unset($atributos);

//-----------------Inicio de Conjunto de Controles-------------------------
$esteCampo = "marcoPreguntasActualizacion";
$atributos["estilo"] = "jqueryui";
$atributos["leyenda"] = $this->lenguaje->getCadena($esteCampo);
echo $this->miFormulario->marcoAGrupacion("inicio", $atributos);

//------------------Control Lista Desplegable------------------------------
$esteCampo = "pregunta1";
$atributos["id"] = $esteCampo;
$atributos["tabIndex"] = $tab++;
$atributos["seleccion"] = $preguntas['idpregunta'];
$atributos["evento"] = 2;
$atributos["columnas"] = "1";
$atributos["limitar"] = false;
$atributos["tamanno"] = 1;
$atributos["ancho"] = 350;
$atributos["estilo"] = "jqueryui";
$atributos["etiquetaObligatorio"] = true;
$atributos["validar"] = "required";
$atributos["obligatorio"] = true;
$atributos["deshabilitado"] = true;
$atributos["etiqueta"] = $this->lenguaje->getCadena($esteCampo);
//-----De donde rescatar los datos ---------
$atributos["cadena_sql"] = $this->sql->cadena_sql("buscarPreguntas");
$atributos["baseDatos"] = "estructura";
echo $this->miFormulario->campoCuadroLista($atributos);
unset($atributos);

//-------------Control cuadroTexto-------------------------------------
$esteCampo = "respuesta1";
$atributos["id"] = $esteCampo;
$atributos["etiqueta"] = $this->lenguaje->getCadena($esteCampo);
$atributos["etiquetaObligatorio"] = true;
$atributos["titulo"] = $this->lenguaje->getCadena($esteCampo . "Titulo");
$atributos["tabIndex"] = $tab++;
$atributos["obligatorio"] = true;
$atributos["tamanno"] = "30";
$atributos["tipo"] = "";
$atributos["estilo"] = "jqueryui";
$atributos["columnas"] = "1"; //El control ocupa 32% del tamaño del formulario
$atributos["validar"] = "required, minSize[2], maxSize[30]";
$atributos["categoria"] = "";
$atributos["deshabilitado"] = false;
echo $this->miFormulario->campoCuadroTexto($atributos);
unset($atributos);

//------------------Fin Division para los botones-------------------------
echo $this->miFormulario->division("fin");

//------------------Division para los botones-------------------------
$atributos["id"] = "botones";
$atributos["estilo"] = "marcoBotones";
echo $this->miFormulario->division("inicio", $atributos);

//-------------Control Boton-----------------------
$esteCampo = "botonContinuar";
$atributos["id"] = $esteCampo;
$atributos["tabIndex"] = $tab++;
$atributos["tipo"] = "boton";
$atributos["estilo"] = "";
$atributos["verificar"] = "true"; //Se coloca true si se desea verificar el formulario antes de pasarlo al servidor.
$atributos["tipoSubmit"] = "jquery"; //Dejar vacio para un submit normal, en este caso se ejecuta la función submit declarada en ready.js
$atributos["valor"] = $this->lenguaje->getCadena($esteCampo);
$atributos["nombreFormulario"] = $nombreFormulario;
echo $this->miFormulario->campoBoton($atributos);
unset($atributos);
//-------------Fin Control Boton----------------------

//-------------Control cuadroTexto con campos ocultos-----------------------
//Para pasar variables entre formularios o enviar datos para validar sesiones
$atributos["id"] = "formSaraData"; //No cambiar este nombre
$atributos["tipo"] = "hidden";
$atributos["obligatorio"] = false;
$atributos["etiqueta"] = "";
$atributos["valor"] = $valorCodificado;
echo $this->miFormulario->campoCuadroTexto($atributos);
unset($atributos);


//Fin del Formulario
echo $this->miFormulario->formulario("fin");
?>