

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/script_preferiti.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/script_prenotazioni.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
<div id="corpo">
    <div class="nascondi" id="box_pref">
        <h1>I tuoi preferiti</h1>
        <div id="preferiti">

        </div> <!-- Contenitore di tutti i preferiti-->
    </div>   
                    
    <div id="box_eventi">
        <h1>I tuoi eventi</h1>
        <div id="prenotazioni">
        
        </div> <!-- Contenitore di tutti i preferiti-->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_sito', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework2\resources\views/personale.blade.php ENDPATH**/ ?>