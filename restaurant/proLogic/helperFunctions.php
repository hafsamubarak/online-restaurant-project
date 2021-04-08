<?php 


   function cleanInputs($input){

    $input = htmlentities(htmlspecialchars(trim($input)));
    
    return $input;
   }




   function url($url){
   
    return "http://".$_SERVER['HTTP_HOST']."/blog/restaurant/".$url;


   }


?>