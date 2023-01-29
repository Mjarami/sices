<script type="text/javascript">
/**
	window.onload = function ()
	{
		document.forperpre.nombre.focus();
		document.forperpre.addEventListener('submit', validarFormulario);
	}
	function validarFormulario(evObject)
	{
		evObject.preventDefault();
		var todoCorrecto = true;
		var formulario = document.forperpre;
		for (var i=0; i<formulario.length; i++)
		{
        	if(formulario[i].type =='text')
       		{
            	if (formulario[i].value == null || formulario[i].value.length == 0 || /^\s*$/.test(formulario[i].value))
            	{
                	alert (formulario[i].name+ ' no puede estar vacío o contener sólo espacios en blanco');
            		todoCorrecto=false;
        		}
			}
		}
		if (todoCorrecto ==true)
		{
			formulario.submit();
		}
	}
	**/
	function valida_envia_forcon()
	{
    	//valido el codigo en formulario forlog
    	if (document.forcon.codigo.value.length==0)
    	{
       		alert("Debe escribir su código asignado")
       		document.forcon.codigo.focus()
       		return 0;
    	}
    	//el formulario se envia
    	alert("Muchas gracias por enviar el formulario");
    	document.forcon.submit();
	}

	function valida_envia_forauxiliar()
	{
    	//valido cedula en formulario forauxiliar
    	if (document.forauxiliar.cedula.value.length==0)
    	{
       		alert("Debe escribir su cedula")
       		document.forauxiliar.cedula.focus()
       		return 0;
    	}
    	//el formulario se envia
    	alert("Muchas gracias por enviar el formulario");
    	document.forauxiliar.submit();
	}

	function valida_envia_forlog()
	{
    	//valido cedula en formulario forauxiliar
    	if (document.forlog.usuario.value.length==0)
    	{
       		alert("Debe escribir su usuario")
       		document.forlog.usuario.focus()
       		return 0;
    	}
    	if (document.forlog.contrasena.value.length==0)
    	{
       		alert("Debe escribir su contrase\u00F1a")
       		document.forlog.contrasena.focus()
       		return 0;
    	}
    	//el formulario se envia
    	alert("Bienvenido al Modulo Administrativo");
    	document.forlog.submit();
	}
</script>