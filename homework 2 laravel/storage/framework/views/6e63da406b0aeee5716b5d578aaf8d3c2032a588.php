

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/gestore_login.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
<h1>Accedi al portale</h1>

<?php if(isset($errore)): ?>
<p>Credenziali errate!</p>
<?php endif; ?>

<a href="<?php echo e(route('registrazione')); ?>" id="iscrizione">Altrimenti clicca qui per iscriverti!</a>
                
    <div id="form_login">
        <form method='POST' name="login">
            <label>Utente <input type='text' name='utente'></label>
            <label>Password <input type='password' name='password'></label>
            <input name='_token' type='hidden' value="<?php echo e(csrf_token()); ?>">
            <input type='submit' value='Accedi'>
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_iscrizione_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework2\resources\views/login.blade.php ENDPATH**/ ?>