function formatDate(userDate) {
var userDate;

sub = userDate.split("/");
if(sub[0].length < 2){
	sub[0]=0 + sub[0];
}
if(sub[1].length < 2){
	sub[1]=0 + sub[1];
}
fecha=sub[2] + sub[0] + sub[1];
document.write(sub[2] + sub[0] + sub[1]);
return fecha;
}
console.log(formatDate("12/31/2014"));
/*
function createCheckDigit(membershipId) {
	var cad ="55555";
  dos = cad.split(""); 
  tamanio=dos.length;
  
  setParameter
  	suma=dos[0]+dos[1];
 
  document.write(pare);
  
  return 0;
}

console.log(createCheckDigit("55555"));*/