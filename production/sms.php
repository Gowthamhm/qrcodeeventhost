<?php
if(isset($_POST['send'])){
echo $_POST['table_records'];
  echo $_POST['table_records']['0'];
    echo $_POST['table_records']['1'];
      echo $_POST['table_records']['2'];
}else{
  echo $_POST['table_records'];
    echo $_POST['table_records']['0'];
  echo 'f**k';
}

?>
