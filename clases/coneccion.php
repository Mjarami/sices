<?php
   class Conectar
   {
      var $nombre;
      public static function con()
      {
         $con=mysql_connect('localhost', 'usuario', 'clave');
         mysql_select_db('sices');
         return $con;
      }
   }
?>
