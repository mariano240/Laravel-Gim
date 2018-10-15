<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">account_circle
                </i>
            </div>
            <h4 class="card-title">Clientes Activos </h4>
        </div>
        <div class="card-body">
               
                <div class="toolbar  col-md-5 ml-auto">
                    <div class="btn-group">
                            <button class="btn btn-info">
                                    <i class="material-icons">add</i> Nuevo Cliente
                                  <div class="ripple-container"></div>
                            </button>
                        <button class="btn btn-info ">
                                <i class="material-icons">autorenew</i> Reincorporar Cliente
                              <div class="ripple-container"></div>
                        </button>
                    </div>
                </div>
                <hr>
                <div class="material-datatables">
                  <table id="tablaClientes" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                    width="100%" style="width:100%">
                    <thead>
                      <tr>
                          <th></th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Membresia</th>
                        <th>Promocion</th>
                        <th>Forma de Pago</th>
                        
                        {{-- <th>Office</th>
                        <th>Age</th>
                        <th>Date</th>
                        <th class="disabled-sorting text-right">Actions</th> --}}
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Membresia</th>
                        <th>Promocion</th>
                        <th>Forma de Pago</th>
                        {{-- <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th class="text-right">Actions</th> --}}
                      </tr>
                    </tfoot>
                    
                  </table>
                </div>
              </div>
    </div>
</div>

<script src="../../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>

<script src="../../assets/js/core/jquery.min.js" type="text/javascript"></script>

<script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>



