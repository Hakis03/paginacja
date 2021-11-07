<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Pagination</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>

<body>
<form action="script.php" method="get">
<input type="submit" value="Insert Data">
</form>
<?Php
require "config.php";          

$page_name="paginacja.php"; 

$start=$_GET['start'];	
if(!($start > 0)) {
$start = 0;
}

$eu = ($start -0);                
$limit = 10; 
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 


$nume = $dbo->query("select count(panstwo) from  panstwa")->fetchColumn(); 

$bgcolor="#f1f1f1";
echo "<TABLE width=400px align=center  cellpadding=0 cellspacing=0> <tr>";
echo "<td  bgcolor='dfdfdf' >&nbsp;<font face='arial,verdana,helvetica' color='#000000' size='4'>Country</font></td>";

$sql=" SELECT * FROM panstwa  limit $eu, $limit ";

foreach ($dbo->query($sql) as $noticia) {
if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
else{$bgcolor='#f1f1f1';}

echo "<tr >";
echo "<td align=left bgcolor=$bgcolor id='title'>&nbsp;<font face='Verdana' size='2'>$noticia[panstwo]</font></td>"; 

echo "</tr>";
}
echo "</table>";

$p_limit=10; 

$p_f=$_GET['p_f'];		
if(!($p_f > 0)) {                 
$p_f = 0;
}



$p_fwd=$p_f+$p_limit;
$p_back=$p_f-$p_limit;

echo "<table align = 'center' width='50%'><tr><td  align='left' width='20%'>";
if($p_f<>0){print "<a href='$page_name?start=$p_back&p_f=$p_back'><font face='Verdana' size='2'>PREV $p_limit</font></a>"; }
echo "</td><td  align='left' width='10%'>";

if($back >=0 and ($back >=$p_f)) { 
print "<a href='$page_name?start=$back&p_f=$p_f'><font face='Verdana' size='2'>PREV</font></a>"; 
} 

echo "</td><td align=center width='30%'>";
for($i=$p_f;$i < $nume and $i<($p_f+$p_limit);$i=$i+$limit){
if($i <> $eu){
$i2=$i+$p_f;
echo " <a href='$page_name?start=$i&p_f=$p_f'><font face='Verdana' size='2'>$i</font></a> ";
}
else { echo "<font face='Verdana' size='4' color=red>$i</font>";}       

}


echo "</td><td  align='right' width='10%'>";

if($this1 < $nume and $this1 <($p_f+$p_limit)) { 
print "<a href='$page_name?start=$next&p_f=$p_f'><font face='Verdana' size='2'>NEXT</font></a>";} 
echo "</td><td  align='right' width='20%'>";
if($p_fwd < $nume){
print "<a href='$page_name?start=$p_fwd&p_f=$p_fwd'><font face='Verdana' size='2'>NEXT $p_limit</font></a>"; 
}
echo "</td></tr></table>";


?>
</body>

</html>
