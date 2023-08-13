<?php
session_id("student");
   session_start();
   
   if(session_destroy()) {
      header("Location: /login");
   }
?>