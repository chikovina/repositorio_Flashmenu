	function userPass() {
		 alert('Login o contraseña estan incorrectos. Vuelva a intentarlo');
	}

	function restaurantesAsociados(a){

		if(a == true){

		}
		else{
			alert("No tiene restaurantes asociados. Debe agregar uno");
		}

	}

	function sinProductos(a){
		//sin producto
		if(a == true){

		}
		else{
			alert("No tiene producto en la carta. Debe agregar.");
			window.history.go(-1)
		}

	}

	function sinReservas(a){
		//sin producto
		if(a == true){

		}
		else{
			alert("No tiene ninguna reserva.");
			window.history.go(-1)
		}
	}

	function sinMenu(a){
		//sin producto
		if(a == true){

		}
		else{
			alert("No tiene menus en la carta. Debe agregar.");
			window.history.go(-1)
		}

	}

	function sinMesas(a){
		//sin producto
		if(a == true){

		}
		else{
			alert("No tiene mesas agregadas. Debe agregar.");
			window.history.go(-1)
		}

	}

	function sinHorariosMesas(a){
		//sin producto
		if(a == true){

		}
		else{
			alert("No tiene horarios para esta mesa. Debe agregar.");
			window.history.go(-1)
		}

	}
//validarVaciosDescripcion()  validarVaciosEmail() validarVaciosAddress() validarVaciosFecha() validarVaciosHora() validarVaciosRut() validarVaciosapeP() validarVaciosContrasena() validarVaciosNro() validarVaciosCantPersonas() validarVaciosPrecio()

	function validarVaciosNombre(){
		if(document.NombreForm.nombre.value =='')  document.getElementById("nombreInput").style.borderColor = "yellow";
	}
	function validarVaciosDescripcion(){
		if(document.NombreForm.descripcion.value =='')  document.getElementById("descripcionInput").style.borderColor = "yellow";
	}
	function validarVaciosTipo(){
		if(document.NombreForm.tipo.value =='')  document.getElementById("tipoInput").style.borderColor = "yellow";
	}
	function validarVaciosEmail(){
		if(document.NombreForm.email.value   	 =='') 	document.getElementById("emailInput").style.borderColor = "yellow";
	}
	function validarVaciosAddress(){
		if(document.NombreForm.address.value 	 =='')  document.getElementById("address").style.borderColor = "yellow";
	}
	function validarVaciosFecha(){
		if(document.NombreForm.fecha.value 		 =='')  document.getElementById("fechaInput").style.borderColor = "yellow";
	}
	function validarVaciosHora(){
		if(document.NombreForm.hora.value 		 =='' ) document.getElementById("horaInput").style.borderColor = "yellow";
	}
	function validarVaciosRut(){
		if(document.NombreForm.rut.value 		 =='')  document.getElementById("rutInput").style.borderColor = "yellow";
	}
	function validarVaciosapeP(){
		if(document.NombreForm.apeP.value 		 =='')  document.getElementById("apePInput").style.borderColor = "yellow";
	}
	function validarVaciosContrasena(){
		if(document.NombreForm.contrasena.value  =='') document.getElementById("passInput").style.borderColor = "yellow";
	}
	function validarVaciosNro(){
		if(document.NombreForm.nro.value  		 =='')  document.getElementById("nroInput").style.borderColor = "yellow";
	}
	function validarVaciosCantPersonas(){
		if(document.NombreForm.cantPersonas.value=='' ) document.getElementById("cantPersonasInput").style.borderColor = "yellow";
	}
	function validarVaciosPrecio(){
		if(document.NombreForm.precio.value 	 =='') 	document.getElementById("precioInput").style.borderColor = "yellow";
	}
	function validarVaciosDireccion(){
		if(document.NombreForm.lat.value 	 =='' && document.NombreForm.long.value 	 =='') 	document.getElementById("address").style.borderColor = "yellow";
	}


	function validarVacios(){
		alert("No puede dejar campos vacios");
	}
		   
		   // alert('No puede dejar campos vacios');
		    //document.NombreForm.nombre.focus();
		    
		

	

	function datosExistente(){
		alert("Datos existentes");

	}

	function nombreExistente(){
		document.getElementById("errorNombre").style.color = "red";
		document.getElementById("errorNombre").innerHTML = "Nombre:*";
	}

	function emailExistente(){
		document.getElementById("errorEmail").style.color = "red";
		document.getElementById("errorEmail").innerHTML = "Email restaurant:*";

	}

	function direccionExistente(){
		document.getElementById("errorDireccion").style.color = "red";
		document.getElementById("errorDireccion").innerHTML = "Direccion:*";

	}
	
	function emailAdmExistente(){
		document.getElementById("errorAdmEmail").style.color = "red";
		document.getElementById("errorAdmEmail").innerHTML = "Email:*";

	}

	function rutExistente(){
		document.getElementById("errorRut").style.color = "red";
		document.getElementById("errorRut").innerHTML = "Rut:*";

	}

	function creadoExitosamente(){
		 alert('Creado exitosamente!');
	}

	function errorIngresar(){
		 alert('Error al ingresar!');
	}

	function archivoInvalido(){
		document.getElementById("errorFoto").style.color = "red";
		document.getElementById("errorFoto").innerHTML = "Suba una foto:*";
		 alert('Archivo invalido');
	}

	//ingresar menu
	function capturarValor(){

		/*
	var v1 = document.getElementById("c1").value;
		if(v1=="0"){
			parseInt(v1)=0;
			sum1 = parseInt(v1);
		}else{

		v1 = v1.split(",");	
		sum1 = parseInt(v1[1]);
		}

		var v2 = document.getElementById("c2").value;
		if(v2=="0"){
			parseInt(v2)=0;
			sum2 = parseInt(v2);
		}else{

		v2 = v2.split(",");	
		sum2 = parseInt(v2[1]);
		}

		var v3 = document.getElementById("c3").value;
		if(v3=="0"){
			parseInt(v3)=0;
			sum3 = parseInt(v3);
		}else{

		v3 = v3.split(",");	
		sum3 = parseInt(v3[1]);
		}

		document.getElementById("sumaPrecio").innerHTML ="$"+(sum1+sum2+sum3);

		*/
		
		var v1 = document.getElementById("c1").value;
		v1 = v1.split(",");

		var v2 = document.getElementById("c2").value;
		v2 = v2.split(",");

		var v3 = document.getElementById("c3").value;
		v3 = v3.split(",");

		document.getElementById("sumaPrecio").innerHTML ="$"+(parseInt(v1[1])+parseInt(v2[1])+parseInt(v3[1]));

	}

	function noHayProductos(){
		alert("No tiene producto en la carta. Debe agregar para ingresar menús.");
		window.history.go(-1)
	}

	function nombreMenuExiste(){
		alert("No tiene producto en la carta. Debe agregar para ingresar menús.");
		window.history.go(-1)
	}
	//ingresar menu


	//ingresar mesa

	function nroMesaExiste(){
		document.getElementById("errorNroMesa").style.color = "red";
		document.getElementById("errorNroMesa").innerHTML = "Nro mesa:*";
	}
	
	//ingresar mesa

	function eliminado(){
		alert('Eliminado!');
	}

	function actualizadoExitosamente(){
		alert('Actualizado exitosamente!');
	}

	//ingresar horarios-fecha
	function horarioExiste(){
		alert('Horario existente!');
	}


	function horahora(){

		var fecha2 = new Date();
		var hora = fecha2.getHours();
		var minuto = fecha2.getMinutes();
		var segundo = fecha2.getSeconds();
		var dia = fecha2.getDate();
		var mes = fecha2.getMonth();
		var anio = fecha2.getFullYear();

		if (hora < 10) {hora = "0" + hora;}
		if (minuto < 10) {minuto = "0" + minuto;}
		if (segundo < 10) {segundo = "0" + segundo;}

		if (dia < 10) {dia = "0" + dia;}
		if (mes < 10) {mes = "0" + mes;}

		document.getElementById("hora").firstChild.nodeValue= (parseInt(mes)+1)+"-"+anio;
		tiempo = setTimeout('horahora()',1000);
	}

	function inicio(){
		document.write('<span id="hora">');
		document.write('000000</span>');
		horahora();
		diasDelMes();
	}

	function diasDelMes(){

		var fecha2 = new Date();
		var mes = fecha2.getMonth();
		mes=mes+1;

		if(mes == 1){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='31' value='1'>";}
		if(mes == 2){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='28' value='1'>";}
		if(mes == 3){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='31' value='1'>";}
		if(mes == 4){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='30' value='1'>";}
		if(mes == 5){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='31' value='1'>";}
		if(mes == 6){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='30' value='1'>";}
		if(mes == 7){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='31' value='1'>";}
		if(mes == 8){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='31' value='1'>";}
		if(mes == 9){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='30' value='1'>";}
		if(mes == 10){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='31' value='1'>";}
		if(mes == 11){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='30' value='1'>";}
		if(mes == 12){document.getElementById("diasMes").innerHTML = "<input id='horaInput' name='dia' style=width:'10%' type='number' min='1' max='31' value='1'>";}
	}

	function verificarHoraFecha(a, b){
		var fecha = new Date();
		var hora = fecha.getHours();
		var minuto = fecha.getMinutes();
		var segundo = fecha.getSeconds();
		var dia = fecha.getDate();
		var mes = 1+fecha.getMonth();
		var anio = fecha.getFullYear();
		
		if (hora < 10) {hora = "0" + hora;}
		if (minuto < 10) {minuto = "0" + minuto;}
		if (segundo < 10) {segundo = "0" + segundo;}

		var horita = hora + ":" + minuto + ":" + segundo;
		
		var z = a.split(":");
		var t = b.split("-");

		var sumaZ = parseInt(z[0]) + parseInt(z[1]);
		var sumaHora = hora+minuto;

		if(parseInt(t[3] < dia)){ alert("Fecha invalida") };


		if(sumaZ < sumaHora){ alert("no puede ingresar hora menor a la actual"); }



		//fecha.getDate() + "/" + (fecha.getMonth() +1) + "/" + fecha.getFullYear();


		//document.getElementById('hora').firstChild.nodeValue = horita;
//		tiempo = setTimeout('hora()',1000);
	}
	

	function fechaActual(){
		alert('fecha invalida');
	}
	function horarioActual(){
		alert('horario invalida');
	}





	//ingresar horarios-fecha
	
