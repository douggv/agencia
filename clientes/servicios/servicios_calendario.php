<?php 
include '../../app/config.php';
?>

<?php include '../layout/cabecera.php';?>
<?php include '../layout/nav.php';?>
<?php include '../../app/controllers_clientes/servicios/listado_servicios_clinica.php"'; ?>
<?php $id_servicio = $_GET['id_servicio']; ?>
<?php include '../../app/controllers_clientes/servicios/datos_servicio_individual.php"'; ?>
<?php include '../../app/controllers_clientes/servicios/datos_mascota.php"'; ?>
<?php include '../../admin/layout/mensaje.php".'; ?>



<script>
        let a;
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', 
            locale: 'es',
            editable: true,
            selectable: true,
            allDaySlot: false,

            events: '../../app/controllers/reservas/cargar_reservas.php',
            dateClick: function(info) {
            a = info.dateStr;
            const fechaComoCadena = a;
            var numeroDia = new Date(fechaComoCadena).getDay();
            // Restamos 1 al valor devuelto por getDay()
            var diaSemanaIndex = (numeroDia);

            var diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
            var diaSemana = diasSemana[diaSemanaIndex];
                if (numeroDia == 6) {
                    Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Lo sentimos, no hay atencion los dias Domingos",
                    showConfirmButton: false,
                    timer: 1500
                    });            
                } else {
                // Abre el modal de Bootstrap
                var modal = new bootstrap.Modal(document.getElementById('modal_reservas'));
                modal.show();

                document.getElementById('dia_de_la_semana').innerHTML = diaSemana + ' ' + a;
            
                let fecha = info.dateStr;
                let res = "";
                let url = "<?php echo $URL; ?>/app/controllers_clientes/servicios/verificar_horario.php";
                $.get (url, {fecha: fecha}, function (datos) {
                    res = datos;
                    $('#respuesta_horario').html(res);
                    
                });
            }

            

            
        }
            
            });
            calendar.render();
        });

</script>

<main style="background-color: white;">
<h2 class="text-center mt-5">Reservar Servicio de <span class="text-success opacity-75"><?php echo $nombre; ?></span></h2>
<div class ="container mt-5" id ="calendar"></div>



    <!-- Modal horas disponibles -->
    <div class="modal fade" id="modal_reservas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva tu Cita para el dia <span id ="dia_de_la_semana"></span></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div id ="respuesta_horario"></div>
                <div class="col-md-6">
                    <h4 class="text-center mb-3">Horas Disponibles en la Mañana</h4>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success" data-bs-dismiss ="modal" id ="btn_h1" type="button">08:00 am - 09:00 am</button>
                        <button class="btn btn-success" data-bs-dismiss ="modal"  id ="btn_h2" type="button">09:00 am - 10:00 am</button>
                        <button class="btn btn-success" data-bs-dismiss ="modal"  id ="btn_h3" type="button">10:00 am - 11:00 am</button>
                        <button class="btn btn-success" data-bs-dismiss ="modal"  id ="btn_h4" type="button">11:00 am - 12:00 pm</button>
                    </div>                
                </div>
                <div class="col-md-6">
                <h4 class="text-center mb-3">Horas Disponibles en la Tarde</h4>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success" data-bs-dismiss ="modal"  id ="btn_h5" type="button">02:00 pm - 03:00 pm</button>
                        <button class="btn btn-success" data-bs-dismiss ="modal"  id ="btn_h6" type="button">03:00 pm - 04:00 pm</button>
                        <button class="btn btn-success" data-bs-dismiss ="modal"  id ="btn_h7" type="button">04:00 pm - 05:00 pm</button>
                        <button class="btn btn-success" data-bs-dismiss ="modal"  id ="btn_h8" type="button">05:00 pm - 06:00 pm</button>
                    </div> 
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
    </div>



        <!-- Modal horas disponibles -->
        <div class="modal fade" id="modal_formulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva tu Cita para el dia <span id ="dia_de_la_semana"></span></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <form action ="<?php echo $URL; ?>app/controllers/reservas/enviar_reserva.php" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nombre de Servicio</label>
                            <input type="text" name="" disabled value = "<?php echo $nombre; ?>" class="form-control">
                            <input type="text" name="title" hidden value = "<?php echo $nombre; ?>" class="form-control">
                        </div>  
                        <div class="col-md-6">
                        <label for="">Fecha de Reserva</label>
                        <input id ="fechaCita" type="text" name="" disabled  class="form-control">
                        </div>
                        
                        
                        <input id ="fechaCita2" type="text" name="fecha_cita"   class="form-control" hidden>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Hora de Reserva</label>
                            <input type="text" name="" id ="reserva_hora" disabled class="form-control">
                            <input type="text" name="hora_cita" id ="reserva_hora2" hidden   class="form-control">
                        </div>  
                        <div class="col-md-6">
                        <label for="">Usuario</label>
                        <input id ="" type="text" name="" disabled value = "<?php echo $nombre_completo_sesion; ?>"  class="form-control">
                        <input id ="" type="text" name="usuario" hidden value = "<?php echo $nombre_completo_sesion; ?>"  class="form-control" hidden>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Precio del Servicio</label>
                            <input value = "<?php echo $precio; ?>$" type="text" name="" id ="precio" disabled class="form-control">
                        </div>  
                        <div class="col-md-6">
                            <label for="">Metodo de Pago</label>
                            <select class="form-select"  name="metodo_pago" id="">
                                <option value="pago_movil">Pago Movil</option>
                                <option value="transferencia">Transferencia</option>
                                <option value="Binace">Binace</option>
                                <option value="zelle">Zelle</option>
                                <option value="paypal">Paypal</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <label for="">Nombre de quien realizó el pago</label>
                            <input required  type="text" name="nombre_pago"  class="form-control">
                        </div>  
                        <div class="col-md-5">
                            <label for="">Numero de referencia</label>
                            <input type="text" name="referencia" id =""  class="form-control">
                        </div> 
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Comprobante de pago</label>
                                <input required type="file" class="form-control" name="file" id="file">
                                <br>
                                <center>
                                    <output id="list"></output>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Reservar</button>
                    </div>
                    <input type="text" name="id_usuario" value = "<?php echo $id_usuario_sesion; ?>" hidden >
                    <input type="text" name="id_servicio" value = "<?php echo $id_servicio; ?>" hidden>
                    <input type="text" name ="estado" value = "pendiente" hidden">
                    
                </form>
            </div>
        </div>
        
        </div>
    </div>
    </div>

</main>

<script>
    // Script para abrir formulario de reserva
    let btn_h1 = document.getElementById('btn_h1');
    btn_h1.addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('modal_formulario'));
                modal.show();
                let fecha = a;
                let fechaCita = document.getElementById('fechaCita');
                fechaCita.value = fecha;
                let fechaCita2 = document.getElementById('fechaCita2');
                fechaCita2.value = fecha;
                
                let h1 = "08:00 - 09:00";
                let reserva_hora = document.getElementById('reserva_hora');
                reserva_hora.value = h1;
                let reserva_hora2 = document.getElementById('reserva_hora2');
                reserva_hora2.value = h1;
    });
    let btn_h2 = document.getElementById('btn_h2');
    btn_h2.addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('modal_formulario'));
                modal.show();
                let fecha = a;
                let fechaCita = document.getElementById('fechaCita');
                fechaCita.value = fecha;
                let fechaCita2 = document.getElementById('fechaCita2');
                fechaCita2.value = fecha;

                let h2 = "09:00 - 10:00";
                let reserva_hora = document.getElementById('reserva_hora');
                reserva_hora.value = h2;
                let reserva_hora2 = document.getElementById('reserva_hora2');
                reserva_hora2.value = h2;
    });
    let btn_h3 = document.getElementById('btn_h3');
    btn_h3.addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('modal_formulario'));
                modal.show();
                let fecha = a;
                let fechaCita = document.getElementById('fechaCita');
                fechaCita.value = fecha;
                let fechaCita2 = document.getElementById('fechaCita2');
                fechaCita2.value = fecha;

                let h3 = "10:00 - 11:00";
                let reserva_hora = document.getElementById('reserva_hora');
                reserva_hora.value = h3;
                let reserva_hora2 = document.getElementById('reserva_hora2');
                reserva_hora2.value = h3;
    });
    let btn_h4 = document.getElementById('btn_h4');
    btn_h4.addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('modal_formulario'));
                modal.show();
                let fecha = a;
                let fechaCita = document.getElementById('fechaCita');
                fechaCita.value = fecha;
                let fechaCita2 = document.getElementById('fechaCita2');
                fechaCita2.value = fecha;

                let h4 = "11:00 - 12:00";
                let reserva_hora = document.getElementById('reserva_hora');
                reserva_hora.value = h4;
                let reserva_hora2 = document.getElementById('reserva_hora2');
                reserva_hora2.value = h4;
    });
    let btn_h5 = document.getElementById('btn_h5');
    btn_h5.addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('modal_formulario'));
                modal.show();
                let fecha = a;
                let fechaCita = document.getElementById('fechaCita');
                fechaCita.value = fecha;
                let fechaCita2 = document.getElementById('fechaCita2');
                fechaCita2.value = fecha;

                let h5 = "14:00 - 15:00";
                let reserva_hora = document.getElementById('reserva_hora');
                reserva_hora.value = h5;
                let reserva_hora2 = document.getElementById('reserva_hora2');
                reserva_hora2.value = h5;
    });
    let btn_h6 = document.getElementById('btn_h6');
    btn_h6.addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('modal_formulario'));
                modal.show();
                let fecha = a;
                let fechaCita = document.getElementById('fechaCita');
                fechaCita.value = fecha;
                let fechaCita2 = document.getElementById('fechaCita2');
                fechaCita2.value = fecha;

                let h6 = "15:00 - 16:00";
                let reserva_hora = document.getElementById('reserva_hora');
                reserva_hora.value = h6;
                let reserva_hora2 = document.getElementById('reserva_hora2');
                reserva_hora2.value = h6;
    });
    let btn_h7 = document.getElementById('btn_h7');
    btn_h7.addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('modal_formulario'));


                modal.show();
                let fecha = a;
                let fechaCita = document.getElementById('fechaCita');
                fechaCita.value = fecha;
                let fechaCita2 = document.getElementById('fechaCita2');
                fechaCita2.value = fecha;

                let h7 = "16:00 - 17:00";
                let reserva_hora = document.getElementById('reserva_hora');
                reserva_hora.value = h7;
                let reserva_hora2 = document.getElementById('reserva_hora2');
                reserva_hora2.value = h7;
    });
    let btn_h8 = document.getElementById('btn_h8');
    btn_h8.addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('modal_formulario'));
                modal.show();
                let fecha = a;
                let fechaCita = document.getElementById('fechaCita');
                fechaCita.value = fecha;
                let fechaCita2 = document.getElementById('fechaCita2');
                fechaCita2.value = fecha;

                let h8 = "17:00 - 18:00";
                let reserva_hora = document.getElementById('reserva_hora');
                reserva_hora.value = h8;
                let reserva_hora2 = document.getElementById('reserva_hora2');
                reserva_hora2.value = h8;
    });


    
        
</script>

<script>
    // Script para subir imagen
    function archivo(evt) {
        var files = evt.target.files; // FileList object
        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    // Insertamos la imagen
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>