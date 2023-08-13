<?php
session_id("librarian");
   session_start();
   
   if(session_destroy()) {
      header("Location: /librarian/login");
   }
?>