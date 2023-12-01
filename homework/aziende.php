<?php
    //Avvio la sessione
    session_start();
    //Verifico se l'accesso è stato effettuato
    if(!isset($_SESSION["utente"])){
        header("Location: login.php");
        exit;
    }  

?>
<!DOCTYPE html>
    <html>
        <head>
         <title>Moda & Co</title>
         <link rel="stylesheet" href="style.css" />
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <script src="/homework/script/script_aziende.js" defer></script>
        </head>
        <body>
            <header> 
                <div id="overlay">
                    <nav> 
                     <div id="logo">
                        Moda & Co
                     </div>
                     <div id="links">
                         <a href="personale.php"><?php echo $_SESSION["utente"];?></a>
                         <a href="home.php">Home</a>
                         <a>Aziende</a>
                         <a href="eventi.php">Eventi</a>
                         <a href="modelli.php">Modelli</a>
                         <a href="logout.php">Logout</a>
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
                <div id="corpo">
                    <nav>
                        <h1> 
                            Marchi
                        </h1>
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
                

            </section> <!-- Sezione principale-->
            <footer> 
                <p> Progetto per il primo homework </p>
                <p> Claudio Musmeci O46002056</p>
            </footer> <!-- Footer-->
        </body>
    </html>