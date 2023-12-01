

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/script_aziende.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
<div id="corpo">
    <nav>
        <h1>Marchi</h1>
        <input type='text'>
    </nav>
    <p>Troverai i preferiti nella sezione personale</p>
    <p>Clicca sull'immagine di una azienda per un'analisi delle sue vendite</p>
    <div id="contenitore">

    </div> <!-- Contenitore di tutti i marchi-->
                   
</div>

<div id="reports" class="nascondi">
    <div id="titolo">

    </div>
    <div id="analisi">

    </div> <!-- Contenitore dell'azienda da analizzare -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_sito', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework2\resources\views/aziende.blade.php ENDPATH**/ ?>