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
         <script src="/homework/script/script_prenotazioni.js" defer></script>
         <script src="/homework/script/script_preferiti.js" defer></script>
        </head>
        <body>
            <header> 
                <div id="overlay">
                    <nav> 
                     <div id="logo">
                        Moda & Co
                     </div>
                     <div id="links">
                         <a><?php echo $_SESSION["utente"];?></a>
                         <a href="home.php">Home</a>
                         <a href="aziende.php">Aziende</a>
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
            </section> <!-- Sezione principale-->
            <footer> 
                <p> Progetto per il primo homework </p>
                <p> Claudio Musmeci O46002056</p>
            </footer> <!-- Footer-->
        </body>
    </html>