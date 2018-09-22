<div class="col-md-8 col-12 mr-auto ml-auto">
    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card card-wizard active" data-color="rose" id="wizardProfile">
            <form action="" method="">
                <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                <div class="card-header text-center">
                    <h3 class="card-title">
                        Alta Cliente
                    </h3>
                    <h5 class="card-description">Se creará el cliente y su membresia</h5>
                </div>
                <div class="wizard-navigation">
                    <ul class="nav nav-pills  nav-pills-icons nav-gim justify-content-center"  role="tablist" >
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
                            <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                    <i class="material-icons">card_membership</i>
                                    Promoción-Membresia
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                                    <i class="material-icons">attach_money</i>
                                    Pago
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="about">
                            <h5 class="info-text"> Let's start with the basic information (with validation)</h5>
                            <div class="row justify-content-center">
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
                                            <input type="text" class="form-control" id="exampleInput1" name="apellido"
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
                                            <input type="email" class="form-control" id="exampleemalil" name="dni"
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
                                            <input type="email" class="form-control" id="exampleemalil" name="telefono"
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


                        <div class="tab-pane" id="account">
                            <h5 class="info-text"> What are you doing? (checkboxes) </h5>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="jobb" value="Design">
                                                <div class="icon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <h6>Design</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="jobb" value="Code">
                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>
                                                <h6>Code</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="jobb" value="Develop">
                                                <div class="icon">
                                                    <i class="fa fa-laptop"></i>
                                                </div>
                                                <h6>Develop</h6>
                                            </div>
                                            <select class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select"
                                                data-size="7">
                                                <option disabled selected>Choose city</option>
                                                <option value="2">Foobar</option>
                                                <option value="3">Is great</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ubicación -->
                        <div class="tab-pane" id="address">
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <h5 class="info-text"> ¿Donde vive?</h5>
                                </div>

                                <div class="col-sm-4">
                                        <select class="custom-select">
                                                <option selected>Sleccione País</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                              </select>
                                    </div>
                                 <div class="col-sm-4">
                                        <select class="custom-select">
                                                <option selected>Seleccione Provincia</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                              </select>
                                     </div>
                                 <div class="col-sm-4">
                                        <select class="custom-select">
                                                <option selected>Sleccione Localidad</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                              </select>
                                        </div>

                                   <div class="col-sm-12">
                                    <br>   
                                    </div>     

                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label>Calle</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Altura</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Departamento</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Piso</label>
                                            <input type="text" class="form-control">
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
                        <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Next">
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
