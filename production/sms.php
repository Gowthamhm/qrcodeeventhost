<?php
if(isset($_POST['send'])){

foreach ($_POST['table_records'] as $selectedOption)
    echo $selectedOption."\n";
}
?>
