<?php
if(isset($_POST['send'])){

foreach ($_POST['phone_number'] as $selectedOption)
    echo $selectedOption."\n";
}
?>
