

(function(){
    "use strict";

    var regalo = document.querySelector('#regalo');
    document.addEventListener('DOMContentLoaded', function(){
    //console.log("listo");
    
    if (document.querySelector('#mapa')) {
        var map = L.map('mapa').setView([10.456502, -73.264183], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([10.456502, -73.264183]).addTo(map)
        .bindPopup('Lugar del evento <br> VALLEWEBCAPM')
        .openPopup()
        .bindTooltip('¡Aquí!')
        .openTooltip();
    }
    
    //campos datos usuario
    var nombre = document.querySelector('#nombre');
    var apellido = document.querySelector('#apellido');
    var email = document.querySelector('#email');
    
    //campos pases

    var paseCompleto = document.querySelector('#pase_dia');
    var paseDos = document.querySelector('#pase_dosdia');
    var paseDia = document.querySelector('#pase_completo');
    
    //Botones y divs
    var calcular = document.querySelector('#calcular');
    var errorDiv = document.querySelector('#error');
    var botonRegistro = document.querySelector('#btnRegistro');
    var listaProductos = document.querySelector('#lista-productos');
    var sumaTotal = document.querySelector('#suma-total');

    $('#btnRegistro').attr("disabled", true);//deshabilitar el botón de pagar antes de calcular el monto 
    //Extras
    var camisas = document.querySelector('#camisa_evento');
    var etiquetas = document.querySelector('#etiquetas');

    if(document.querySelector('#calcular')){

        

        calcular.addEventListener('click', calcularMonto);
        paseDia.addEventListener('blur', mostrarDias);//con blur obtengo el ultimo valor que dejo en el spinbox
        paseDos.addEventListener('blur',mostrarDias);
        paseCompleto.addEventListener('blur',mostrarDias);
        //validar nombre
        nombre.addEventListener('blur', validacion);
        //validar apellido
        apellido.addEventListener('blur', validacion);
        //validar email
        email.addEventListener('blur', validacion);
        email.addEventListener('blur', emailValid);
        
        function validacion(event){
            if(this.value == ''){
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = 'Este campo es obligatorio';
                this.style.border = '1px solid red';
                errorDiv.style.color = 'red';
            }else{
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #5c5c5c';
            }
        }
        
        function emailValid(event){
            if(this.value.indexOf('@') > -1){
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #5c5c5c';
            }else{
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = 'Este campo debe contener al menos un @';
                this.style.border = '1px solid red';
                errorDiv.style.color = 'red';
            }
        }

        function calcularMonto(event){
            event.preventDefault();
            //console.log("has hecho click en calcular");
            if (regalo.value === ''){
                alert('Debes elegir un regalo');
                regalo.focus();
            } else{
                //console.log('Ya elegiste regalo');
                //console.table([paseDia.value, paseCompleto.value, paseDos.value]);
                var boletoCompleto = parseInt(paseCompleto.value, 10) || 0,
                    boleto2Dia = parseInt(paseDos.value, 10) || 0,
                    boletoDia = parseInt(paseDia.value, 10) || 0,
                    cantidadCamisas = parseInt(camisas.value, 10) || 0,
                    cantidadEtiquetas = parseInt(etiquetas.value, 10) || 0;


                var totalPagar = (boletoDia * 30) + (boleto2Dia * 45) + (boletoCompleto * 50) +((cantidadCamisas * 10)*.93) + (cantidadEtiquetas * 3);
                console.log(totalPagar);

                var listadoProductos = new Array();
                if(boletoDia >= 1){
                    listadoProductos.push( `${boletoDia} Pase(s) por día`);
                }
                if(boleto2Dia >=1){
                    listadoProductos.push( `${boleto2Dia} Pase(s) por dos días`);
                }
                if(boletoCompleto >= 1){
                    listadoProductos.push( `${boletoCompleto} Pase(s) completos`);
                }
                if(cantidadCamisas >= 1){
                    listadoProductos.push( `${cantidadCamisas} Camisa(s) seleccionadas`);
                }
                if(cantidadEtiquetas >= 1){
                    listadoProductos.push( `${cantidadEtiquetas} Etiqueta(s) seleccionadas`);
                }
                console.log(listadoProductos);
                
                listaProductos.style.display = 'block';//mostrar con javaScript Line-922
                listaProductos.innerHTML = '';//Para que no vuelva a escribirse todo al calcular el resumen
                for (var i = 0; i < listadoProductos.length; i++){
                    listaProductos.innerHTML += listadoProductos[i] + '<br>';
                }

                sumaTotal.style.display = 'block';
                sumaTotal.innerHTML = `${totalPagar.toFixed(2)} COP`;

                $('#btnRegistro').attr("disabled", false);
                document.getElementById('total_pedido').value = totalPagar;//agregar el valor de calcular a la matriz
                //con jquery no agrego el valor con .value
            }
        }

        function mostrarDias(){
            var boletoCompleto = parseInt(paseCompleto.value, 10) || 0,
                boleto2Dia = parseInt(paseDos.value, 10) || 0,
                boletoDia = parseInt(paseDia.value, 10) || 0;

            
            var diasElegidos = new Array();

            if(boletoDia > 0 ){
                diasElegidos.push('viernes');
            }
            if(boleto2Dia > 0 ){
                diasElegidos.push('viernes','sabado');
            }
            if(boletoCompleto > 0 ){
                diasElegidos.push('viernes', 'sabado', 'domingo');
            }
            
            for(var i = 0; i < diasElegidos.length; i++){
                document.querySelector(`#${diasElegidos[i]}`).style.display = 'block';
            }

        }
    }
    });//DOM content loaded
})();
$(document).ready(function () {
    //jquery para el tab

    //programa de talleres
    $('div.ocultar').hide();
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function () {
        $('div.ocultar').hide();
        $('.menu-programa a').removeClass('activo');
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        $(this).addClass('activo');
        return false;
    });

    //lettering js plugin

    $('.nombre-sitio').lettering();

    //agregar clase a menú

    $('body.conferencias .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    //menu fijo con jquery
    
    //Metodo para saber el tamaño de la ventana
    var windowHeight = $(window).height();
    
    //Metodo para saber el tamaño de la barra
    var alturaNavegacion = $('.barra').innerHeight();
    
    //menu de hamburguesa responsive
    
    $('.menu-movil').on('click',function() {
        
        $('.navegacion-principal').slideToggle();//slideToggle permite la funcionalidad con los dos clicks
    });


    $(window).scroll(function () { 
        var scroll = $(window).scrollTop();

        if(scroll > windowHeight){
            $('.barra').addClass('fixed');
            $('body').css({'margin-top': alturaNavegacion+'px'});
        }else{
            $('.barra').removeClass('fixed');
            $('body').css({'margin-top':'0px'});
        }
        //console.log(scroll);
    });


    //agregado con footer php e index php - estará comentado

    //animaciones para los numeros con jquery

    var resumeLista = $('.resume-evento');
    if (resumeLista.length > 0) {
        $('.resume-evento').waypoint(function () {
            $('.resume-evento li:nth-child(1) p').animateNumber({number: 6}, 1200);
            $('.resume-evento li:nth-child(2) p').animateNumber({number: 15}, 900);
            $('.resume-evento li:nth-child(3) p').animateNumber({number: 3}, 1500);
            $('.resume-evento li:nth-child(4) p').animateNumber({number: 9}, 1000); 
        },{offset: '60%'
        });
    }
    


    //the final countdown plugin - cuenta regresiva
    $('.cuenta-regresiva').countdown('2019/07/05 09:00:00', function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    //colorbox para la sección de invitados
  
    $('.invitado-info').colorbox({inline:true, width:"50%"});

    //boton newsletter
    $('.boton-newsletter').colorbox({inline:true, width:"50%"});
    
   
    
});