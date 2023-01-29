<?php
   class Validaphp
   {
      public $permitidos="^[a-zA-Z]";
      public $permitidos2="^[0-9]";
      public $permitidos3="^[a-zA-Z0-9\-_ .,/#]";
      public $permitidos4="^[a-zA-Z\ ]";
      public $permitidos5="^[a-zA-Z0-9\-]";
      public $permitidos6="^[a-zA-Z\-_ .,/|#@%¡!¿?*+-=]";
      public $permitidos7="^[a-zA-Z\.]";
      public $permitidos8="^[a-zA-Z0-9]";
      public $resul;

      function validaL($val)
      {
            if (ereg($this->permitidos, $val))
            {  
               $this->resul='true'; 
            }
            else
            {
               $this->resul='false';
            }
      }

      function validaN($val)
      {
            if (ereg($this->permitidos2, $val))
            {  
               $this->resul='true'; 
            }
            else
            {
               $this->resul='false';
            }
      }

      function validaE($val)
      {
            if (ereg($this->permitidos3, $val))
            {  
               $this->resul='true'; 
            }
            else
            {
               $this->resul='false';
            }
      }
      
      function validaA($val)
      {
            if (ereg($this->permitidos4, $val))
            {  
               $this->resul='true'; 
            }
            else
            {
               $this->resul='false';
            }
      }

      function validaB($val)
      {
            if (ereg($this->permitidos5, $val))
            {  
               $this->resul='true'; 
            }
            else
            {
               $this->resul='false';
            }
      }

      function validaC($val)
      {
            if (ereg($this->permitidos6, $val))
            {  
               $this->resul='true'; 
            }
            else
            {
               $this->resul='false';
            }
      }

      function validaD($val)
      {
            if (ereg($this->permitidos7, $val))
            {  
               $this->resul='true'; 
            }
            else
            {
               $this->resul='false';
            }
      }

      function validaF($val)
      {
            if (ereg($this->permitidos8, $val))
            {  
               $this->resul='true'; 
            }
            else
            {
               $this->resul='false';
            }
      }


      function consultaL()
      {
         return $this->resul;
      }

      function consultaN()
      {
         return $this->resul;
      }

      function consultaE()
      {
         return $this->resul;
      }
      
      function consultaA()
      {
         return $this->resul;
      }

      function consultaB()
      {
         return $this->resul;
      }

      function consultaC()
      {
         return $this->resul;
      }

      function consultaD()
      {
         return $this->resul;
      }
      
      function consultaF()
      {
         return $this->resul;
      }
   } 
?>
