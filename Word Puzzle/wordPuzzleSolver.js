function solve(words,len,puz) {
	puz=String(puz);
 var ret=[];
 for (var i=0; i< words.length;i++){
 	puz=puz.trim().toLowerCase();
 	var word=String(words[i]);
 	word=word.trim().toLowerCase();
 	//console.log(word);
 	if (word.length==len) {
 		if (balance(word, puz)) {
 			ret.push(word);
 		}
 	}
 }

return ret;
}


function balance(dic,puz){
var found=true;


if (dic.length>puz.length) {
	found=false;
}else{
	var dicChars=dic.split('');
	var puzChars=puz.split('');


for (var i=0;i<dicChars.length;i++){
	if (puzChars.includes(dicChars[i])) {
		puzChars=removeArray(puzChars,dicChars[i]);
	}else{
		found=false;
		break;
	}
}

}

return found;

}

function  removeArray(arr,val) {
	var ret=[];
	for (var i=0; i<arr.length;i++){
		if (arr[i]==val) {
			arr[i]='*';
			break;
		}
	}

	for (var j=0;j<arr.length;j++){
		if(arr[j]!='*'){
			ret.push(arr[j]);
		}
	}

	return ret;
}
