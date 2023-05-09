<?php
// Verifica se l'id del prodotto è stato ricevuto tramite GET
if (isset($_GET['id'])) {
  // Recupera l'id del prodotto dalla query string
  $id_prodotto = $_GET['id'];

  // Esegue la query per recuperare il nome del prodotto
$sql = "SELECT nome FROM billion_articoli WHERE codice = ".$_GET['id'];
$result = $mysqli->query($sql);

// Verifica se la query è stata eseguita con successo
if ($result === false) {
    die('Errore nella query: ' . $mysqli->error);
}

// Verifica se è stato trovato un prodotto con l'id specificato
if ($result->num_rows === 0) {
    die('Nessun prodotto trovato con l\'id specificato');
}

// Recupera il nome del prodotto dal risultato della query
$row = $result->fetch_assoc();
$nome_prodotto = $row['nome'];

// Stampa il nome del prodotto
echo 'Nome prodotto: ' . $nome_prodotto;
} else {
  // Se l'id del prodotto non è stato ricevuto, mostra un messaggio di errore
  echo 'L\'id del prodotto non è stato fornito.';
}
?>
