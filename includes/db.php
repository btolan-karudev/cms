<?php 

$db['db_host'] = "localhost";
$db['db_user'] = "benji";
$db['db_pass'] = "123456";
$db['db_name'] = "cms";

foreach($db as $key => $value) {
    
  define(strtoupper($key), $value); // on ceee des constants avec define

}




$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if($connection) {
  
//   echo "We are connected";
  
// }


?>