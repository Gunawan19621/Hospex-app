<?php $__env->startSection('content'); ?>
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: <?php echo e(url('assets11/app/media/img//bg/bg-3.jpg')); ?>;" style="text-align: center;">

        <h3 style="text-align: center;" class="m-login__title">Activation</h3><br>
        <h5 style="text-align: center;"><?php echo e($message); ?></h5>
		<br>
        <h4 style="text-align: center;">Download Aplikasi Hospex di:<br>
        	<a style="text-align:center;" href='https://play.google.com/store/apps/details?id=id.indigital.hospex&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img alt='Get it on Google Play' src='https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png'/></a>
        </h4>
    	
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex-server/resources/views/auth/activation/index.blade.php ENDPATH**/ ?>