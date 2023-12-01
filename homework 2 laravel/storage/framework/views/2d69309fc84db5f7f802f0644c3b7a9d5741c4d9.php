

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/script_eventi.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
<h1 >Prossimi Eventi</h1>
<p id="aggiorna"> Clicca per aggiornare</p>
<div id="cont">
    <div id="eventi">

                
    </div> <!-- Contenitore di tutti gli eventi-->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_sito', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework2\resources\views/eventi.blade.php ENDPATH**/ ?>