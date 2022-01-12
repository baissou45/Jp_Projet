<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>cOgiciel</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    @yield('style')
    
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{route('dashbord')}}">cOgiciel</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <span class="text-white"> {{auth()->user()->name}} </span>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href=" {{ route('profile.show') }} ">Profil</a></li>
                    {{-- <li><a class="dropdown-item" href=" {{ route('logout') }} ">Déconnexion</a></li> --}}
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" style="text-decoration: none; color: red">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                    {{-- Menu clients --}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Client
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('client.add')}}">Nouveau client</a>
                                <a class="nav-link" href="{{route('client.index')}}">Liste des clients</a>
                            </nav>
                        </div>

                        {{-- Menu Commandes --}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#commande" aria-expanded="false" aria-controls="commande">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket "></i></div>
                            Commandes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="commande" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('commande.add')}}">Nouvelle commande</a>
                                <a class="nav-link" href="{{route('commande.index')}}">Liste des commandes</a>
                            </nav>
                        </div>

                        {{-- Menu Pack --}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pack" aria-expanded="false" aria-controls="pack">
                            <div class="sb-nav-link-icon"><i class="fas fa-cubes"></i></div>
                            Packs
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pack" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('pack.add')}}">Nouveau pack</a>
                                <a class="nav-link" href="{{route('pack.index')}}">Liste des packs</a>
                            </nav>
                        </div>

                        {{-- Menu Services --}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#service" aria-expanded="false" aria-controls="service">
                            <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                            Services
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="service" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('service.add')}}">Nouveau service</a>
                                <a class="nav-link" href="{{route('service.index')}}">Liste des services</a>
                            </nav>
                        </div>

                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">



                    @yield("contenu")



                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; cO International</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="{{asset('template/js/scripts.js')}}"></script>

    <script src=" {{asset('template/js/dataTable.js')}} " crossorigin="anonymous"></script>

    {{-- <script src="{{asset('template/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('template/assets/demo/chart-bar-demo.js')}}"></script>
    <script src="{{asset('template/js/datatables-simple-demo.js')}}"></script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    

    {{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script> --}}
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>
    
    
        <script>
        $(document).ready(function() {

            $('#datatablesSimple').DataTable({
                dom: "Blfrtip",
                    buttons: [
                        {
                            text: 'csv',
                            extend: 'csvHtml5',
                            'className': 'btn btn-primary mb-3'
                        },
                        {
                            text: 'excel',
                            extend: 'excelHtml5',
                            'className': 'btn btn-success mb-3'
                        },
                        {
                            text: 'pdf',
                            extend: 'pdfHtml5',
                            'className': 'btn btn-danger mb-3'
                        },
                        {
                            text: 'print',
                            extend: 'print',
                            'className': 'btn btn-info mb-3'
                        },  
                    ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });


            $("ul li ul li").click(function() {
                var i = $(this).index() + 1
                var table = $('#quiztable').DataTable();
                if (i == 1) {
                    table.button('.buttons-csv').trigger();
                } else if (i == 2) {
                    table.button('.buttons-excel').trigger();
                } else if (i == 3) {
                    table.button('.buttons-pdf').trigger();
                } else if (i == 4) {
                    table.button('.buttons-print').trigger();
                } 
            });
            
            
        });
    </script>
    
</body>

</html>
