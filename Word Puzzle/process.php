<?php 

function readDictionary(){
	$dictionary=array();
	$filename="dictionary.txt";
	if ($file = fopen($filename, "r")) {
    while(!feof($file)) {
        $line = fgets($file);
         array_push($dictionary, $line);
    }
    fclose($file);

    return $dictionary;
}}


function solvePuzzle($leters,$len){
$words=readDictionary();
$foundFromHack=array();

$leters=strtolower($leters);
$letersArray=str_split($leters);
for ($i=0; $i < sizeof($words) ; $i++) { 
	$word=strtolower($words[$i]);
	$word = str_replace(' ', '', $word);
	if (strlen($word)==$len) {
		if (balancedSymbols($word,$leters)) {
			echo "string";
			array_push($foundFromHack, $word);
		}
	}
}

/*for ($i=0; $i < sizeof($words); $i++) { 
	$fromDic=strtolower($words[$i]);
	$fromDicArray=str_split($fromDic);
	if(strlen($leters)>=strlen($fromDic) and strlen($fromDic)==$len){
		//echo "Here\n";
		$wordfound=false;

		for ($j=0; $j < strlen($fromDic) ; $j++) { 
			$fromDicChar=$fromDicArray[$j];
			$charFound=false;
			for ($k=0; $k < strlen($leters) ; $k++) { 
				$letersChar=$letersArray[$k];
				if ($letersChar==$fromDicChar) {
					$charFound=true;
					break;
				}

				}
				if($charFound==false){
					break;
				}
				if (($j+1)==strlen($fromDic)) {

					echo "4";
					echo $charFound;
					$wordfound=true;
				}
		}
		if ($wordfound) {
			if (balancedSymbols($fromDic,$leters)) {
				# code...
				array_push($foundFromHack, $fromDic);
			}
		}
	}

}*/

return $foundFromHack;

}


function balancedSymbols($dic,$puz){
	if(strlen($dic)>strlen($puz)){
		return false;
	}
	$same=true;
	$arrayDicChar=str_split($dic);
	$arrayPuzChar=str_split($puz);
	$count=0;
	for ($i=0; $i <sizeof($arrayDicChar);$i++) { 
		$leter=$arrayDicChar[$i];
		if (in_array($leter, $arrayPuzChar) ){
			$key = array_search($leter,$arrayPuzChar);
			echo $key."<br>";
			echo "Old"."<br>";
			print_r($arrayPuzChar);
			echo "<br>";
   			 unset($arrayPuzChar[$key]);
   			 echo "New after removing ".$leter."<br>";
   			 print_r($arrayPuzChar);
   			 echo "<br>";
		}else{
			$same=false;
			echo "Not found ".$leter."<br>";
			$count++;
			break;
		}
	}
	return $same;

}
if (isset($_POST['gatData'])) {
	$data['words']=readDictionary();
	echo json_encode($data);
	exit();
}



 ?>