<?php





$handle = fopen ( "aktuelles.php", "w" );
 
    // schreiben des Inhaltes von email
    fwrite ($handle, '<div class="aktuelles_titel"><h3>' .$_GET['titel']. '</h3></div>
<div class="aktuelles_content">' .$_GET['inhalt'].'</div>');
 
 
    // Datei schließen
    fclose ( $handle );
 
    echo "Die Nachricht wurden gepeichert <br><br>";
	echo '<a href="index.php">zur Startseite</a>';
 
    // Datei wird nicht weiter ausgeführt
    exit;
	
?>