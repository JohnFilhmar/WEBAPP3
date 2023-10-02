<!DOCTYPE html>
<html lang="en">
    <?= view('admin/datatable/header'); ?>
<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">
        <?= view('admin/datatable/sidebar'); ?>
        <div class="content-wrapper" style="min-height: 1172.56px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Administrator</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Welcome Administrator : </li>
                        <li class="breadcrumb-item"><a href="/endsession">Logout</a></li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <?= view('admin/datatable/admintable'); ?>
                    <?= view('admin/datatable/adminform'); ?>
                </div>
            </section>
        </div>
        <?= view('admin/datatable/footer'); ?>
    </div>
</body>
</html>