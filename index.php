<?php 
 
  //Recebe valores da pagina chamada
  if (@$_GET['url'] == ''){
    $url = '';
  }else{
    $url = $_GET['url'];
  }
  
  $url = explode('/',$url);

  //Verifica existencia da pagina no url.
  if(file_exists('controller/'.$url[0].'.php')){
    include('controller/'.$url[0].'.php');
  }
  else{
    include('404.php');
  }


?>


