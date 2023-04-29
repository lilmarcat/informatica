<?php
require 'DatabaseClassSingleton.php';
$result=DatabaseClassSingleton::getInstance()->Select("Select * from billion_articoli");
$s='';
foreach($result as $row){
    $s.='<div class="caption">
                                    <h3>'.$row['nome'].'</h3>
                                    <p>Price: € 36000.00</p>

                                        
                                </div>';
}
echo $s;
?>
