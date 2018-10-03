<!-- seccion membresia -->
<div class="col-md-12" >
    <div class="card">
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">card_membership
                </i>
            </div>
            <h4 class="card-title">Membresias</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>

                            <th class="text-left">Nombre</th>
                            <th class="text-center">Costo</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">En Promoción</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaTipoMembresia">
                            @foreach ($membresias as $item)
                            <tr data-idMembresia="{{$item['id']}}">

                                    <td class="text-left">{{$item['nombre']}}</td>
                                    <td class="text-center">{{$item['costo']}}</td>
                                    <td class="text-center">{{$item['descripcion']}}</td>
                                    <td class="text-center">No</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                            <i class="material-icons">card_giftcard</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-warning" data-tipo="editar" data-original-title=""
                                            title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" data-tipo="eliminar" data-original-title="" title="">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                    <td colspan="4"></td>
                                    <td colspan="2" class="text-right">
                                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#ModalCrearTipoMembresia" >
                                            <i class="material-icons">add</i>
                                        </button>
                                    </td>
                                </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- seccion promoción -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">card_giftcard
                </i>
            </div>
            <h4 class="card-title">Promociones</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>

                            <th class="text-left">Nombre</th>
                            <th class="text-center">Vigencia</th>
                            <th class="text-center">Beneficio</th>
                            <th class="text-center">Mínimo de Meses</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaTipoPromocion" data-info="manola">
                        @foreach ($promociones as $item)
                        
                        <tr data-idPromocion="{{$item['id']}}">
                            <td class="text-left">{{$item['nombre']}}</td>
                            <td class="text-center">{{$item['fecha_inicio']}}--{{$item['fecha_fin']}}</td>
                            <td class="text-center">{{$item['descripcion']}}</td>
                            <td class="text-center">{{$item['cant_meses']}}</td>
                            <td class="td-actions text-right">
                                <button type="button"  rel="tooltip"  class="btn btn-success" data-original-title=""
                                    title="">
                                    <i class="material-icons">card_membership</i>
                                </button>
                                <button type="button"  rel="tooltip"  data-tipo="editar" class="btn btn-warning" data-original-title="" 
                                    title="">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button"  rel="tooltip"  data-tipo="eliminar" class="btn btn-danger" data-original-title="" title="">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                                <td colspan="4"></td>
                                <td colspan="2" class="text-right">
                                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modalCrearPromocion" >
                                        <i class="material-icons">add</i>
                                    </button>
                                </td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- seccion modales -->

<!-- modal crear membresia -->
<div class="modal fade" id="ModalCrearTipoMembresia" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">

                <div class="modal-body">

                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">card_membership</i>
                        </div>
                        <h4 class="card-title">Crear Nuevo Tipo de Membresia</h4>
                    </div>
                    <form id="formAltaTipoMembresia" >
                        
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">chat</i></div>
                                    </div>
                                    <input type="text" class="form-control" required placeholder="Nombre de la Membresia..." name="nombre">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">comment</i></div>
                                    </div>
                                    <input type="text" class="form-control" required placeholder="Descripción..." name="descripcion">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">attach_money</i></div>
                                    </div>
                                    <input type="number" required placeholder="Costo..." class="form-control" min="0" max="100000" name="costo"/>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                                <button  class="btn" data-dismiss="modal">Cancelar</button>
                                <br>
                                <button  class="btn btn-primary" data-dismiss="modal" id="postAltaTipoMembresia">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- modal editar membresia -->

<div class="modal fade" id="ModalEditarTipoMembresia" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">

                <div class="modal-body">

                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">card_membership</i>
                        </div>
                        <h4 class="card-title">Editar Tipo de Membresia</h4>
                    </div>
                    <form id="formEditarTipoMembresia" >
                        
                        <div class="card-body">
                                <input type="hidden" name="idTipoMembresia">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">chat</i></div>
                                    </div>
                                    <input type="text" class="form-control" required placeholder="Nombre de la Membresia..." name="nombre">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">comment</i></div>
                                    </div>
                                    <input type="text" class="form-control" required placeholder="Descripción..." name="descripcion">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">attach_money</i></div>
                                    </div>
                                    <input type="number" required placeholder="Costo..." class="form-control" min="0" max="100000" name="costo"/>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                                <button  class="btn" data-dismiss="modal">Cancelar</button>
                                <br>
                                <button  class="btn btn-primary" data-dismiss="modal" id="postEditarTipoMembresia">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<!-- modal confirmar eliminar membresia -->

<div class="modal fade" id="ModalConfirmarMembresia" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">

                <div class="modal-body">

                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">delete_forever</i>
                        </div>
                        <h4 class="card-title">ATENCIÓN</h4>
                    </div>
                    
                        
                        <div class="card-body">
                            

                           <div id="textoEliminarMembresia" data-nombreMembresia="" data-idMembresia="">

                           </div>
                            


                        </div>
                        <div class="modal-footer">
                                <button  class="btn" data-dismiss="modal">Cancelar</button>
                                <br>
                                <button  class="btn btn-danger" data-dismiss="modal" id="eliminarTipoMembresia">Aceptar</button>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>





<!-- modal crear Promoción -->

<div class="modal fade" id="modalCrearPromocion" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">

                <div class="modal-body">

                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">card_giftcard</i>
                        </div>
                        <h4 class="card-title">Crear Nueva Promoción</h4>
                    </div>
                    <form id="formAltaTipoPromocion" >
                        
                        <div class="card-body">

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">chat</i></div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nombre de la Promocion..." required name="nombre">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">comment</i></div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Descripción..." required name="descripcion">
                                </div>
                            </div>


                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">

                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">date_range
                                                    </i>Fecha Inicial:</div>

                                            </div>

                                            <input type="date" class="form-control" name="fecha_inicial">
                                        </div>
                                    </div>

                                </div>

                                <div class="col">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">date_range</i>Fecha
                                                    Final:</div>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_fin">
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">label
                                                    </i></div>
                                            </div>
                                            <input type="number" placeholder="Descuento %..." min="0" max="100" class="form-control" name="descuento"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">label
                                                    </i></div>
                                            </div>
                                            <input type="number" placeholder="Tiempo Extendido..." min="0" max=12 class="form-control" name="tiempo_extendido"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">label
                                                    </i></div>
                                            </div>
                                            <input type="number" placeholder="Cant mínima de meses..." required min="1" max="12" class="form-control" name="cant_meses"/>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>

                            


                        </div>

                        <div class="modal-footer">
                            <button  class="btn " data-dismiss="modal">Cancelar</button>
                            <br>
                            <button  class="btn btn-primary" data-dismiss="modal" id="postAltaTipoPromocion" >Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- modal editar promocion -->



<div class="modal fade" id="ModalEditarTipoPromocion" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">

                <div class="modal-body">

                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">card_giftcard</i>
                        </div>
                        <h4 class="card-title">Editar Tipo de Promoción</h4>
                    </div>
                    <form id="formEditarTipoPromocion" >
                        
                        <div class="card-body">
                            <input type="hidden" name="idTipoPromocion">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">chat</i></div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nombre de la Promocion..." required name="nombre">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons">comment</i></div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Descripción..." required name="descripcion">
                                </div>
                            </div>


                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">

                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">date_range
                                                    </i>Fecha Inicial:</div>

                                            </div>

                                            <input type="date" class="form-control" name="fecha_inicial">
                                        </div>
                                    </div>

                                </div>

                                <div class="col">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">date_range</i>Fecha
                                                    Final:</div>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_fin">
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">label
                                                    </i></div>
                                            </div>
                                            <input type="number" placeholder="Descuento %..." min="0" max="100" class="form-control" name="descuento"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">label
                                                    </i></div>
                                            </div>
                                            <input type="number" placeholder="Tiempo Extendido..." min="0" max=12 class="form-control" name="tiempo_extendido"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">label
                                                    </i></div>
                                            </div>
                                            <input type="number" placeholder="Cant mínima de meses..." required min="1" max="12" class="form-control" name="cant_meses"/>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>

                            


                        </div>

                        <div class="modal-footer">
                            <button  class="btn " data-dismiss="modal">Cancelar</button>
                            <br>
                            <button  class="btn btn-primary" data-dismiss="modal" id="postEditarTipoPromocion" >Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<!-- modal confirmar eliminar promocion -->

<div class="modal fade" id="ModalConfirmarPromocion" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">

                <div class="modal-body">

                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">delete_forever</i>
                        </div>
                        <h4 class="card-title">ATENCIÓN</h4>
                    </div>
                    
                        
                        <div class="card-body">
                            

                           <div id="textoEliminarPromocion" data-nombrePromocion="" data-idPromocion="">

                           </div>
                            


                        </div>
                        <div class="modal-footer">
                                <button  class="btn" data-dismiss="modal">Cancelar</button>
                                <br>
                                <button  class="btn btn-danger" data-dismiss="modal" id="eliminarTipoPromocion">Aceptar</button>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.min.js?v=2.0.2" type="text/javascript"></script>
