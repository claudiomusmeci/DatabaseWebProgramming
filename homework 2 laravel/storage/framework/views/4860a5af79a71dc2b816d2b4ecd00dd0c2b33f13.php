

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/gestore_iscrizioni.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>

<?php if(isset($array)): ?>
    <?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo e($errore); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

    <h1>Iscriviti al portale</h1>
    <a href="<?php echo e(route('login')); ?>" id="iscrizione">Altrimenti clicca qui per accedere!</a>
    <div id="form_iscrizione">
        <form method='POST' name="iscrizione">
            <label>Utente <input type='text' name='utente'></label>
            <label>Password <input type='password' name='password'></label>
            <input name='_token' type='hidden' value="<?php echo e(csrf_token()); ?>">
            <input type='submit' value='Accedi'>
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_iscrizione_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework2\resources\views/registrazione.blade.php ENDPATH**/ ?>