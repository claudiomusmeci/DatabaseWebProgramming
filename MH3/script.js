//Caricamento dinamico degli elementi
for(let i=0; i<contenuti.length; i++){
    const elemento = document.createElement('div');
    elemento.id='marca'+i;
    const contenitore= document.querySelector('#contenitore');
    contenitore.appendChild(elemento);
    const elementList= document.querySelectorAll('#contenitore div');
    const new_titolo=document.createElement('h1');
    const new_img=document.createElement('img');
    const new_desc=document.createElement('p');
    new_desc.classList.add('descrizione');
    new_desc.classList.add('nascondi');

    const preferito=document.createElement('button');
    preferito.textContent='Aggiungi ai preferiti!';

    const mostra_piu=document.createElement('p'); 
    mostra_piu.textContent='Mostra di più';
    mostra_piu.classList.add('mostra');

    const mostra_meno=document.createElement('p'); 
    mostra_meno.classList.add('descrizione');
    mostra_meno.classList.add('nascondi');
    mostra_meno.classList.add('meno');
    mostra_meno.textContent='Mostra di meno';

    new_titolo.textContent=contenuti[i].titolo;
    new_img.src=contenuti[i].immagine;
    new_desc.textContent=contenuti[i].descrizione;
    elementList[i].appendChild(new_titolo);
    elementList[i].appendChild(new_img); 
    elementList[i].appendChild(mostra_piu);
    elementList[i].appendChild(new_desc);
    elementList[i].appendChild(mostra_meno);
    elementList[i].appendChild(preferito);
}

//Funzione che mostra le descrizioni
function funzione_mostra(event){
    const elemento=event.currentTarget;
    elemento.classList.add('nascondi');
    const nodoSup=elemento.parentNode;
    const listaDesc=nodoSup.querySelectorAll(".descrizione");
    for(let singoloDesc of listaDesc){
        singoloDesc.classList.remove('nascondi');
    }
    const meno=nodoSup.querySelector(".meno");
    meno.addEventListener("click", funzione_nascondi);
}

//Funzione che nasconde le descrizioni
function funzione_nascondi(event){
    const elemento=event.currentTarget;
    const nodoSup=elemento.parentNode;
    const listaDesc=nodoSup.querySelectorAll(".descrizione");
    for(let singoloDesc of listaDesc){
        singoloDesc.classList.add('nascondi');
    }
    const mostra=nodoSup.querySelector(".mostra");
    mostra.classList.remove('nascondi');
}

//Funzione che aggiunge i preferiti
function aggiungi_preferiti(event){
    const elemento=event.currentTarget;
    const nodoSup=elemento.parentNode;
    const titolo=nodoSup.querySelector("h1");
    //Verifica presenza elemento
    const lista_presenti=document.querySelectorAll("#preferiti h1");  
    for(let singolo_presente of lista_presenti){
        if(singolo_presente.textContent==titolo.textContent){
            return null;
        }
    }
    
    //Inserisco dinamicamente l'elemento nella sezione preferiti
    for(let marchio of contenuti){
        if(marchio.titolo===titolo.textContent){
            const nome = document.createElement("h1");
            nome.textContent=marchio.titolo;
            const immagine = document.createElement("img");
            immagine.src=marchio.immagine;
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
    }
    document.querySelector("#box_pref").classList.remove("nascondi");
}

//Funzione che rimuove un elemento dai preferiti
function rimuovi_preferiti(event){
    const elemento=event.currentTarget;
    const nodoSup=elemento.parentNode;
    nodoSup.remove();
    const lista_slot=document.querySelectorAll("#preferiti div h1");
    if(lista_slot.length<=0){
        document.querySelector("#box_pref").classList.add("nascondi");
    }
}

//Funzione che mostra gli elementi in base alla barra di ricerca
function funzione_ricerca(event){
    const input= event.currentTarget;
    const lista_marche=document.querySelectorAll("#contenitore div h1");
    for(let singola_marca of lista_marche){
        const marca=singola_marca.textContent;
        const testo=input.value;
        (singola_marca.parentNode).classList.remove("nascondi");
        if(((marca.toLowerCase()).indexOf(testo.toLowerCase()))===-1){
            (singola_marca.parentNode).classList.add("nascondi");
        }
    }
}

const listaMostra=document.querySelectorAll("#contenitore .mostra");
for(let singoloMostra of listaMostra){
    singoloMostra.addEventListener("click", funzione_mostra);
};

const listaBottoni=document.querySelectorAll("#contenitore button");
for(let singoloBottone of listaBottoni){
    singoloBottone.addEventListener("click", aggiungi_preferiti);
};

const barra_ricerca=document.querySelector("input");
barra_ricerca.addEventListener("keyup", funzione_ricerca);