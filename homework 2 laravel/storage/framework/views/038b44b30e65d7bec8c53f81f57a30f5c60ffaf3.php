

<?php $__env->startSection('form'); ?>
<h1>Entra nel mondo della moda</h1>
<p> Da oggi è molto più semplice!</p>
<a href="<?php echo e(route('login')); ?>"> Clicca qui per effettuare l'accesso</a>
<p> o</p>
<a href="<?php echo e(route('registrazione')); ?>"> Clicca qui per effettuare l'iscrizione</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_iscrizione_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework2\resources\views/benvenuto.blade.php ENDPATH**/ ?>