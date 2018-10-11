<div class="col-md-10 col-12 mr-auto ml-auto">
    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card card-wizard active" data-color="purple" id="wizardProfile">
            <form id="formAltaUsuario" method="" action="">

                <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                <div class="card-header text-center">
                    <h3 class="card-title">
                        Alta Cliente
                    </h3>
                    <h5 class="card-description">Se creará el cliente y su membresia</h5>
                </div>
                <div class="wizard-navigation">
                    <ul class="nav nav-pills  nav-pills-icons nav-gim justify-content-center" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                <i class="material-icons">face</i>
                                Informacion Básica
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                                <i class="material-icons">person_pin_circle</i>
                                Ubicación
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#membresia" data-toggle="tab" role="tab">
                                <i class="material-icons">card_membership</i>
                                Promoción-Membresia
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#formaPago" data-toggle="tab" role="tab">
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
                                    <div class="input-group form-control-lg">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInput1" class="bmd-label-floating">Nombre</label>
                                            <input type="text" class="form-control" id="exampleInput1" name="nombre"
                                                required>
                                        </div>
                                    </div>
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">record_voice_over</i>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInput11" class="bmd-label-floating">Apellido</label>
                                            <input type="text" class="form-control" id="exampleInput11" name="apellido"
                                                required>
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
                                            <label for="exampleInput1" class="bmd-label-floating">DNI</label>
                                            <input type="number" class="form-control" id="exampleemalil" name="dni"
                                                required>
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
                                            <label for="exampleInput1" class="bmd-label-floating">Teléfono</label>
                                            <input type="text" class="form-control" id="exampleemalil" name="telefono"
                                                required>
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
                                            <label for="exampleInput1" class="bmd-label-floating">Email (required)</label>
                                            <input type="email" class="form-control" id="exampleemalil" name="email"
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
                            <h5 class="info-text"> Forma de Pago </h5>
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
                                        <input type="text" class="form-control" name="calle">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Altura</label>
                                        <input type="number" class="form-control" name="altura">
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Departamento</label>
                                        <input type="text" class="form-control" name="departamento">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Piso</label>
                                        <input type="text" class="form-control" name="piso">
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
                        <input type="button" id="postAltaCliente" class="btn btn-next btn-fill btn-rose btn-wd" name="next"
                            value="Next">
                        <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finish"
                            style="display: none;">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- wizard container -->
</div>

