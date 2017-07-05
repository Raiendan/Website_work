<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" type="text/css" href="css/main.css" />
 <link rel="stylesheet" type="text/css" href="css/imp_action_modal.css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon/favicon-konrad3.ico">

<?php


include 'dbanmeldung.php';
    if(mysqli_connect_errno())
    {
    echo '<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysql_connect_error().'</p>';
    }
    else
    {
    echo '<div class="action"><p>Wir freuen uns, dass Sie Ihr Kind für das Zeltlager 2017 angemeldet habe. </br></br> Sie erhalten eine automatische Bestätigunsmail mit Ihren angegebenen Daten und unseren Kontodaten. </br></br>Bei fragen können Sie gerne auf diese Email antworten.</br></br>
    
    VIELEN DANK :)</p>
    </div>
    
    <div id="home"class="logo"> <a href="anmeldung.html">
                <p class="impressum" style="text-decoration:none;">Zurück</p></div>  ';
    }


$db_selected = mysql_select_db('db656902902');
if (!$db_selected) {
    die ('Kann db656902902 nicht benutzen : ' . mysql_error());
}
mysql_query("SET NAMES 'utf8'");



$vorname = $_POST["vorname"]; 

$nachname = $_POST["nachname"]; 

$email = $_POST["email"]; 

$strasse = $_POST["strasse"];

$ort = $_POST["ort"];

$telefon = $_POST["telefon"];

$kommentar = $_POST["kommentar"];

$kv1 = $_POST["kv1"];

$kn1 = $_POST["kn1"];

$ka1 = $_POST["ka1"];

$kv2 = $_POST["kv2"];

$kn2 = $_POST["kn2"];

$ka2 = $_POST["ka2"];

$kv3 = $_POST["kv3"];

$kn3 = $_POST["kn3"];

$ka3 = $_POST["ka3"];



   
$sql = 'INSERT INTO zlt (vorname, nachname, email, strasse, ort, telefon, kv1, kn1, ka1, kv2, kn2, ka2, kv3, kn3, ka3, kommentar) VALUES ("'.$vorname.'", "'.$nachname.'", "'.$email.'", "'.$strasse.'", "'.$ort.'", "'.$telefon.'", "'.$kv1.'", "'.$kn1.'", "'.$ka1.'", "'.$kv2.'", "'.$kn2.'", "'.$ka2.'", "'.$kv3.'", "'.$kn3.'", "'.$ka3.'", "'.$kommentar.'")';
$eintragen = mysql_query($sql) or die("Fehler: ".mysql_error());





 // Mailadresse Empfaenger
$betreff    = "Zeltlager Zauberwald";
$kiliantext     = "


Vorname:     $vorname
Nachname:    $nachname
E-mail:      $email
Straße:      $strasse
Ort:         $ort
Telefon:     $telefon

Kind/er:

Vorname:     $kv1
Nachname:    $kn1
Alter:       $ka1

Vorname:     $kv2
Nachname:    $kn2
Alter:       $ka2

Vorname:     $kv3
Nachname:    $kn3
Alter:       $ka3


Kommentar:
$kommentar

";


$kilianbetreff     = "Anmeldung: $vorname $nachname";
$mailtext   .= "Guten Tag, 

vielen Dank, dass Sie Ihr/e Kind/er zum Zeltlager 2017 der Pfarrjugend St. Konrad angemeldet haben.

Bitte überprüfen Sie die von Ihnen angegebenen Daten:

Vorname:     $vorname
Nachname:    $nachname
E-mail:      $email
Straße:      $strasse
Ort:         $ort
Telefon:     $telefon

Kind/er:

Vorname:     $kv1
Nachname:    $kn1
Alter:       $ka1

Vorname:     $kv2
Nachname:    $kn2
Alter:       $ka2

Vorname:     $kv3
Nachname:    $kn3
Alter:       $ka3



Sobald die Anzahlung über 30€ auf unserem Konto eingegangen ist, ist Ihre Anmeldung gültig.
Sie können natürlich auch gerne direkt den Gesamten Betrag bezahlen.


Inhaber: Pfarrjugend St. Konrad		
IBAN:    DE09 7956 2514 0000 8014 10
BIC:     GENODEF1AB1		
                

Die Preise:
Ein Kind:       85 €
Zweites Kind:   80 €
Weitere Kinder: 75 €



Auf der Homepage unter -Download- finden Sie außerdem den Elternbrief der bis zum 22.05.2017 unterschrieben sein muss.
Download: https://goo.gl/Rv5LGJ
Sie können diesen einscannen und mir per Mail schicken.


Mit herzlichen Grüßen

Kilian Wunderlich
";
$absender   = "kiliwun@gmail.com";

$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=utf-8";
$headers[] = "From: {$absender}";
// falls Bcc benötigt wird
$headers[] = "Bcc: Der Da ";
$headers[] = "Reply-To: {$absender}";
$headers[] = "Subject: {$betreff}";
$headers[] = "X-Mailer: PHP/".phpversion();

mail($email, $betreff, $mailtext,implode("\r\n",$headers));
mail($absender, $kilianbetreff, $kiliantext,implode("\r\n",$headers));





?>



































