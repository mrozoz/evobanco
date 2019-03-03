function esTelefonoMovil(value){
    var re = /^(([0]{2}|\+)\d{2,3})?([67]\d{8})$/;
    return re.test(value);
}

function esUsuario(value){
	var re = /^[\w\@\-\.]{6,50}$/;
	return re.test(value);
}

function esEmailValido(value){
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    return re.test(value);
}

function sumaCerosIzquierda (argument) {	
	var resultado = argument.toString();
	var longitud = resultado.length; 
	var restoLongitud; 
	
	if(longitud > 0 && longitud < 9){
		restoLongitud = 9 - longitud;		
		for(var i=0;i<restoLongitud;i++){
			resultado = 0+resultado;
		}	
	}
	return resultado;
}

function esNIF(value){
	value = sumaCerosIzquierda(value);
	value = value.toUpperCase();
	 
	if (!value.match('((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)')){
		return false;
	}
	// Test NIF
	if (/^[0-9]{8}[A-Z]{1}$/.test(value)){
		return ("TRWAGMYFPDXBNJZSQVHLCKE".charAt(value.substring(8, 0)% 23) === value.charAt(8));
	}
	// Test specials NIF (starts with K, L or M)
	if (/^[KLM]{1}/.test(value)){
		return true; //(value[8] === String.fromCharCode(64)); //I002637591: Se quita la validación, es incorrecta
	}
	return false;
}

function esNIE(value){
	value = value.toUpperCase();
	 
	if (!value.match('((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)')){
		return false;
	}
	// Test NIE
	//T
	if (/^[T]{1}/.test(value)){
		return (value[8] === /^[T]{1}[A-Z0-9]{8}$/.test(value));
	}
	 
	//XYZ
	if (/^[XYZ]{1}/.test(value)){
		return (
				value[8] === "TRWAGMYFPDXBNJZSQVHLCKE".charAt(
						value.replace('X', '0')
						.replace('Y', '1')
						.replace('Z', '2')
						.substring(0, 8)% 23
				)
		);
	 }
	 return false;
}

function esMayorEdad(d, m, y){
	
//	var Fecha = dia+"/"+mes+"/"+anyo;
//	
//	fecha = new Date(Fecha);
//	hoy = new Date();
//	ed = parseInt((hoy -fecha)/365/24/60/60/1000);
//	if (ed < 18) {
//		return false;
//	}
//	return true;
	
	var date = new Date(y,parseInt(m)-1,d);
	if (date != ''){
		var hoy = new Date (); 
		hoy=new Date(hoy.getFullYear(),hoy.getMonth(),hoy.getDate());
		var edad = Math.floor((hoy-date) / (365.25 * 24 * 60 * 60 * 1000));
	}
	if (edad < 18){
		return false;
	}
	else{
		return true;
	}
}

function formateaFecha(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [day, month, year ].join('-');
}

function restarDias(dias, fechaHoy){
	var salida = new Date(fechaHoy.getFullYear(),fechaHoy.getMonth(),parseInt(fechaHoy.getDate(),10)-parseInt(dias,10));
	return formateaFecha(salida);
}

function sumarDias(dias, fechaHoy){
	var salida = new Date(fechaHoy.getFullYear(),fechaHoy.getMonth(),parseInt(fechaHoy.getDate(),10)+parseInt(dias,10));
	return formateaFecha(salida);
}

function restarMeses(meses, fechaHoy){
	var salida = new Date(fechaHoy.getFullYear(),parseInt(fechaHoy.getMonth(),10)-parseInt(meses,10) ,fechaHoy.getDate());
	return formateaFecha(salida);
}

function comparaDifMeses(desde,hasta,dif){
	
    sArray = desde.split("/");
    
    if ( (sArray.length < 3) || (sArray.length > 3))
        sArray = desde.split("-");
    
    if ( (sArray.length < 3) || (sArray.length > 3))
        return false;        

    day = sArray[0];
    month = sArray[1];
    year = sArray[2];

    sArray2 = hasta.split("/");
    
    if ( (sArray2.length < 3) || (sArray2.length > 3))
        sArray2 = hasta.split("-");
    
    if ( (sArray2.length < 3) || (sArray2.length > 3))
        return false;        

    day2 = sArray2[0];
    month2 = sArray2[1];
    year2 = sArray2[2];

	//comvertimos hasta a fecha para restar los meses
	dateHasta = new Date(year2,month2 - 1 - dif ,day2);

	//lo convertimos de nuevo a string con formato
	sfechaHasta = formateaFecha(dateHasta);

	//lo descomponemos de nuevo
    sArray2 = sfechaHasta.split("/")
    
    if ( (sArray2.length < 3) || (sArray2.length > 3))
        sArray2 = sfechaHasta.split("-")
    
    if ( (sArray2.length < 3) || (sArray2.length > 3))
        return false;        

    day2 = sArray2[0];
    month2 = sArray2[1];
    year2 = sArray2[2];
    

	 //Comparamos
	 if(year2+month2+day2>year+month+day) return false;
	 else return true;	    
}


function isMenorIgual(str1, str2){
	// str1 format should be dd/mm/yyyy. Separator can be anything e.g. / or -. It wont effect
	var dt1   = parseInt(str1.substring(0,2));
	var mon1  = parseInt(str1.substring(3,5));
	var yr1   = parseInt(str1.substring(6,10));
	var date1 = new Date(yr1, mon1-1, dt1);
	
	// str2 format should be dd/mm/yyyy. Separator can be anything e.g. / or -. It wont effect
	var dt2   = parseInt(str2.substring(0,2));
	var mon2  = parseInt(str2.substring(3,5));
	var yr2   = parseInt(str2.substring(6,10));
	var date2 = new Date(yr2, mon2-1, dt2);
	
	//date1 < date2 return -1
	//date1 = date2 return  0
	//date1 > date2 return  1
	//date1 or date2 is an illegal date return NaN
	return date1<=date2;
	}

///* Compare the current date against another date.
//*
//* @param b  {Date} the other date
//* @returns   -1 : if this < b
//*             0 : if this === b
//*             1 : if this > b
//*            NaN : if a or b is an illegal date
//*/ 
// function compare(b) {
//	 if (b.constructor !== Date) {
//		 throw "invalid_date";
//	 }
//	
//	 return (isFinite(this.valueOf()) && isFinite(b.valueOf()) ? 
//		 (this>b)-(this<b) : NaN 
//	 );
//}



/*
A - Sociedades An�nimas
B - Sociedades de responsabilidad limitada
C - Sociedades colectivas
D - Sociedades comanditarias
E - Comunidades de bienes
F - Sociedades cooperativas
G - Asociaciones y otros tipos no definidos
H - Comunidades de propietarios
J - Sociedades civiles, con o sin personalidad jur�dica
K - Espa�oles menores de 14 a�os
L - Espa�oles residentes en el extranjero sin DNI
M - NIF que otorga la Agencia Tributaria a extranjeros que no tienen NIE
N - Entidades extranjeras
P - Corporaciones locales
Q - Organismos aut�nomos
R - Congregaciones e instituciones religiosas
S - Organos de la administraci�n
U - Uniones Temporales de Empresas
V - Otros tipos no definidos en el resto de claves
W - Establecimientos permanentes de entidades no residentes en Espa�a
X - Extranjeros identificados por la Polic�a con un n�mero de identidad de extranjero, NIE, asignado hasta el 15 de julio de 2008
Y - Extranjeros identificados por la Polic�a con un NIE, asignado desde el 16 de julio de 2008 (Orden INT/2058/2008, BOE del 15 de julio )
Z - Letra reservada para cuando se agoten los 'Y' para Extranjeros identificados por la Polic�a con un NIE

La ultima cifra es el d�gito de control, que puede ser o bien un n�mero o bien
una letra, en funci�n del tipo de sociedad.
A las categorias P (Ayuntamientos) y X (Extranjeros) les corresponde una letra
en lugar de un n�mero.

El d�gito de control se calcula con las 7 cifras restantes del CIF (quitando la
primera y la ultima), con el siguiente algoritmo:

- CIF: A58818501
- Quitamos la primera y la ultima cifra:
	5881850
- Sumamos las cifras pares:
	Suma = 8 + 1 + 5 = 14
- Ahora sumamos cada cifra impar multiplicada por dos, y sumamos las cifras del
  resultado:
	5 * 2 = 10 ==> 1 + 0 = 1
	8 * 2 = 16 ==> 1 + 6 = 7
	8 * 2 = 16 ==> 1 + 6 = 7
	0 * 2 = 0 ==> 0
- y volvemos a sumar esos resultados a la suma anterior:
	Suma=Suma+1+7+7+0;
- Al final de este proceso, tenemos que Suma=29, pues bien, nos quedamos con la
  cifra de las unidades (9)
- Restamos esta cifra de las unidades de 10, d�ndonos un 1, que es el c�digo de
  control para todos los tipos de sociedades exceptuando la X que se verifica
  como un DNI.
- Para las sociedades K, P, Q y S habria que sumar un 64 al digito de control que
  hemos calculado para hallar el ASCII de la letra de control:
	Chr(64+(10-(Suma mod 10)))
*/
 
/*
 * Tiene que recibir el cif sin espacios ni guiones
 */
function validateCIF(cif)
{
	//Quitamos el primer caracter y el ultimo digito
	var valueCif=cif.substr(1,cif.length-2);
 
	var suma=0;
 
	//Sumamos las cifras pares de la cadena
	for(i=1;i<valueCif.length;i=i+2)
	{
		suma=suma+parseInt(valueCif.substr(i,1));
	}
 
	var suma2=0;
 
	//Sumamos las cifras impares de la cadena
	for(i=0;i<valueCif.length;i=i+2)
	{
		result=parseInt(valueCif.substr(i,1))*2;
		if(String(result).length==1)
		{
			// Un solo caracter
			suma2=suma2+parseInt(result);
		}else{
			// Dos caracteres. Los sumamos...
			suma2=suma2+parseInt(String(result).substr(0,1))+parseInt(String(result).substr(1,1));
		}
	}
 
	// Sumamos las dos sumas que hemos realizado
	suma=suma+suma2;
 
	var unidad=String(suma).substr(1,1)
	unidad=10-parseInt(unidad);
 
	var primerCaracter=cif.substr(0,1).toUpperCase();
 
	if(primerCaracter.match(/^[FJKNPQRSUVW]$/))
	{
		//Empieza por .... Comparamos la ultima letra
		if(String.fromCharCode(64+unidad).toUpperCase()==cif.substr(cif.length-1,1).toUpperCase())
			return true;
	}else if(primerCaracter.match(/^[XYZ]$/)){
		//Se valida como un dni
		var newcif;
		if(primerCaracter=="X")
			newcif=cif.substr(1);
		else if(primerCaracter=="Y")
			newcif="1"+cif.substr(1);
		else if(primerCaracter=="Z")
			newcif="2"+cif.substr(1);
		return esNIF(newcif);
	}else if(primerCaracter.match(/^[ABCDEFGHLM]$/)){
		//Se revisa que el ultimo valor coincida con el calculo
		if(unidad==10)
			unidad=0;
		if(cif.substr(cif.length-1,1)==String(unidad))
			return true;
	}else{
		//Se valida como un dni
		return esNIF(cif);
	}
	return false;
}

function isEmpty(s){
	return ((s == null) || (s.length == 0));
}

function isWhitespace (s){
	var i;
    if (isEmpty(s)) return true;
    for (i = 0; i < s.length; i++){
    	var c = s.charAt(i);
        if (whitespace.indexOf(c) == -1) return false;
    }
    return true;
}

function charInString (c, s){   
	for (i = 0; i < s.length; i++){   
		if (s.charAt(i) == c) return true;
    }
    return false
}


//Comprueba que el campo importe tenga el formato d,dd. Si no tiene ',' se la pone.
//idCampo es el id del elemento html5 
//enteros sirve para comprobar el n�mero de enteros introducidos
// no sobrepase la longitud pasada por par�metro
function comprobarImporteyEnteros(importe, idCampo, enteros){

      var importeCorrecto = /(^[0-9]+((,)[0-9][0-9])?)$/;
      var sinComa = false;
      
      if (charInString('.', importe)) {
      	return false;
      }

      if (!charInString(',', importe)) {
      	sinComa = true;
      }

      if (importeCorrecto.test(importe)) {
             if (sinComa) {
                    // Si no viene la coma, hay que comprobar que el numero de enteros no sobrepase la longitud permitida
                    if (importe.length > enteros) {
                           return false;
                    }
                    $("#"+idCampo).val(importe + ",00");
             }
             return true;
      } else {
             return false;
      }
}

//Comprueba que el formato de la fecha sea dd-mm-yyyy
function validarFormatoFecha(value){    
    var fechaCorrecta = /(^[0-9][0-9](-)[0-9][0-9](-)[0-9][0-9][0-9][0-9])$/;    
    return fechaCorrecta.test(value);    
}

function validarFechaCorrecta(anio, mes, dia){		
	anio = parseInt(anio);
	mes = parseInt(mes);
	dia = parseInt(dia);
	
	if ((mes==4 || mes==6 || mes==9 || mes==11) && dia==31) {
		return false;
	}
	if (mes == 2) { // bisiesto
		var bisiesto = (anio % 4 == 0 && (anio % 100 != 0 || anio % 400 == 0));
		if (dia > 29 || (dia==29 && !bisiesto)) {
			return false;
		}
	}
	return true;
}

//Calculamos la edad de una persona a raz�n de su fecha de nacimiento
function retornaEdad(d,m,y){	 
	 var fechaActual = new Date();
	 d = parseInt(d);
	 m = parseInt(m)-1;
	 y = parseInt(y);
	
	 mesActual = fechaActual.getMonth()+1;	
	 diaActual = fechaActual.getUTCDate();	 
	 
	 var fecha = new Date(y,m,d);	 
	 
	 /*Comprobamos si hay que restar 1 al a�o en caso de que en el a�o actual no se haya cumplido a�os*/
	 if(mesActual<parseInt(m)+1){			
		return (fechaActual.getFullYear() - fecha.getFullYear())-1;
	}else if(mesActual>parseInt(m)+1){		
		return fechaActual.getFullYear() - fecha.getFullYear();
	}else{
		if(diaActual<parseInt(d)){			
			return (fechaActual.getFullYear() - fecha.getFullYear())-1;
		}else{			
			return fechaActual.getFullYear() - fecha.getFullYear();
		}	
	}	 
}

