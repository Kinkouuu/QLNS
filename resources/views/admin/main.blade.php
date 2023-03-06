
<!DOCTYPE html>
<html lang="en">
@include('admin.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<!-- Navbar -->
@include('admin.nav')
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('admin.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid text-center">
        <h1>{{$title}} </h1>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('admin.alert')
            </div>
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
</div>
<!-- /.content-wrapper -->
@include('admin/footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('admin/end')
<!-- Page specific script -->
