<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script type="module" src="{{ asset('js/agenda.js') }}"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        var baseURL={!!json_encode(url('/')) !!}
    </script>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="sb-nav-fixed ">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">Centro de computo </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            </button>


    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link" href="{{ route('inicio') }}">
                            <div class="sb-nav-link-icon"><i></i></div>
                            Inicio
                        </a>
                        <div class="sb-sidenav-menu-heading">Sala de cómputo</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Salas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('asistencia.index') }}">Asistencia</a>
                                <a class="nav-link" href="{{ route('agenda') }}">Agenda</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Equipos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('equipos') }}">Equipos de computo</a>
                                <a class="nav-link" href="{{ route('mantenimiento') }}">Mantenimiento</a>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small"></div>
                </div>
            </nav>
        </div>


        <br>
        <div id="layoutSidenav_content">
            <div>
                <header class="py-12 ">
                    <div class="jumbotron text-center p-3 text-white mt-auto" style="margin-bottom:3%">

                        <img src="{{ URL::asset('img/7.png') }}" width="30%" height="30%">

                        <img src="{{ URL::asset('img/6.png') }}" width="15%" height="15%">
                        <H1>AGENDA</H1>
                    </div>

            </div>


            <main>
                <div id="agenda" class="col-12 p-3  tex-center"></div>
                <div class="row">
                    <div>

                        <!-- Modal -->
                        <div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del evento</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form>

                                            {!! csrf_field() !!}

                                            <div class="form-group d-none" >
                                                <label for="id">id:</label>
                                                <input type="text" class="form-control" name="id"
                                                    id="id" aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted">Help
                                                    text</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Titulo</label>
                                                <input type="text" class="form-control" name="title"
                                                    id="title" aria-describedby="helpId"
                                                    placeholder="Escribe el titulo del evento">
                                                <small id="helpId" class="form-text text-muted">Help
                                                    text</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="descripcion">Descripcion del evento</label>
                                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                                            </div>
                                            <div class="form-group d-none">
                                                <label for="start">start</label>
                                                <input type="date" class="form-control" name="start"
                                                    id="start" aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted">Help
                                                    text</small>
                                            </div>
                                            <div class="form-group d-none">
                                                <label for="end">end</label>
                                                <input type="date" class="form-control" name="end"
                                                    id="end" aria-describedby="helpId" placeholder="">
                                                <small id="helpId" class="form-text text-muted">Help
                                                    text</small>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">

                                        <a type="button" class="btn btn-success" id="btnGuardar">Guardar</a>
                                        <button type="button" class="btn btn-warning"
                                            id="btnModificar">Modificar</button>
                                        <button type="button" class="btn btn-danger"
                                            id="btnEliminar">Eliminar</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
</body>

<br>
<footer class="fooder py-4 mt-auto ">
    <div class="container-fluid px-4 ">
        <img src="{{ URL::asset('img/4.jpg') }}" width="5%" height="5%">
        <img src="{{ URL::asset('img/3.png') }}" width="5%" height="5%">
        <p>© Copyright 2023 TecNM / Campus ITChiná - Todos los Derechos Reservados</p>
    </div>
</footer>
</div>
</div>

</html>
