<?php

$emailadresse = 'maxx-urban@gmx.de';
$absender = 'From: Kontaktformular <bla@blub.com>';

$fehlermeldung1 = '<br />Bitte alle Felder ausfüllen!';
$fehlermeldung2 = '<br />Falsche Zeichenfolge!';

session_start();
error_reporting(0);


if(isset($_POST['submit'])) {
$name = read($_POST['name']);
$betreff = read($_POST['betr']);
$nachricht =  read($_POST['nachr']);


		
		$zeit = time();
		$datum = date ("d.m.Y", $zeit);
		$uhrzeit = date ("H:i:s", $zeit);
		
		
		$fail = '<span style="color:red">';
		
    if(($name=='')||($betreff=='')|| ($nachricht=='') ){ $fail .= $fehlermeldung1; $fehler = 1;}
		
            
    if($_POST['code']=="" || strtolower($_POST['code'])!=$_SESSION['get_code']){$fail .= $fehlermeldung2; $fehler = 1;}
   

		$fail .= '</span><br /><br />';
		
		if(!isset($fehler)){
		
		$meta_text  = "Sie haben eine neue Nachricht über das Kontaktformular erhalten\n\nBetreff: $betreff
		Datum: $datum , Uhrzeit: $uhrzeit.
		\nvon: $name
		Nachricht:\n$nachricht\n";
		
		$email_betreffzeile = "Kontaktformular-Anfrage";
		
        @mail($emailadresse, $email_betreffzeile, $meta_text, $absender);
			
			$ausgabe='<span style="color:green ; font-size: 24px">';	
			
        $ausgabe.="Ihre Nachricht wurde verschickt. Vielen Dank!" . '</span>';
       
        
			  $betreff    = '';
			  $name       = '';
			  $nachricht  = '';
		    
		    } else {
		    $ausgabe=$fail;
		    }
		}
		
		else{
		  $ausgabe = '';
		}
		
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
		
		<script type="text/javascript">
function new_code()
{ 
var dateNew = new Date();
var safetyCode="generator.php?"+dateNew;
document.getElementById("generator").src= safetyCode;
}
</script>
    </head>
    <body>

            <div class="spacer">

            </div>


            <div class="header">

                    </div>




            <div class="content">
                    <div class="content_left">
                         <div class="hallo">
                            <div class="aktuelles">

                                    <div class="aktuelles_pin">

                                    </div>

                                    <div class="aktuelles_titel">
                                    <h3>Sommerfest</h3>
                                    </div>

                                    <div class="aktuelles_content">
                                   </div>
                            </div>
                            </div> 



                     


                    </div>



                    <div class="content_right">

                            <div class="navigationbar">
                                    <a href="index.html">&Uumlber uns</a>
                                    <a href="leitbild.html">Leitbild</a>
                                    <a href="team.html">Team</a>
                                    <a href="#">Leistungen</a>
                                    <a href="#">Kontakt</a>
									<a href="links.html">Links</a>

                            </div>

                            <div class="maincontent">
							
							<div class = "text">
							<p><strong>Kontaktieren Sie uns:</strong></p>
<form name="kontaktformular" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<table style="width:500px">



<tr>
	<td style="width:150px"><strong>Name:</strong></td>
	<td><input name="name" type="text" value="<?php echo $name;	?>" size="50" maxlength="70" /></td>
</tr>

<tr>
	<td style="width:150px"><strong>Betreff:</strong></td>
	<td><input name="betr" type="text"  value="<?php echo $betreff; ?>" size="50" maxlength="70" /></td>
</tr>

<tr>
	<td style="width:150px"><strong>Nachricht:</strong></td>
	<td><textarea name="nachr" cols="50" rows="7" style="white-space: nowrap;"><?php echo $nachricht;	?></textarea></td>
</tr>


<tr>
<td style="width:150px">&nbsp;</td>
	<td>&nbsp;</td>
</tr>


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


<tr>
	<td style="width:150px">&nbsp;</td>
	<td><input type="submit" value="Abschicken" name="submit" />
	</td>
</tr>

<tr>
	<td style="width:150px">&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<tr><td colspan="2"><?php echo $ausgabe; ?></td></tr>


</table>
</form>
							


							
							</div>

                            </div>

                    </div>
				</div>
					

            


            <div class="footer">
                    <a href="#">Intern</a>
                    <a href="#">Kontakt</a>
                    <a href="#">Impressum</a>


            </div>


    </body>
</html>

