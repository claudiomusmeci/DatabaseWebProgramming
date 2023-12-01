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
         <script src="/homework/script/script_modelli.js" defer></script>
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
                         <a href="eventi.php">Eventi</a>
                         <a>Modelli</a>
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
                <h1>Aggiungi un modello al database</h1>
                <p>Il campo 'Azienda' può essere omesso nel caso di modello che non collabora con aziende</p>
                <div class="form_modello">
                    <form method='GET' name="aggiungi_modello">
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
                        <input type='submit' value='Cerca'>
                    </form>
                </div>

                <div id="contenitore">

                </div> <!-- Contenitore di tutti i modelli-->
            </section> <!-- Sezione principale-->
            <footer> 
                <p> Progetto per il primo homework </p>
                <p> Claudio Musmeci O46002056</p>
            </footer> <!-- Footer-->
        </body>
    </html>