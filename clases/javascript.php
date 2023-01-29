<script language="JavaScript" type="text/javascript">

   function validar(e)
   {
      tecla=(document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron=/[A-Za-z\s]/; 
      te= String.fromCharCode(tecla);
      return patron.test(te);
   }

   function validar2(e)
   {
      tecla=(document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron=/\d/; 
      te= String.fromCharCode(tecla);
      return patron.test(te);
   }

   function validar3(e)
   {
      tecla=(document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron=patron =/[°!"$%&/()=?¡¬|@·~½¬{[\]}\"+*~`^_]/; // 4
      te = String.fromCharCode(tecla); // 5
      return !patron.test(te); // 6
   }
   <?php
   /*
      /[a-zA-ZñÑ0-9\s-_ .,/#]/;
   */
   ?>

   function validar4(e)
   {
      tecla=(document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron=/[a-zA-Z0-9\-_ .,/|#%¡!¿?*+-=]/; 
      te= String.fromCharCode(tecla);
      return patron.test(te);
   }
   
   function validar5(e)
   {
      tecla=(document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron=/[a-zA-Z\.]/; 
      te= String.fromCharCode(tecla);
      return patron.test(te);
   }   

   function validar6(e)
   {
      tecla=(document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron=/[a-zA-Z\ ]/; 
      te= String.fromCharCode(tecla);
      return patron.test(te);
   }
   function validar7(e)
   {
      tecla=(document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron=/[a-zA-Z0-9\-]/; 
      te= String.fromCharCode(tecla);
      return patron.test(te);
   }
   function validar8(e)
   {
      tecla=(document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron=/[a-zA-Z0-9\ ,:]/; 
      te= String.fromCharCode(tecla);
      return patron.test(te);
   }
   function validar9(e)
   {
      tecla=(document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron=/[a-zA-Z0-9\/]/; 
      te= String.fromCharCode(tecla);
      return patron.test(te);
   }
   function validar10(e)
   {
      tecla=(document.all) ? e.keyCode : e.which;
      if (tecla==8) return true;
      patron=/[a-zA-Z0-9\- ]/;
      te= String.fromCharCode(tecla);
      return patron.test(te);
   }

   window.onload = function ()
   {
      document.formulario.nombre.focus();
      document.formulario.addEventListener('submit', validarFormulario);
   }

   function validarFormulario(evObject)
   {
      evObject.preventDefault();
      var todoCorrecto = true;
      var formulario = document.formulario;
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
</script>
<?php
   $tamaño=5;
   function randomText($tamaño)
   {
      $pattern="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-";
      for($f=0;$f<$tamaño;$f++)
      {
         $key .= $pattern{rand(0,62)};
      }
      return $key;
   }
?>
