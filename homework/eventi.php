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
         <script src="/homework/script/script_eventi.js" defer></script>
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
                         <a href="aziende.php">Aziende</a>
                         <a>Eventi</a>
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
                <h1 id="desc">Prossimi Eventi</h1>
                <p id="aggiorna"> Clicca per aggiornare</p>
                <div id="cont">
                    <div id="eventi">

                
                    </div> <!-- Contenitore di tutti gli eventi-->
                </div>
            </section> <!-- Sezione principale-->
            <footer> 
                <p> Progetto per il primo homework </p>
                <p> Claudio Musmeci O46002056</p>
            </footer> <!-- Footer-->
        </body>
    </html>