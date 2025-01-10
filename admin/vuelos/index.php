<?php include '../../app/config.php';?>    
<?php include '../../admin/layout/parte1.php';?>
<?php include '../../admin/layout/mensaje.php';?>
<?php include '../../app/controllers/vuelos/listado_de_vuelos.php';?> 
<div class="container-fluid">
    <h1>Listado de vuelos</h1>   
    <div class="row">
        <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="text-center font-weight-bold text-danger card-title font-weight-bold">Vuelos Registrados</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-responsive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th> 
                                    <th>tipo</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>fecha de salida</th>
                                    <th>fecha de regreso</th>
                                    <th>Aerolinea</th>
                                    <th>imagen</th>
                                    <th>Acciones</th>
                                </tr>


                            </thead>
                            <tbody>
                                <?php
                                $contador = 0;
                                foreach ($vuelos as $vuelo) {
                                    $contador++;
                                    $id_vuelo = $vuelo["id"];
                                    ?>
                                    <tr>
                                        <td><?php echo $contador; ?></td>
                                        <td><?php echo $vuelo['nombre']; ?></td>
                                        <td><?php echo $vuelo['tipo']; ?></td>
                                        <td><?php echo $vuelo['descripcion']; ?></td>
                                        <td><?php echo $vuelo['precio']; ?></td>
                                        <td><?php echo $vuelo['fecha_salida']; ?></td>
                                        <td><?php echo $vuelo['fecha_regreso']; ?></td>
                                        <td><?php echo $vuelo['aerolinea']; ?></td>
                                        <td><img src="<?php echo $URL; ?>/public/images/vuelos/<?php echo $vuelo["imagen"]; ?>" width="100px" alt="ad"></td>
                                        <td>
                                          <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="create.php?id=<?php echo $id_vuelo ?>" class="btn btn-circle btn-lg btn-success btn-sm">
                                              <i class="fas fa-search-plus"></i>
                                            </a>
                                            <a href="update.php?id=<?php echo $id_vuelo ?>" class="btn btn-circle btn-lg btn-warning btn-sm">
                                              <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="delete.php?id=<?php echo $id_vuelo ?>" class="btn btn-circle btn-lg btn-danger btn-sm">
                                              <i class="fas fa-trash-alt"></i>
                                            </a>
                                          </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ vuelo",
                "infoEmpty": "Mostrando 0 a 0 de 0 vuelo",
                "infoFiltered": "(Filtrado de _MAX_ total vuelo)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ vuelo",
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


<style>

    
    .card-outline.card-primary .card-title {
      color: #FFF;
    }
    
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #FFA07A; /* Naranja claro */
    }
    
    .table-striped tbody tr:nth-of-type(even) {
      background-color: #FFF;
    }
    
    .table-striped tbody tr:hover {
      background-color: #FFD7BE; /* Naranja claro y rosado */
    }
    
    .dataTables_wrapper .dataTables_length select {
      background-color:rgb(189, 189, 189); /* Naranja oscuro */
      color: #FFF;
    }
    
    .dataTables_wrapper .dataTables_filter input {
      background-color:rgb(255, 255, 255); /* Naranja oscuro */
      color: #FFF;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      background-color:rgb(173, 173, 173); /* Naranja oscuro */
      color: #FFF;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background-color: #FFD7BE; /* Naranja claro y rosado */
    }
    
    .dataTables_wrapper .dataTables_info {
      color: #FFF;
    }
    
    .dataTables_wrapper .dataTables_processing {
      background-color:rgb(255, 217, 206); /* Naranja oscuro */
      color: #FFF;
    }
    
    .dt-button {
      background-color: #FF4500; /* Naranja oscuro */
      color: #FFF;
    }
    
    .dt-button:hover {
      background-color: #FFD7BE; /* Naranja claro y rosado */
    }






    .btn-circle {
      border-radius: 50%;
      width: 30px;
      height: 30px;
      padding: 5px;
      font-size: 12px;
      text-align: center;
      line-height: 1.428571429;
      border: none;
      cursor: pointer;
    }
    
    .btn-circle.btn-lg {
      width: 35px;
      height: 35px;
      padding: 10px;
      font-size: 14px;
    }
    
    .btn-circle.btn-success {
      background-color: #2ecc71;
      color: #fff;
    }
    
    .btn-circle.btn-warning {
      background-color: #f1c40f;
      color: #fff;
    }
    
    .btn-circle.btn-danger {
      background-color: #e74c3c;
      color: #fff;
    }
    
    .btn-circle i {
      font-size: 18px;
      margin: 0 auto;
    }
</style>