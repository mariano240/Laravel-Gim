<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="/assets/css/material-dashboard.css" rel="stylesheet" />
</head>
<body>
        <div class="wrapper wrapper-full-page">
                <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('../../assets/img/gym7.jpg'); ">
                  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                  <div class="container">
                    <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
                    <form class="form" method="POST" action="{{route('login')}}">
                      {{ csrf_field() }}
                        <div class="card card-login">
                          <div class="card-header card-header-rose text-center">
                            <h4 class="card-title">Login</h4>
                            <div class="social-line">
                              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-facebook-square"></i>
                              </a>
                              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-twitter"></i>
                              </a>
                              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                                <i class="fa fa-google-plus"></i>
                              </a>
                            </div>
                          </div>
                          <div class="card-body ">
                            <p class="card-description text-center">Información de Usuario</p>
                            <span class="bmd-form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="material-icons">ballot</i>
                                  </span>
                                </div>
                                <input type="text" class="form-control" placeholder="DNI..." name="nombre_usuario">
                                {!! $errors->first('nombre_usuario','<span class="help-block">:message</span>')!!}
                              </div>
                            </span>
                            <span class="bmd-form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="material-icons">lock_outline</i>
                                  </span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password..." name="password">
                              </div>
                            </span>
                          </div>
                          <div class="card-footer justify-content-center">
                            <button class="btn btn-rose btn-link btn-lg">INGRESAR</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <footer class="footer">
                    <div class="container">
                      <nav class="float-left">
                        <ul>
                          <li>
                            <a href="https://www.creative-tim.com">
                              Creative Tim
                            </a>
                          </li>
                          <li>
                            <a href="https://creative-tim.com/presentation">
                              About Us
                            </a>
                          </li>
                          <li>
                            <a href="http://blog.creative-tim.com">
                              Blog
                            </a>
                          </li>
                          <li>
                            <a href="https://www.creative-tim.com/license">
                              Licenses
                            </a>
                          </li>
                        </ul>
                      </nav>
                      <div class="copyright float-right">
                        &copy;
                        <script>
                          document.write(new Date().getFullYear())
                        </script>, made with <i class="material-icons">favorite</i> by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                      </div>
                    </div>
                  </footer>
                </div>

                <script src="../../assets/js/core/jquery.min.js" type="text/javascript"></script>
                <script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
                <script src="../../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
                <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
                <!-- Plugin for the momentJs  -->
                <script src="../../assets/js/plugins/moment.min.js"></script>
                <!--  Plugin for Sweet Alert -->
                <script src="../../assets/js/plugins/sweetalert2.js"></script>
                <!-- Forms Validations Plugin -->
                <script src="../../assets/js/plugins/jquery.validate.min.js"></script>
                <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
                <script src="../../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
                <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
                <script src="../../assets/js/plugins/bootstrap-selectpicker.js"></script>
                <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
                <script src="../../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
                <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
                <script src="../../assets/js/plugins/jquery.dataTables.min.js"></script>
                <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
                <script src="../../assets/js/plugins/bootstrap-tagsinput.js"></script>
                <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
                <script src="../../assets/js/plugins/jasny-bootstrap.min.js"></script>
                <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
                <script src="../../assets/js/plugins/fullcalendar.min.js"></script>
                <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
                <script src="../../assets/js/plugins/jquery-jvectormap.js"></script>
                <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
                <script src="../../assets/js/plugins/nouislider.min.js"></script>
                <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
                <!-- Library for adding dinamically elements -->
                <script src="../../assets/js/plugins/arrive.min.js"></script>
                <!--  Google Maps Plugin    
                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

                -->
                <!-- Chartist JS -->
                <script src="../../assets/js/plugins/chartist.min.js"></script>
                <!--  Notifications Plugin    -->
                <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
                <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
                <script src="../../assets/js/material-dashboard.min.js?v=2.0.2" type="text/javascript"></script>
</body>
</html>