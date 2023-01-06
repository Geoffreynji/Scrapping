<?php 
function preg_substr($start, $end, $str) // Regular expression      
{      
    $temp =preg_split($start, $str);      
    $content = preg_split($end, $temp[1]);      
    return $content[0];      
}    
function str_substr($start, $end, $str) // string split       
{      
    $temp = explode($start, $str, 2);      
    $content = explode($end, $temp[1], 2);      
    return $content[0];      
}

function writelog($str)
{
  @unlink("log.txt");
  $open=fopen("log.txt","a" );
  fwrite($open,$str);
  fclose($open);

} 

$str = file_get_contents("https://foottarn.fff.fr/recherche-clubs?scl=192052");
$test = preg_substr('<div id="logo" class="clearfix">',"</div>",$str);
//$str = mb_convert_encoding($str, 'utf-8','iso-8859-1');

writelog($test);

/*echo $str;
 echo('Title:'. Preg_substr('/<span id= "btAsinTitle"[^>}*>','/<Vspan>/$str));

echo('<br/>');

$imgurl=str_substr('var imageSrc = "','"',$str);

echo '<img src="'.getImage($imgurl,"",'img' array('jpg'));  */
?>