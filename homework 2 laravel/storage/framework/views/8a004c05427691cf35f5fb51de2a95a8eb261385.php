<!DOCTYPE html>
    <html>
        <head>
         <title>Moda & Co</title>
         <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>" />
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <?php echo $__env->yieldContent('script'); ?>
         
        </head>
        <body>
            <header> 
                <div id="overlay">
                    <nav> 
                     <div id="logo">
                        Moda & Co
                     </div>
                     <div id="links">
                         <a href="<?php echo e(route('profilo')); ?>"><?php echo e($utente->nome); ?></a>
                         <a href="<?php echo e(route('home')); ?>">Home</a>
                         <a href="<?php echo e(route('aziende')); ?>">Aziende</a>
                         <a href="<?php echo e(route('eventi')); ?>">Eventi</a>
                         <a href="<?php echo e(route('modelli')); ?>">Modelli</a>
                         <a href="<?php echo e(route('logout')); ?>">Logout</a>
                        </div>
                        <div id="menu">
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                    </nav>  <!-- Barra di navigazione -->  
                </div>
            </header><!-- Intestazione-->
            <section> 
            <?php echo $__env->yieldContent('section'); ?>
            </section> <!-- Sezione principale-->
            <footer> 
                <p> Progetto per il secondo homework </p>
                <p> Claudio Musmeci O46002056</p>
            </footer> <!-- Footer-->
        </body>
    </html><?php /**PATH C:\xampp\htdocs\homework2\resources\views/template_sito.blade.php ENDPATH**/ ?>