<?php 

/*$the_site = "https://foottarn.fff.fr/recherche-clubs?scl=192052";
$the_tag = "div"; #
$the_class = "logo-club";

$html = file_get_contents($the_site);
libxml_use_internal_errors(true);
$dom = new DOMDocument();
$dom->loadHTML($html);
$xpath = new DOMXPath($dom);

foreach ($xpath->query('//'.$the_tag.'[contains(@class,"'.$the_class.'")]/img') as $item) {

    $img_src =  $item->getAttribute('src');
    print $img_src."\n";
    echo "test";
}*/























$code = file_get_contents("https://foottarn.fff.fr/recherche-clubs?scl=192052");
$code = str_replace(">", "<>", $code); 

$splitCode = explode("<", $code);

function parseCode($splitCode){
	// Find the first occurance of the opening tag of the quotes:
	$openingTag = array_search('html"', $splitCode, true);
	
	// Find the first occurance of the closing tag of the quotes: 
	$GLOBALS["closingTag"] = array_search('/html', $splitCode, true);
	
	// Now, find the text in between the tags 
$i = $openingTag;
$total = "";
while ($i < $GLOBALS["closingTag"]) {
	$total = $total . $splitCode[$i];
	$i = $i + 1;
}
$final = substr($total, 0);
echo $final;
?> <br> <?php
}
// Run the function, then update splitCode to delete the previous occurance 
// that it can be repeated for the next quote, then loop through 3 times 
// (You can change how many times):
parseCode($splitCode);
$splitCode = array_slice($splitCode, $GLOBALS["closingTag"]-1, NULL, TRUE);
parseCode($splitCode);
$splitCode = array_slice($splitCode, $GLOBALS["closingTag"]-1, NULL, TRUE);
parseCode($splitCode);
$splitCode = array_slice($splitCode, $GLOBALS["closingTag"]-1, NULL, TRUE);
parseCode($splitCode);

?>
