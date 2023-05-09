<?php
require 'DatabaseClassSingleton.php';
$result = DatabaseClassSingleton::getInstance()->Select("Select * from billion_articoli");
$s = '';
foreach ($result as $row) {
    if ($row['Nazione'] == "giappone") {
        $s .= '<div class="col-md-3 col-sm-6">
                <div class="thumbnail" style="display: inline-block">
                    <div class="caption">
                    <a href="prodotto.php?id=' . $row['codice'] . '">
                            <img src="immagini/' . $row['immagine'] . '" alt="' . $row['nome'] . '"width="237" height="148">
                        </a>
                        <h3>' . $row['nome'] . '</h3>
                        <p>Price: ' . $row['prezzo'] . '</p>
                        <button type="button" name="button" id="button">Aggiungi al carrello</button>
                          
                    </div>                        
                </div>
            </div>';
    }
}
echo $s;
