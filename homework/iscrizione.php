<?php
    //Verifico l'esistenza di dati GET
    if(isset($_GET["utente"]) && isset($_GET["password"])){
        $error=0;
        //Mi connetto al database
        $conn=mysqli_connect("localhost", "root", "","esame_progetto") or die("Errore: "+ mysqli_connect_error());
        $password_utente=$_GET["password"];
        //Verifico che la password sia compresa tra 5 e 20 caratteri e che contenga un carattere maiuscolo
        if(strlen($password_utente)<5||strlen($password_utente)>20){
            $errore_lunghezza_pass="La password deve essere compresa tra 5 e 20 caratteri";
            $error++;
        }
        if(!(preg_match("^[A-Z]^",$password_utente))){
            $errore_maiuscolo_pass="La password deve contenere una lettera maiuscola";
            $error++;
        }
        //Effettuo l'escape dell'input
        $username = mysqli_real_escape_string($conn, $_GET["utente"]);
        $password_criptata = password_hash($password_utente, PASSWORD_BCRYPT);
        //$password = mysqli_real_escape_string($conn, $_GET["password"]);
        //Preparo la query di inserimento
        $query= "INSERT INTO utente values('".$username."','".$password_utente."', '".$password_criptata."')";
        //Preparo la query di verifica per vedere se l'username è già utilizzato
        $query_utente="SELECT * FROM utente WHERE username ='".$username."'";
        //Eseguo la query di verifica
        $res=mysqli_query($conn, $query_utente);
        if(mysqli_num_rows($res)>0){
            $errore_username="Username già presente";
            $error++;
        }
        if($error==0){
            //Eseguo la query di inserimento
            $res=mysqli_query($conn, $query);
            //Rimando al login
            header("Location: login.php");
            exit;
        }
        
    }

?>
<!DOCTYPE html>
    <html>
        <head>
         <title>Moda & Co</title>
         <link rel="stylesheet" href="style.css" />
         <script src="/homework/script/gestore_iscrizioni.js" defer></script>
         <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
        <body>
            <header> 
                <div id="overlay">
                    <nav> 
                     <div id="logo">
                        Moda & Co
                     </div>
                    </nav>  <!-- Barra di navigazione -->  
                </div>
            </header><!-- Intestazione-->
            <section> 
                <h1>Iscriviti per accedere al portale</h1>
                <a href="login.php" id="iscrizione">Altrimenti clicca qui per accedere!</a>
                <?php
                    if(isset($errore_username)){
                        echo "<p>";
                        echo $errore_username;
                        echo "</p>";
                    }
                    if(isset($errore_lunghezza_pass)){
                        echo "<p>";
                        echo $errore_lunghezza_pass;
                        echo "</p>";
                    }
                    if(isset($errore_maiuscolo_pass)){
                        echo "<p>";
                        echo $errore_maiuscolo_pass;
                        echo "</p>";
                    }
                ?>
                <div id="form_iscrizione">
                    <form method='GET' name="iscrizione">
                        <label>Inserisci il tuo nome utente <input type='text' name='utente'></label>
                        <label>Inserisci la tua password <input type='password' name='password'></label>
                        <input type='submit' value='Iscriviti'>
                    </form>
                </div>
            </section> <!-- Sezione principale-->
            <footer> 
                <p> Progetto per il primo homework</p>
                <p> Claudio Musmeci O46002056</p>
            </footer> <!-- Footer-->
        </body>
    </html>