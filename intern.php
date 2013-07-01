<?php



if ($_POST['user'] == "user" & $_POST['passwort'] == "user"){
		
	
echo'

<form accept-charset="utf-8" action="save.php" method="get">

<tr>
	<td style="width:150px"><strong>Titel:</strong></td><br>
	<td><input name="titel" type="text"  size="50" /></td>
</tr>

<br>
<br>


<tr>
	<td style="width:150px"><strong>Nachricht:</strong></td><br>
	<td><textarea name="inhalt" cols="50" rows="7" style="white-space: nowrap;"></textarea></td>
</tr><br><br>



<tr>
	<td style="width:150px"></td>
	<td><input type="submit" value="Speichern" name="submit" />
	</td>
</tr>

</form>


';	

	
}

else {
	echo"Passwort oder Benutzername falsch";
}
?>