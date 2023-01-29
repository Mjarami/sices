<?php
   class Conectar
   {
      var $nombre;
      public static function con()
      {
         $con=mysql_connect('localhost', 'root', 'root');
         mysql_select_db('sices');
         return $con;
      }
   }
?>
