<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>FoodStuff Store Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="FSS Invoice Preview App" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="~/assets/img/FoodStuffStoreLogoHead.png">

    <!-- Layout config Js -->
    <script src="~/assets/Velzon/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="~/assets/Velzon/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="~/assets/Velzon/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="~/assets/Velzon/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="~/assets/Velzon/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
    <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                     @RenderBody()

                </div><!-- container-fluid -->
            </div><!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © FoodStuff Store.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Jedi Labs
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div><!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="~/assets/Velzon/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="~/assets/Velzon/libs/simplebar/simplebar.min.js"></script>
    <script src="~/assets/Velzon/libs/node-waves/waves.min.js"></script>
    <script src="~/assets/Velzon/libs/feather-icons/feather.min.js"></script>
    <script src="~/assets/Velzon/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="~/assets/Velzon/js/plugins.js"></script>

    <script src="~/assets/Velzon/js/pages/invoicedetails.js"></script>

    <!-- App js -->
    <script src="~/assets/Velzon/js/app.js"></script>


    @await RenderSectionAsync("Scripts", required: false)
</body>
</html>
