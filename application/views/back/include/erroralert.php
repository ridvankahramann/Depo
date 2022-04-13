<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(isset($alert)){
      echo '<script type="text/javascript">
        $(function(){
          swal({
            title: "'.$alert["title"].'",
            text: "'.$alert["text"].'",
            icon: "'.$alert["type"].'",
            button: "'.$alert["buttonText"].'",
          });
        });
      </script>';
} ?>
