<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    

    <!--begin::Global Theme Styles -->
    <link href="<?php echo e(url('assets11/vendors/base/vendors.bundle.css')); ?>" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="../../../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="<?php echo e(url('assets11/demo/demo11/base/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="<?php echo e(url('assets11/demo/demo11/media/img/logo/favicon.ico')); ?>" />
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
        });
    </script>

    <!--end::Web font -->
    <!-- Styles -->
    
</head>
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" style= "background-color: white;">
    <div id="app">
        

        <main class="m-content">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
<!--begin::Global Theme Bundle -->
<script src="<?php echo e(url('assets11/vendors/base/vendors.bundle.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('assets11/demo/demo11/base/scripts.bundle.js')); ?>" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts -->
<script src="<?php echo e(url('assets11/snippets/custom/pages/user/login.js')); ?>" type="text/javascript"></script>
<?php echo $__env->make('script-global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--end::Page Scripts -->
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/layouts/app.blade.php ENDPATH**/ ?>