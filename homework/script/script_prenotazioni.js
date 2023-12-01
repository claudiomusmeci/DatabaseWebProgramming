//Funzione che carica le prenotazioni di una persona
fetch("interazione_database.php?operazione=ritorna&type=prenotazione").then(onResponse).then(onJsonPrenotazione);
function onResponse(response){
    return response.json();
}

function onJsonEsito(json){
    if(json.stato){
        alert("Elemento rimosso dalle prenotazioni!");
    } else {
        alert("Si è verificato un errore");
    }
}

function onJsonPrenotazione(json){
    const lista_eventi=json;
    let i=0;
    for(let singolo_evento of lista_eventi){
        const nome = document.createElement("h1");
        nome.textContent=singolo_evento.evento;
        const bottone=document.createElement("button");
        bottone.textContent="Rimuovi dall'elenco!";
        const slot=document.createElement("div");
        const prenotazioni=document.querySelector("#prenotazioni");
        prenotazioni.appendChild(slot);
        let lista_slot=document.querySelectorAll("#prenotazioni div");        //Utilizzo come indici la lunghezza della lista per poter utilizzare di volta in volta un nuovo <div> creato
        lista_slot[lista_slot.length-1].appendChild(nome);
        lista_slot[lista_slot.length-1].appendChild(bottone);
        bottone.addEventListener("click", rimuovi_prenotazione);
    }
    document.querySelector("#box_pref").classList.remove("nascondi");
}

//Funzione che rimuove un elemento dai preferiti
function rimuovi_prenotazione(event){
    const elemento=event.currentTarget;
    const nodoSup=elemento.parentNode;
    const titolo=nodoSup.querySelector("h1");
    fetch("interazione_database.php?value="+encodeURIComponent(titolo.textContent)+"&operazione=elimina&type=evento").then(onResponse).then(onJsonEsito);
    nodoSup.remove();
}