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
         <script src="/homework/script/script_notizie.js" defer></script>
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
                         <a>Home</a>
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
                <h1>Entra nel mondo della moda</h1>
                <p> Da oggi è molto più semplice!</p>
                <div id="sez">
                    <div class="slot" id="slot1">
                        <img src="./immagini/negozio.jpg"/>
                        <h1>MARCHI</h1>
                        <p>
                            Scopri nuovi marchi
                        </p>
                    </div>
                    <div class="slot" id="slot2">
                        <img src="./immagini/sfilata.jpg"/>
                        <h1>SFILATE</h1>
                        <p>
                            Partecipa a sfilate
                        </p>
                    </div> 
                    <div class="slot" id="slot3">
                      <img src="./immagini/modelli2.jpg"/>
                        <h1>MODELLI</h1>
                        <p>
                            Trova dei modelli
                        </p>
                    </div>
                </div>
                <h1>Ultime notizie sul mondo della moda</h1>
                <div id="contenitore">

                </div> <!-- Contenitore di tutte le notizie-->
            </section> <!-- Sezione principale-->
            <footer> 
                <p> Progetto per il primo homework </p>
                <p> Claudio Musmeci O46002056</p>
            </footer> <!-- Footer-->
        </body>
    </html>