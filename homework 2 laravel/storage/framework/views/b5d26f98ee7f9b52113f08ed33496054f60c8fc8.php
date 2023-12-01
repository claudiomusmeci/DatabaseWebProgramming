

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/script_notizie.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
<h1>Entra nel mondo della moda</h1>
<p> Da oggi è molto più semplice!</p>
<div id="sez">
    <div class="slot" id="slot1">
        <img src="<?php echo e(asset('/css/immagini/negozio.jpg')); ?>"/>
        <h1>MARCHI</h1>
        <p>Scopri nuovi marchi</p>
    </div>
    <div class="slot" id="slot2">
        <img src="<?php echo e(asset('/css/immagini/sfilata.jpg')); ?>"/>
        <h1>SFILATE</h1>
        <p>Partecipa a sfilate</p>
    </div> 
    <div class="slot" id="slot3">
        <img src="<?php echo e(asset('/css/immagini/modelli2.jpg')); ?>"/>
        <h1>MODELLI</h1>
        <p>Trova dei modelli</p>
    </div>
</div>
<h1>Ultime notizie sul mondo della moda</h1>
<div id="contenitore">

</div> <!-- Contenitore di tutte le notizie-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_sito', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework2\resources\views/home.blade.php ENDPATH**/ ?>