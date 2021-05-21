<?php 
        session_start();
        if(isset($_SESSION['access']) && $_SESSION['access'] == 3){

        }else{
            // header("location: ../login/login.html");
        }
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- MDBootstrap Datatables  -->
    <link href="../../mdb/css/addons/datatables.min.css" rel="stylesheet">

    <style>
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
        }
    </style>
</head>
<body>
    <!--Main Header-->
    <?php include 'header.php'; ?>

    <div class="container mt-4">
        <div class="card">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                View Assigned Subjects 
                <a type="button" href="../school_year/sy_home.php" class="btn-floating blue">
                    <i class="far fa-hand-point-left" aria-hidden="true"></i>
                </a>
            </h3>
            <div class="card-body">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                    <table id="view_assigned" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Section Name</th>
                                <th class="th-sm">Grade Year</th>
                                <th class="th-sm">Subject Name</th>
                                <th class="th-sm">Assigned Teacher</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dalton</td>
                                <td>11</td>
                                <td>Immersion</td>
                                <td>Mendez, Dana Too</td>
                            </tr>
                            <tr>
                                <td>Winters</td>
                                <td>12</td>
                                <td>Algebra</td>
                                <td>Halton, Clary Go</td>
                            </tr>
                            <tr>
                                <td>Nikola</td>
                                <td>12</td>
                                <td>Analytical Thinking</td>
                                <td>Dixon, Cherry Mil</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="../../mdb/js/addons/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#view_assigned').DataTable();
            $('.dataTables_length').addClass('bs-select');
            $('#view_assigned_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#view_assigned_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search..");
                $this.removeClass('form-control-sm');
            });
            $('#view_assigned_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#view_assigned_wrapper .dataTables_filter').addClass('md-form mt-3');
            $('#view_assigned_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            $('#view_assigned_wrapper select').addClass('mdb-select colorful-select dropdown-primary');
            $('#view_assigned_wrapper .mdb-select').materialSelect();
            $('#view_assigned_wrapper .dataTables_filter').find('label').remove();
        });
    </script>
</body>
</html>