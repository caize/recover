<?php $__env->startSection('content'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('my-js'); ?>
<script>
	$(document).ready(function() {
		App.init();
		DashboardV2.init();
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>