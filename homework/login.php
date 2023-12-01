<!DOCTYPE html>
    <?php
        //Avvio la sessione
        session_start();
        //Verifico se l'accesso è stato effettuato
        if(isset($_SESSION["utente"])){
            header("Location: home.php");
            exit;
        }
        //Verifico l'esistenza di dati POST
        if(isset($_POST["utente"]) && isset($_POST["password"])){
            //Mi connetto al database
            $conn=mysqli_connect("localhost", "root", "","esame_progetto") or die("Errore: "+ mysqli_connect_error());
            $password_utente=$_POST["password"];
            //Verifico che la password sia compresa tra 5 e 20 caratteri e che contenga un carattere maiuscolo
            if(strlen($password_utente)<5||strlen($password_utente)>20){
                $errore_lunghezza_pass="La password deve essere compresa tra 5 e 20 caratteri";
            }

            if(!(preg_match("^[A-Z]^",$password_utente))){
                $errore_maiuscolo_pass="La password deve contenere una lettera maiuscola";
            }
            
            //Effettuo l'escape dell'input
            $username = mysqli_real_escape_string($conn, $_POST["utente"]);
            //Preparo la query   
            $query= "SELECT * FROM utente WHERE username ='".$username."'";
            //Eseguo la query
            $res=mysqli_query($conn, $query);
            //Verifico la correttezza dei risultati e la riuscita della query
            if(mysqli_num_rows($res)>0){
                $db = mysqli_fetch_assoc($res);
                if (password_verify($_POST['password'], $db['password'])){
                    // Imposto una sessione per l'utente
                    $_SESSION["utente"] = $_POST['utente'];
                    header('Location: home.php');
                    mysqli_free_result($res);
                    mysqli_close($conn);
                    exit;
                }
            }
        
            else{
                //Setto l'errore
                $errore_credenziali="Credenziali errate";
            }   
        }
    ?>

    <html>
        <head>
         <title>Moda & Co</title>
         <link rel="stylesheet" href="style.css" />
         <script src="/homework/script/gestore_login.js" defer></script>
         <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
        <body>
            <header> 
                <div id="overlay">
                    <nav> 
                     <div id="logo">
                        Moda & Co
                     </div>
                     
                        <div id="menu">
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                    </nav>  
                </div>
            </header>
            <section> 
                <h1>Accedi al portale</h1>
                <a href="iscrizione.php" id="iscrizione">Altrimenti clicca qui per iscriverti!</a>
                <?php
                    if(isset($errore_credenziali)){
                        echo "<p class='errore'>";
                        echo $errore_credenziali;
                        echo "</p>";
                    }
                    if(isset($errore_lunghezza_pass)){
                        echo "<p class='errore'>";
                        echo $errore_lunghezza_pass;
                        echo "</p>";
                    }
                    if(isset($errore_maiuscolo_pass)){
                        echo "<p class='errore'>";
                        echo $errore_maiuscolo_pass;
                        echo "</p>";
                    }
                ?>
                <div id="form_login">
                    <form method='POST' name="login">
                        <label>Utente <input type='text' name='utente' value='Username'></label>
                        <label>Password <input type='password' name='password' value='Password'></label>
                        <input type='submit' value='Accedi'>
                    </form>
                </div>
                
                </div>
            </section> <!-- Sezione principale-->
            <footer> 
                <p> Progetto per il primo homework</p>
                <p> Claudio Musmeci O46002056</p>
            </footer> <!-- Footer-->
        </body>
    </html>