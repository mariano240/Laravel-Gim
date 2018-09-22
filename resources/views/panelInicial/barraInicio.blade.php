<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Dashboard PRO by Los Mellis
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="gimnasiocss/gimnasio.css" rel="stylesheet" />
   
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />

</head>

<body class="">
    <div class="wrapper ">

        <!--   div de panel lateral   -->
        <div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/gym4.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

            <div class="sidebar-wrapper">
                <div class="logGim">
                    <div class="card-profile">
                        <div class="card-avatar">
                            <img src="../assets/img/faces/avatar.jpg" />
                        </div>
                        <div class="user-info">
                            <a data-toggle="collapse" href="#collapseExample" class="username">
                                <span>
                                    Nombre Cliente
                                    <b class="caret"></b>
                                </span>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"> MP </span>
                                            <span class="sidebar-normal"> Mi Perfil </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <span class="sidebar-mini"> EP </span>
                                            <span class="sidebar-normal"> Editar Perfil </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/login">
                                            <span class="sidebar-mini"> C </span>
                                            <span class="sidebar-normal"> Cerrar Sesion </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item active ">
                        <a class="nav-link">
                            <i class="material-icons">dashboard</i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">account_circle</i>
                            <p> Gestionar Cliente
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" id="altaCliente">
                                        <span class="sidebar-mini"> AC </span>
                                        <span class="sidebar-normal"> Alta Cliente </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <span class="sidebar-mini"> MC </span>
                                        <span class="sidebar-normal"> Modificar Cliente</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="">
                                        <span class="sidebar-mini"> BC </span>
                                        <span class="sidebar-normal"> Baja Cliente </span>
                                    </a>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                            <i class="material-icons">apps</i>
                            <p> Components
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="componentsExamples">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#componentsCollapse">
                                        <span class="sidebar-mini"> MLT </span>
                                        <span class="sidebar-normal"> Multi Level Collapse
                                            <b class="caret"></b>
                                        </span>
                                    </a>
                                    <div class="collapse" id="componentsCollapse">
                                        <ul class="nav">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#0">
                                                    <span class="sidebar-mini"> E </span>
                                                    <span class="sidebar-normal"> Example </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/components/buttons.html">
                                        <span class="sidebar-mini"> B </span>
                                        <span class="sidebar-normal"> Buttons </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="">
                                        <span class="sidebar-mini"> GS </span>
                                        <span class="sidebar-normal"> Grid System </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/components/panels.html">
                                        <span class="sidebar-mini"> P </span>
                                        <span class="sidebar-normal"> Panels </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/components/sweet-alert.html">
                                        <span class="sidebar-mini"> SA </span>
                                        <span class="sidebar-normal"> Sweet Alert </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/components/notifications.html">
                                        <span class="sidebar-mini"> N </span>
                                        <span class="sidebar-normal"> Notifications </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/components/icons.html">
                                        <span class="sidebar-mini"> I </span>
                                        <span class="sidebar-normal"> Icons </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/components/typography.html">
                                        <span class="sidebar-mini"> T </span>
                                        <span class="sidebar-normal"> Typography </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                            <i class="material-icons">content_paste</i>
                            <p> Forms
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/forms/regular.html">
                                        <span class="sidebar-mini"> RF </span>
                                        <span class="sidebar-normal"> Regular Forms </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/forms/extended.html">
                                        <span class="sidebar-mini"> EF </span>
                                        <span class="sidebar-normal"> Extended Forms </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/forms/validation.html">
                                        <span class="sidebar-mini"> VF </span>
                                        <span class="sidebar-normal"> Validation Forms </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/forms/wizard.html">
                                        <span class="sidebar-mini"> W </span>
                                        <span class="sidebar-normal"> Wizard </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                            <i class="material-icons">grid_on</i>
                            <p> Tables
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="tablesExamples">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/tables/regular.html">
                                        <span class="sidebar-mini"> RT </span>
                                        <span class="sidebar-normal"> Regular Tables </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/tables/extended.html">
                                        <span class="sidebar-mini"> ET </span>
                                        <span class="sidebar-normal"> Extended Tables </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/tables/datatables.net.html">
                                        <span class="sidebar-mini"> DT </span>
                                        <span class="sidebar-normal"> DataTables.net </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
                            <i class="material-icons">place</i>
                            <p> Maps
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="mapsExamples">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/maps/google.html">
                                        <span class="sidebar-mini"> GM </span>
                                        <span class="sidebar-normal"> Google Maps </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/maps/fullscreen.html">
                                        <span class="sidebar-mini"> FSM </span>
                                        <span class="sidebar-normal"> Full Screen Map </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../examples/maps/vector.html">
                                        <span class="sidebar-mini"> VM </span>
                                        <span class="sidebar-normal"> Vector Map </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../examples/widgets.html">
                            <i class="material-icons">widgets</i>
                            <p> Widgets </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../examples/charts.html">
                            <i class="material-icons">timeline</i>
                            <p> Charts </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../examples/calendar.html">
                            <i class="material-icons">date_range</i>
                            <p> Calendar </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>




        <div class="main-panel">

            @yield('navbar')
            <!-- Navbar -->
            @include('secciones.navbar')
            <!-- End Navbar -->
            <div class="content" id="disparador">
                <div class="content">
                    <div class="container-fluid">
                        <!-- comienzo del contenido -->

                        <div id="contenido">

                        </div>
                        @yield('fila1')

                        <!-- fila1 -->

                        <!-- End fila1 -->
                        @yield("fila2")
                        <!-- fila2 -->


                        <!-- End fila2 -->

                        @yield("fila3")
                        <!-- fila3 -->

                        <!-- End fila3 -->

                        @yield("fila4")
                        <!-- fila4 -->

                        <!-- End fila4 -->
                    </div>
                </div>
            </div>
            @yield("footer")
            <!-- footer -->
            @include('secciones.footer')
            <!-- End footer -->
        </div>
    </div>

    @yield("configuracion")
    <!-- configuracion -->

    <!-- End configuracion -->


   <!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>

<!-- Plugin for the Perfect Scrollbar -->
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!-- Plugin for the momentJs  -->
<script src="assets/js/plugins/moment.min.js"></script>

<!--  Plugin for Sweet Alert -->
<script src="assets/js/plugins/sweetalert2.js"></script>

<!-- Forms Validations Plugin -->
<script src="assets/js/plugins/jquery.validate.min.js"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>

<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="assets/js/plugins/bootstrap-selectpicker.js" ></script>

<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>

<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="assets/js/plugins/jquery.datatables.min.js"></script>

<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="assets/js/plugins/bootstrap-tagsinput.js"></script>

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/plugins/jasny-bootstrap.min.js"></script>

<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="assets/js/plugins/fullcalendar.min.js"></script>

<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="assets/js/plugins/jquery-jvectormap.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" ></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Library for adding dinamically elements -->
<script src="assets/js/plugins/arrive.min.js"></script>

<!--  Google Maps Plugin   
<script  src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
 -->

<!-- Chartist JS -->
<script src="assets/js/plugins/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.min.js?v=2.0.2" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            $('#altaCliente').on("click", function (e) {
                $('#contenido').load("altaCliente");
            });
        });

    </script>

</body>

</html>
