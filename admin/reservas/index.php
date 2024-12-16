<?php include '../../app/config.php';?>    
<?php include '../../admin/layout/parte1.php';?>
<?php include '../../admin/layout/mensaje.php';?>
<?php include '../../app/controllers/reservas/lista_reservas.php';?> 
<div class="container-fluid">
<h1>Listado de Reservas</h1>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><b>reservas registrados</b></h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="text-align: center">Nro</th>
                        <th>Titulo</th>
                        <th>Fecha de cita</th>
                        <th>Hora de cita</th>
                        <th>Usuario</th>
                        <th>Método de pago</th>
                        <th>Realizado Por</th>
                        <th>Referencia</th>
                        <th>imagen</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $contador = 0;
                    foreach ($reservas as $reserva){
                        $contador = $contador + 1;
                        $id_reserva = $reserva['id'];
                        ?>
                        <tr>
                            <td><center><?= $contador; ?></center></td>
                            <td> <?= $reserva['title']; ?></td>
                            <td> <?= $reserva['fecha_cita']; ?></td>
                            <td> <?= $reserva['hora_cita']; ?></td>
                            <td> <?= $reserva['usuario']; ?></td>
                            <td> <?= $reserva['metodo_pago']; ?></td>
                            <td> <?= $reserva['nombre_pago']; ?></td>
                            <td> <?= $reserva['referencia']; ?></td>
                            <td> <img src="<?= $URL."/public/images/comprobantes/".$reserva['imagen']; ?>" width="100px" alt="ad"></td>
                            <td> <?= $reserva['estado']; ?></td>

                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="<?= $URL ?>/app/controllers/reservas/aceptar_reserva.php?id=<?= $reserva['id'] ?>" class="btn btn-success">Aceptar</a>
                                    <a href="<?= $URL ?>/admin/reservas/negar.php?id=<?= $reserva['id'] ?>" class="btn btn-danger">Negar</a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>

                <br><br>


            </div>
        </div>
    </div>
</div>



</div>
<?php include '../../admin/layout/parte2.php';?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ reservas",
                "infoEmpty": "Mostrando 0 a 0 de 0 reservas",
                "infoFiltered": "(Filtrado de _MAX_ total reservas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ reservas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
