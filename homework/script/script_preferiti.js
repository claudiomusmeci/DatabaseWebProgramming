//Funzione che carica i preferiti di una persona
fetch("interazione_database.php?operazione=ritorna&type=preferito").then(onResponse).then(onJsonProduct);
function onResponse(response){
    return response.json();
}

function onJsonEsito(json){
    if(json.stato){
        alert("Elemento rimosso dai preferiti!");
    } else {
        alert("Si è verificato un errore");
    }
}

function onJsonProduct(json){
    //Verifica presenza elemento e inserisco
    const lista_marche=json;
    let i=0;
    for(let singola_marca of lista_marche){
        const immagine = document.createElement("img");
        immagine.src=singola_marca.url_logo;
        const nome = document.createElement("h1");
        nome.textContent=singola_marca.nome;
        const bottone=document.createElement("button");
        bottone.textContent="Rimuovi dai preferiti!";
        const slot=document.createElement("div");
        const preferiti=document.querySelector("#preferiti");
        preferiti.appendChild(slot);
        let lista_slot=document.querySelectorAll("#preferiti div");        //Utilizzo come indici la lunghezza della lista per poter utilizzare di volta in volta un nuovo <div> creato
        lista_slot[lista_slot.length-1].appendChild(nome);
        lista_slot[lista_slot.length-1].appendChild(immagine);
        lista_slot[lista_slot.length-1].appendChild(bottone);
        bottone.addEventListener("click", rimuovi_preferiti);
    }
    document.querySelector("#box_pref").classList.remove("nascondi");
}

//Funzione che rimuove un elemento dai preferiti
function rimuovi_preferiti(event){
    const elemento=event.currentTarget;
    const nodoSup=elemento.parentNode;
    const titolo=nodoSup.querySelector("h1");
    fetch("interazione_database.php?value="+encodeURIComponent(titolo.textContent)+"&operazione=elimina&type=azienda").then(onResponse).then(onJsonEsito);
    nodoSup.remove();
}
