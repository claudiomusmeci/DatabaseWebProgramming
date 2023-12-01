

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/script_modelli.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
<h1>Aggiungi un modello al database</h1>
                <p>Il campo 'Azienda' può essere omesso nel caso di modello che non collabora con aziende</p>
                <div class="form_modello">
                    <form method='POST' name="aggiungi_modello">
                        <label>Codice <input type='text' name='codice'></label>
                        <label>Data di nascita <input type='date' name='data'></label>
                        <label>Nome e Cognome <input type='text' name='nome'></label>
                        <label class="radio">
                            <input type='radio' name='genere' value='Maschio'>Uomo
                            <input type='radio' name='genere' value='Femmina'>Donna
                        </label>
                        <label>Nazione <input type='text' name='nazione'></label>
                        <label>Azienda <input type='text' name='azienda'></label>
                        <label>Ingaggio <input type='number' name='ingaggio'></label>
                        <input name='_token' type='hidden' value='<?php echo e($csrf_token); ?>'>
                        <input type='submit' value='Aggiungi'>
                    </form>
                </div>
                <h1>Cerca un modello</h1>
                <p>Il campo 'Nazione' può essere omesso</p>
                <div class="form_modello">
                    <form action="" method='POST' name="cerca_modello">
                        <label class="radio">
                            <input type='radio' name='genere' value='Maschio'>Uomo
                            <input type='radio' name='genere' value='Femmina'>Donna
                        </label>
                        <label>Nazione <input type='text' name='nazione'></label>
                        <label class="radio"> Manager
                            <input type='radio' name='manager' value='si'>Si
                            <input type='radio' name='manager' value='no'>No
                        </label>
                        <input name='_token' type='hidden' value='<?php echo e($csrf_token); ?>'>
                        <input type='submit' value='Cerca'>
                    </form>
                </div>

                <div id="contenitore">

                </div> <!-- Contenitore di tutti i modelli-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template_sito', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework2\resources\views/modelli.blade.php ENDPATH**/ ?>