<?php


$emailadresse = "maxx-urban@gmx.de";
$absender = 'From: Kontaktformular <bla@blub.com>';

$fehlermeldung1 = '<br />Bitte alle Felder ausfüllen!';
$fehlermeldung2 = '<br />Falsche Zeichenfolge!';
$fehlermeldung3 = '<br />Ihre Email-Adresse hat eine falsche Syntax!';
$fehlermeldung4 = '<br />You are a gutless robot!';

session_start();
error_reporting(0);


if(isset($_POST['submit'])) {
$name = read($_POST['name']);
$betreff = read($_POST['betr']);
$nachricht =  read($_POST['nachr']);
$emailad = read($_POST['email']);
$robotest = read($_POST['robotest']);
		
		$zeit = time();
		$datum = date ("d.m.Y", $zeit);
		$uhrzeit = date ("H:i:s", $zeit);
		
		
		$fail = '<span style="color:red">';
		
    if(($name=='')||($betreff=='')|| ($nachricht=='') ||  ($emailad=='')){ $fail .= $fehlermeldung1; $fehler = 1;}
		
   
	if(!preg_match('#^([a-zA-Z0-9\.\_\-]+)@([a-zA-Z0-9\.\-]+\.[A-Za-z][A-Za-z]{1,4})$#', $emailad))
		{$fail .= $fehlermeldung3; $fehler = 1;}
		
	 if($robotest)
            {$fehler = 1; $fail .= $fehlermeldung4;}
		
		$fail .= '</span><br /><br />';
		
		if(!isset($fehler)){
		
		$meta_text  = "Sie haben eine neue Nachricht über das Kontaktformular erhalten\n\n
		Datum: $datum , Uhrzeit: $uhrzeit.
		\nvon: $name, 
		\nEmail-Adresse: $emailad \n
		Betreff: $betreff\n
		Nachricht:\n\n$nachricht\n";
		
		$email_betreff = "Kontaktformular-Anfrage";
		$meta_text = utf8_decode($meta_text);
		
		$senden = mail('maxx-urban@gmx.de', 'Kontaktformular-Anfrage', $meta_text, $absender);
 

     if($senden) 
        {$ausgabe='<span style="color:green ; font-size: 24px">';	
			
        $ausgabe.="Ihre Nachricht wurde verschickt. Vielen Dank!" . '</span>'; }
	else
	{$ausgabe='<span style="color:red ; font-size: 24px">';	
			
        $ausgabe.="Ihre Nachricht konnte nicht verschickt werden!" . '</span>'; }
	
	
		
       //@mail($emailadresse, $email_betreffzeile, $meta_text, $absender);
			
			//$ausgabe='<span style="color:green ; font-size: 24px">';	
			
       // $ausgabe.="Ihre Nachricht wurde verschickt. Vielen Dank!" . '</span>';
       
        
			  $betreff    = '';
			  $name       = '';
			  $nachricht  = '';
			  $emailad  	= '';
			  
		    
		    } else {
		    $ausgabe=$fail;
		    }
		}
		
		else{
		  $ausgabe = '';
		}
		$robotest  = '';
		
function read($pa){
$retVal=trim(strip_tags($pa));
return $retVal;
}

	  
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<link href="default.css" rel="stylesheet" type="text/css" />
<title>Sozialstation Augsburg West</title>

</head>
<body>

<div class="wrapper">

<div class="spacer">

</div>

<div class="header">

</div>

<div class="content">
<div class="content_left">
<div class="aktuelles">

<div class="aktuelles_pin">

</div>

<?php include 'aktuelles.php' ?>
</div>


</div>

<div class="content_right" >

<div class="navigationbar">
<a href="index.php">&Uumlber uns</a>
<a href="leitbild.php">Leitbild</a>
<a href="team.php">Team</a>
<a href="leistungen.php">Leistungen</a>
<a href="kontakt.php">Kontakt</a>
<a href="partner.php">Partner</a>

</div>

<div class="maincontent">
<div class = "text">
<h3> Kontakt Pfersee und Stadtbergen </h3>
							<p>
							<strong>Evangelische Sozialstation<br>
							Augsburg West GmbH<br>
							Jakobine-Lauber-Straße 5<br>
							86157 Augsburg<br></strong>
							<p>
							Sie erreichen uns telefonisch täglich von 7.00 Uhr bis 20.00 Uhr
							unter <strong>(0821) 22 81 88 0. </strong><br>
							Außerdem können Sie uns auch eine Email an <strong>evang-sozialstation@sanktpaul.de </strong>senden oder 
							Sie schreiben uns über das <strong>Kontaktformular:</strong><br>
							<!--<p><strong>Kontaktieren Sie uns:</strong></p>-->
<form name="kontaktformular" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<table style="width:500px">



<tr>
	<td style="width:150px"><strong>Ihr Name:</strong></td></tr>
<tr>	<td><input name="name" type="text" value="<?php echo $name;	?>" size="50" maxlength="70" /></td>
</tr>

<tr>
	<td style="width:150px"><strong>Ihre Email-Adresse:</strong></td></tr>
<tr>	<td><input name="email" type="text" value="<?php echo $emailad;	?>" size="50" maxlength="70" /></td>
</tr>

<tr>
	<td style="width:150px"><strong>Betreff:</strong></td></tr>
<tr>	<td><input name="betr" type="text"  value="<?php echo $betreff; ?>" size="50" maxlength="70" /></td>
</tr>

<tr>
	<td style="width:150px"><strong>Nachricht:</strong></td></tr>
<tr>	<td><textarea name="nachr" cols="50" rows="7" style="white-space: nowrap;"><?php echo $nachricht;	?></textarea></td>
</tr>


<tr>
<td style="width:150px">&nbsp;</td>
	<!--<td>&nbsp;</td>-->
</tr>

<!--
<tr>
<td style="width:150px"></td>
	<td><img id="generator" src="generator.php" alt="generator" border="1"  />
	<a href="javascript:void(0);" onclick="new_code();">Neue Zeichen</a></td>
</tr>


<tr>
	<td style="width:150px"><strong>Zeichenfolge <br />
	eingeben: </strong></td>
	<td><input name="code" type="text"  size="20" maxlength="50" /></td>
</tr>

<tr>
	<td style="width:150px">&nbsp;</td>
	<td>&nbsp;</td>
</tr>
-->

<tr>
	<!--<td style="width:150px">&nbsp;</td>-->
	<td><input type="submit" value="Nachricht senden" name="submit" />
	</td>
</tr>

<tr>
	<td style="width:150px">&nbsp;</td>
	<!--<td>&nbsp;</td>-->
</tr>

<tr><td colspan="2"><?php echo $ausgabe; ?></td></tr>

<tr>

<td>
<input style="width:150px" hidden name="robotest" type="text" id="robotest" class="robotest"  <?php echo $robotest; ?> />
</td>
</tr>


</table>
</form>


</div>

</div>

</div>
<div class="clearfix"></div>
</div>

<div class="spacer"></div>
<div class="footer">
<a href="login.php">Intern</a>
<a href="kontakt.php">Kontakt</a>
<a href="impressum.php">Impressum</a>
<br>
<br>
</div>

</div>
</body>
</html>