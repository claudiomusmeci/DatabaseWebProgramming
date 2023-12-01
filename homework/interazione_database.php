<?php
    session_start();
    $operazione=$_GET["operazione"];
    switch($operazione){
        case 'inserisci': inserisci(); break; //Inserisce a seconda del tipo di dato un'azienda o un evento ai preferiti
        case 'elimina': elimina(); break; //Rimuove a seconda del tipo di dato un'azienda o un evento dai preferiti
        case 'ritorna': ritorna(); break; //Ritorna lista di utenti presenti/i preferiti di un utente/aziende presenti/le prenotazioni di un utente dal database
        default: break;
    }
    function inserisci(){ //OK
        //Mi connetto al database
        $conn=mysqli_connect("localhost", "root", "","esame_progetto") or die("Errore: "+ mysqli_connect_error());
        //Effettuo l'escape dei valori
        $utente = mysqli_real_escape_string($conn, $_SESSION["utente"]);
        if($_GET["type"]=="azienda"){
            $value = mysqli_real_escape_string($conn, $_GET["value"]);
            //Preparo la query di inserimento
            $query= "INSERT INTO preferiti values('".$utente."','".$value."')";
        }
        if($_GET["type"]=="evento"){
            $value = mysqli_real_escape_string($conn, $_GET["value"]);
            //Preparo la query di inserimento
            $query= "INSERT INTO prenotazioni values('".$utente."','".$value."')";
        }
        if($_GET["type"]=="modello"){
            $codice=mysqli_real_escape_string($conn, $_GET["codice"]);
            $data=mysqli_real_escape_string($conn, $_GET["data"]);
            $nome=mysqli_real_escape_string($conn, $_GET["nome"]);
            $sesso=mysqli_real_escape_string($conn, $_GET["sesso"]);
            $nazione=mysqli_real_escape_string($conn, $_GET["nazione"]);
            $azienda=mysqli_real_escape_string($conn, $_GET["azienda"]);
            $ingaggio=$_GET["ingaggio"];
            if(strlen($azienda)>0){
                $query= "INSERT INTO modello values('".$codice."','".$data."','".$nome."','".$sesso."','".$nazione."','".$azienda."','".$ingaggio."')";
            } else {
                $query= "INSERT INTO modello values('".$codice."','".$data."','".$nome."','".$sesso."','".$nazione."',NULL,'".$ingaggio."')";
            }
            //Preparo la query di inserimento
            
        }
        //Eseguo la query
        $res=mysqli_query($conn, $query);
        //Ritorno un json con false se la query non è stata eseguita correttamente
        if($res==false){
            echo json_encode(array('stato'=>false));
            mysqli_close($conn);
            exit;
        }
        echo json_encode(array('stato'=>true));
        //Libero le risorse
        mysqli_close($conn);
    }
    function elimina(){ //OK
        //Mi connetto al database
        $conn=mysqli_connect("localhost", "root", "","esame_progetto") or die("Errore: "+ mysqli_connect_error());
        //Effettuo l'escape dei valori
        $value = mysqli_real_escape_string($conn, $_GET["value"]);
        $utente = mysqli_real_escape_string($conn, $_SESSION["utente"]);
        if($_GET["type"]=="azienda"){
            //Preparo la query di inserimento
            $query= "DELETE FROM preferiti WHERE utente='".$utente."'AND azienda='".$value."' ";
        }
        if($_GET["type"]=="evento"){
            //Preparo la query di inserimento
            $query= "DELETE FROM prenotazioni WHERE utente='".$utente."'AND evento='".$value."' ";
        }
        //Eseguo la query
        $res=mysqli_query($conn, $query);
        //Ritorno un json con false se la query non è stata eseguita correttamente
        if($res==false){
            echo json_encode(array('stato'=>false));
            mysqli_close($conn);
            exit;
        }
        echo json_encode(array('stato'=>true));
        //Libero le risorse
        mysqli_close($conn);
    }
    function ritorna(){ //OK
        $dati=array();
        //Mi connetto al database
        $conn=mysqli_connect("localhost", "root", "","esame_progetto") or die("Errore: "+ mysqli_connect_error());
        $utente=mysqli_real_escape_string($conn, $_SESSION["utente"]);
        if($_GET["type"]=="utente"){
            //Preparo la query per ottenere gli utenti
            $query="SELECT username FROM utente";
            $query="SELECT * FROM prenotazioni WHERE utente='".$utente."'";
        }
        if($_GET["type"]=="prenotazione"){
            //Preparo la query per ottenere le prenotazioni di un utente
            $query="SELECT * FROM prenotazioni WHERE utente='".$utente."'";
        }
        if($_GET["type"]=="azienda"){
            //Preparo la query per ottenere le aziende
            $query="SELECT * FROM azienda";
        }
        if($_GET["type"]=="preferito"){
            //Preparo la query per ottenere le aziende preferite dell'utente
            $query="SELECT A.nome, A.url_logo FROM preferiti P JOIN azienda A on P.azienda=A.nome WHERE utente='".$utente."'";
        }
        if($_GET["type"]=="registrato"){
            //Preparo la query per ottenere i modelli già registrati
            $query="SELECT codice FROM modello";
        }
        if($_GET["type"]=="modello"){
            //Preparo la query per ottenre i modelli che rispettano certe caratteristiche
            $nazionalita=mysqli_real_escape_string($conn, $_GET["nazione"]);
            if($_GET["manager"]=="si"){
                $query="SELECT * FROM modello M JOIN contratto C on C.codice_modello=M.codice WHERE M.sesso='".$_GET["genere"]."' AND M.nazionalita='".$nazionalita."'";
                if(strlen($nazionalita)==0){
                    $query="SELECT * FROM modello M JOIN contratto C on C.codice_modello=M.codice WHERE M.sesso='".$_GET["genere"]."'";
                }
            }else{
                $query="SELECT * FROM modello M left join contratto C on M.codice=C.codice_modello WHERE M.sesso='".$_GET["genere"]."' AND M.nazionalita='".$nazionalita."' AND C.codice_manager IS NULL";
                if(strlen($nazionalita)==0){
                    $query="SELECT * FROM modello M left join contratto C on M.codice=C.codice_modello WHERE M.sesso='".$_GET["genere"]."' AND C.codice_manager IS NULL";
                }
            }  
        }
        if($_GET["type"]=="analisi"){
            $query="SELECT * FROM vendita V JOIN lotto_gen L ON v.codice=L.codice_lotto WHERE V.nome='".$_GET["value"]."';";
        }
        //Eseguo la query
        $res=mysqli_query($conn, $query);
        //Risultati
        while($row=mysqli_fetch_assoc($res)){
            array_push($dati, $row);
        }
        mysqli_close($conn);
        echo json_encode($dati);
    }

?>