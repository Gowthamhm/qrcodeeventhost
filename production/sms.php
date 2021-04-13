<?php
if(isset($_POST['send'])){
echo $_POST['table_records'];
foreach ($name as $table_records){
    echo $table_records."<br />";
}
}else{
  echo $_POST['table_records'];
    echo $_POST['table_records']['0'];
  echo 'f**k';
}

?>
