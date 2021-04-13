<?php
if(isset($_POST['send'])){
  echo $_POST['number'];
  echo $_POST['checkall'];
}
else{
    echo $_POST['checkall'];
  echo $_POST['number'];
}
?>
