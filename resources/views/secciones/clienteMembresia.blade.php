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
                            <button class="btn btn-info" data-toggle="modal" data-target="#ModalAltaUsuario">
                                    <i class="material-icons">add</i> Nuevo Cliente
                                  <div class="ripple-container"></div>
                            </button>
                        <button class="btn btn-info " data-toggle="modal" data-target="#ModalActualizarMembresia">
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
                        <th>Estado</th>
                        
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
                        <th>Estado</th>
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

{{-- modal crear usuario --}}

<div class="modal fade ps-child" id="ModalAltaUsuario" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          
        <div class="wizard-container">
            <div class="card card-wizard active" data-color="purple" id="wizardProfile" style="margin-top: 0px;margin-bottom: 0px;">
                <div class="modal-header">
                   
                    <div class="modal-title card-title">
                        <h3 class="card-title">
                            Alta Cliente
                        </h3>
                        <h5 class="card-description">Se creará el cliente y su membresia</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" name=cerrar>
                    <i class="material-icons">clear</i>
                    </button>
                  </div>
              <div class="modal-body">
                
                  
                      <form id="formAltaUsuario" method="" action="">
          
                          <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                          
                          <div class="wizard-navigation">
                              <ul class="nav nav-pills  nav-pills-icons  justify-content-center" role="tablist">
                                  <li class="nav-item ">
                                      <a class="nav-link active show" href="#about" data-toggle="tab" role="tab" aria-selected="true">
                                          <i class="material-icons">face</i>
                                          Informacion Básica
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#address" data-toggle="tab" role="tab" aria-selected="false">
                                          <i class="material-icons">person_pin_circle</i>
                                          Ubicación
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#membresia" data-toggle="tab" role="tab" aria-selected="false">
                                          <i class="material-icons">card_membership</i>
                                          Promoción-Membresia
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#formaPago" data-toggle="tab" role="tab" aria-selected="false">
                                          <i class="material-icons">attach_money</i>
                                          Pago
                                      </a>
                                  </li>
                              </ul>
          
                          </div>
                          <div class="card-body">
                              <div class="tab-content">
                                  <div class="tab-pane active" id="about">
                                      <h5 class="info-text"> Acerca del cliente</h5>
                                      <div class="row justify-content-center" id="informacionBasica">
                                          <!-- comienzo de datos personales -->
                                          <!-- imagen -->
                                          <div class="col-sm-4">
                                              <div class="picture-container">
                                                  <div class="picture">
                                                      <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview"
                                                          title="" />
                                                      <input type="file" id="wizard-picture">
                                                  </div>
                                                  <h6 class="description">Seleccione Imagen</h6>
                                              </div>
                                          </div>
                                          <!-- nombre y apellido -->
                                          <div class="col-sm-6">
                                              <div class="input-group form-control-lg ">
          
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="material-icons">face</i>
                                                      </span>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="nombre" class="bmd-label-floating">Nombre</label>
                                                      <input type="text" class="form-control" id="nombre" name="nombre"
                                                          required maxLength="65" >
                                                  </div>
                                              </div>
                                              <div class="input-group form-control-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="material-icons">record_voice_over</i>
                                                      </span>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="apellido" class="bmd-label-floating">Apellido</label>
                                                      <input type="text" class="form-control"  name="apellido"
                                                          required maxLength="65">
                                                  </div>
                                              </div>
                                          </div>
                                          <!-- grupo de dni,tel,email -->
                                          <div class="col-lg-10 mt-3">
                                              <!-- DNI -->
                                              <div class="input-group form-control-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="material-icons">ballot</i>
                                                      </span>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="dni" class="bmd-label-floating">DNI</label>
                                                      <input type="number" class="form-control"  name="dni"
                                                          required min="10000000" max="100000000">
                                                  </div>
                                              </div>
                                              <!-- Telefono -->
                                              <div class="input-group form-control-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="material-icons">call</i>
                                                      </span>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="telefono" class="bmd-label-floating">Teléfono</label>
                                                      <input type="text" class="form-control"  name="telefono"
                                                          required maxLength="255">
                                                  </div>
                                              </div>
          
          
                                              <!-- Email -->
                                              <div class="input-group form-control-lg">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="material-icons">email</i>
                                                      </span>
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="email" class="bmd-label-floating">Email</label>
                                                      <input type="email" class="form-control"  name="email"
                                                          required>
                                                  </div>
                                              </div>
                                          </div>
          
                                      </div>
          
          
                                  </div>
          
                                  <div class="tab-pane" id="membresia">
                                      <h5 class="info-text">¿Qué membresia desea?</h5>
                                      <div class="row justify-content-center" id="seccionMembresias">
                                          {{-- esto sera dimanimo --}}
                                          @foreach ($tipoMembresia as $mem)
          
                                          <div class="col-sm-3">
                                                  <div class="card card-stats">
                                                      <div class="card-header card-header-info card-header-icon" data-seleccion="">
                                                          <div class="card-icon">
                                                              <i class="material-icons">card_membership</i>
                                                          </div>
                                                          <p class="card-category">{{$mem->nombre}} </p>
          
                                                          <h3 class="card-title" value={{$mem->costo}}>${{$mem->costo}}</h3>
                                                      </div>
                                                          <div data-descripcion={{$mem->descripcion}}></div>
                                                      <button class="btn btn-primary btn-round btn-sm"  data-idTipoMembresia={{$mem->id}}>Obtener<div class="ripple-container"></div></button>
                                                  </div>
                                              </div>
                                              {{-- <p>{{$tp['membresia']->tipoPromocion[0]->id}}</p>  --}}
                                             
                                          @endforeach
                                             
                                                  
          
                                      </div>
          
          
                                      <h5 class="info-text"> Promociones validas para la memebresia seleccionada</h5>
                                      <div class="row justify-content-center" id="seccionPromociones">
                                          {{-- esto sera dimanimo --}}
                                          @foreach ($tipoPromocion as $promo)
                                              
                                          
                                              <div class="col-sm-3" >
                                                      <div class="card card-stats" data-idTipoPromocion={{$promo->id}} hidden>
                                                          <div class="card-header  card-header-icon" data-seleccion="" >
                                                              <div class="card-icon">
                                                                  <i class="material-icons">card_giftcard</i>
                                                              </div>
                                                          <p class="card-category">{{$promo->nombre}}</p>
          
                                                              <h3 class="card-title" name="descuento" value={{$promo->descuento}}>-%{{$promo->descuento}}
                                                              </h3>
                                                          </div>
                                                          <button class="btn btn-primary btn-round btn-sm " >Adquirir<div class="ripple-container" ></div></button>
                                                      </div>
                                                  </div>
          
                                          @endforeach
                                      </div>
          
                                      <div class="col-lg-12">
                                          <div class="table-responsive">
                                              <table class="table table-shopping">
                                                  <thead>
                                                      <tr>
                                                          <th class="text-left">Membresia</th>
                                                          <th class="text-center">Precio</th>
                                                          <th class="text-center">Promoción</th>
                                                          <th class="text-center">Subtotal</th>
                                                          <th class="text-center">Cantidad Meses</th>
          
                                                          <th class="text-center">Total</th>
                                                          <th></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody id="totalSeleccionado">
                                                      <tr>
                                                          <td class="td-name text-primary" name="nombre" data-idTipoMembresia="">
                                                              
                                                          </td>
                                                          <td class="text-center" name="costo">
                                                              
                                                          </td>
                                                          <td class="text-center" name="descuento" data-idTipoPromocion="">
                                                              
                                                          </td>
                                                          <td class="text-center" name="subtotal">
                                                              
                                                          </td>
          
                                                          <td class="text-center">
                                                              <input type="number" class="form-control" name="cantidadMeses"
                                                                  required="" min="1" max="24">
                                                          </td>
                                                          <td class="text-center" name="total">
                                                              
                                                          </td>
          
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
          
          
                                  <div class="tab-pane" id="formaPago">
                                      <h5 class="info-text" id="totalFormaPago"> Forma de Pago </h5>
                                      <div class="row justify-content-center" id=seccionPago>
                                          <div class="col-lg-10">
                                              <div class="row">
                                                  <div class="col-sm-4">
                                                      <div class="choice" data-toggle='wizard-checkbox' >
                                                          <input type="checkbox" name="tarjetaCredito" value="">
                                                          <div class="icon">
                                                              <i class="fa fa-credit-card"></i>
                                                          </div>
                                                          <h6>Tarjeta de Credito</h6>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-4">
                                                      <div class="choice" data-toggle="wizard-checkbox">
                                                          <input type="checkbox" name="tarjetaDebito" value="">
                                                          <div class="icon">
                                                              <i class="fa fa-credit-card-alt"></i>
                                                          </div>
                                                          <h6>Tarjeta de Debito</h6>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-4">
                                                      <div class="choice active" data-toggle="wizard-checkbox">
                                                          <input type="checkbox" name="efectivo" value="">
                                                          <div class="icon">
                                                              <i class="fa fa-money"></i>
                                                          </div>
                                                          <h6>Efectivo</h6>
                                                      </div>
                                                      
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
          
                                  <!-- ubicación -->
                                  <div class="tab-pane" id="address">
                                      <div class="row justify-content-center" id="seccionDireccion">
                                          <div class="col-sm-12">
                                              <h5 class="info-text"> ¿Donde vive?</h5>
                                          </div>
          
                                          <div class="col-sm-4">
                                              <select class="custom-select" id="select-pais">
                                                  @foreach ($paises as $pais)
                                                  <option value={{$pais['id']}}>{{$pais['nombre']}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="col-sm-4">
                                              <select class="custom-select" id="select-provincia">
                                                  @foreach ($provincias as $provincia)
                                                  @if ($provincia['id']==22)
                                                  <option selected value={{$provincia['id']}}>{{$provincia['nombre']}}</option>
                                                  @else
                                                  <option value={{$provincia['id']}}>{{$provincia['nombre']}}</option>
                                                  @endif
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="col-sm-4">
                                              <select class="custom-select" id="select-localidad" name="select-localidad">
                                                  @foreach ($localidades as $localidad)
                                                  @if ($localidad['id']==1885)
                                                  <option selected value={{$localidad['id']}}>{{$localidad['nombre']}}</option>
                                                  @else
                                                  <option value={{$localidad['id']}}>{{$localidad['nombre']}}</option>
                                                  @endif
                                                  @endforeach
                                              </select>
                                          </div>
          
                                          <div class="col-sm-12">
                                              <br>
                                          </div>
          
                                          <div class="col-sm-7">
                                              <div class="form-group">
                                                  <label>Calle</label>
                                                  <input type="text" class="form-control" name="calle" maxLength="65" required>
                                              </div>
                                          </div>
          
                                          <div class="col-sm-3">
                                              <div class="form-group">
                                                  <label>Altura</label>
                                                  <input type="number" class="form-control" name="altura" max="100000" min="1">
                                              </div>
                                          </div>
          
                                          <div class="col-sm-5">
                                              <div class="form-group">
                                                  <label>Departamento</label>
                                                  <input type="text" class="form-control" name="departamento" maxLength="15">
                                              </div>
                                          </div>
                                          <div class="col-sm-5">
                                              <div class="form-group">
                                                  <label>Piso</label>
                                                  <input type="text" class="form-control" name="piso" maxLength="15">
                                              </div>
                                          </div>
          
          
                                      </div>
                                  </div>
          
          
                              </div>
          
          
                          </div>
                          <div class="card-footer">
                              <div class="mr-auto">
                                  <input type="button" class="btn  btn-fill btn-default btn-wd" name="Anterior"
                                      value="Anterior" hidden>
                              </div>
                              <div class="ml-auto">
                                  <input type="button"  class="btn btn-fill btn-primary btn-wd" name="Siguiente"
                                      value="Siguiente">
                                  <input type="button" id="postAltaCliente" class="btn btn-fill btn-primary btn-wd" data-dismiss="modal" name="Terminar" value="Terminar"
                                      hidden>
                              </div>
                              <div class="clearfix"></div>
                          </div>
                      </form>
                  </div>
              </div>
                 
              
          </div>
      </div>
  </div>
</div>
</div>

{{-- modal asignar membresia --}}

<div class="modal fade ps-child" id="ModalActualizarMembresia" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            
          <div class="wizard-container">
              <div class="card card-wizard active" data-color="purple" id="wizardProfile" style="margin-top: 0px;margin-bottom: 0px;">
                  <div class="modal-header">
                     
                      <div class="modal-title card-title">
                          <h3 class="card-title">
                              Actualizar Membresia
                          </h3>
                          <h5 class="card-description" id="ModalDescAct">actualizando la membresia de "juansito"</h5>
                      </div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="material-icons">clear</i>
                      </button>
                    </div>
                <div class="modal-body">
                  
                    
                        <form id="formActualizarMembresia" method="" action="">
                          <input type="hidden" data-idUsuario="">
                          <input type="hidden" data-idMembresiaActual="">
                            <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                            
                            <div class="wizard-navigation">
                                <ul class="nav nav-pills  nav-pills-icons justify-content-center" role="tablist">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#ActMembresia" data-toggle="tab" role="tab">
                                            <i class="material-icons">card_membership</i>
                                            Membresia-Promoción
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#ActFormaPago" data-toggle="tab" role="tab">
                                            <i class="material-icons">attach_money</i>
                                            Pago
                                        </a>
                                    </li>
                                </ul>
            
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    
                                    <div class="tab-pane active" id="ActMembresia">
                                        <h5 class="info-text">¿Qué membresia desea?</h5>
                                        <div class="row justify-content-center" id="seccionMembresiasModal">
                                            {{-- esto sera dimanimo --}}
                                            @foreach ($tipoMembresia as $mem)
            
                                            <div class="col-sm-3">
                                                    <div class="card card-stats">
                                                        <div class="card-header card-header-info card-header-icon" data-seleccion="">
                                                            <div class="card-icon">
                                                                <i class="material-icons">card_membership</i>
                                                            </div>
                                                            <p class="card-category">{{$mem->nombre}} </p>
            
                                                            <h3 class="card-title" value={{$mem->costo}}>${{$mem->costo}}</h3>
                                                        </div>
                                                            <div data-descripcion={{$mem->descripcion}}></div>
                                                        <button class="btn btn-primary btn-round btn-sm"  data-idTipoMembresia={{$mem->id}}>Obtener<div class="ripple-container"></div></button>
                                                    </div>
                                                </div>
                                                {{-- <p>{{$tp['membresia']->tipoPromocion[0]->id}}</p>  --}}
                                               
                                            @endforeach
                                               
                                                    
            
                                        </div>
            
            
                                        <h5 class="info-text"> Promociones validas para la memebresia seleccionada</h5>
                                        <div class="row justify-content-center" id="seccionPromocionesModal">
                                            {{-- esto sera dimanimo --}}
                                            @foreach ($tipoPromocion as $promo)
                                                
                                            
                                                <div class="col-sm-3" >
                                                        <div class="card card-stats" data-idTipoPromocion={{$promo->id}} hidden>
                                                            <div class="card-header  card-header-icon" data-seleccion="" >
                                                                <div class="card-icon">
                                                                    <i class="material-icons">card_giftcard</i>
                                                                </div>
                                                            <p class="card-category">{{$promo->nombre}}</p>
            
                                                                <h3 class="card-title" name="descuento" value={{$promo->descuento}}>-%{{$promo->descuento}}
                                                                </h3>
                                                            </div>
                                                            <button class="btn btn-primary btn-round btn-sm " >Adquirir<div class="ripple-container" ></div></button>
                                                        </div>
                                                    </div>
            
                                            @endforeach
                                        </div>
            
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-shopping">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-left">Membresia</th>
                                                            <th class="text-center">Precio</th>
                                                            <th class="text-center">Promoción</th>
                                                            <th class="text-center">Subtotal</th>
                                                            <th class="text-center">Cantidad Meses</th>
            
                                                            <th class="text-center">Total</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="totalSeleccionadoModal">
                                                        <tr>
                                                            <td class="td-name text-primary" name="nombre" data-idTipoMembresia="">
                                                                
                                                            </td>
                                                            <td class="text-center" name="costo">
                                                                
                                                            </td>
                                                            <td class="text-center" name="descuento" data-idTipoPromocion="">
                                                                
                                                            </td>
                                                            <td class="text-center" name="subtotal">
                                                                
                                                            </td>
            
                                                            <td class="text-center">
                                                                <input type="number" class="form-control" name="cantidadMeses"
                                                                    required="" min="1" max="24">
                                                            </td>
                                                            <td class="text-center" name="total">
                                                                
                                                            </td>
            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
            
            
                                    <div class="tab-pane" id="ActFormaPago">
                                        <h5 class="info-text"> Forma de Pago </h5>
                                        <div class="row justify-content-center" id=seccionPagoModal>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle='wizard-checkbox' >
                                                            <input type="checkbox" name="tarjetaCredito" value="">
                                                            <div class="icon">
                                                                <i class="fa fa-credit-card"></i>
                                                            </div>
                                                            <h6>Tarjeta de Credito</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="tarjetaDebito" value="">
                                                            <div class="icon">
                                                                <i class="fa fa-credit-card-alt"></i>
                                                            </div>
                                                            <h6>Tarjeta de Debito</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="efectivo" value="">
                                                            <div class="icon">
                                                                <i class="fa fa-money"></i>
                                                            </div>
                                                            <h6>Efectivo</h6>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                </div>
            
            
                            </div>
                            <div class="card-footer">
                                <div class="mr-auto">
                                    <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous"
                                        value="Previous">
                                </div>
                                <div class="ml-auto">
                                    <input type="button" id="postActualizarMembresia" class="btn btn-next btn-fill btn-rose btn-wd" name="next"
                                        value="Next">
                                    <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finish"
                                        style="display: none;">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                   
                
            </div>
        </div>
    </div>
  </div>
  </div>

<script src="../../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

<script src="assets/js/plugins/bootstrap-notify.js"></script>
<script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>







