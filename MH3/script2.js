//https://stackoverflow.com/questions/57384985/trying-to-work-out-where-the-submit-request-on-stock-x-is-going

function cerca(event){
    event.preventDefault();
    const input=document.querySelector("#cerca_prodotto");
    const value= encodeURIComponent(input.value);
    rest_url="https://stockx.com/api/browse?&_search="+value+"&dataType=product";
    if(value==""){
        const prodotti=document.querySelector("#prodotti");
        prodotti.innerHTML="";
        return;
    }
    fetch(rest_url).then(onResponse, onError).then(onJsonProduct);
}
function onResponse(response){
    return response.json();
}
function onError(response){
    alert("Si è verificato un errore");
}
function onJsonProduct(json){
    const prodotti=document.querySelector("#prodotti");
    prodotti.innerHTML="";
    let max_results=8;
    for(let i=0; i<max_results;i++){
        const brand_prodotto=json.Products[i].brand;
        const nome_prodotto=json.Products[i].title;
        const img_prodotto=json.Products[i].media.imageUrl;
        const prezzo_prodotto=json.Products[i].retailPrice+" euro";
        const slot=document.createElement("div");
        const immagine=document.createElement("img");
        immagine.src=img_prodotto;
        const brand=document.createElement("h1");
        brand.textContent=brand_prodotto;
        const nome=document.createElement("h1");
        nome.textContent=nome_prodotto;
        const prezzo=document.createElement("p");
        prezzo.textContent=prezzo_prodotto;
        prodotti.appendChild(slot);
        slot.appendChild(immagine);
        slot.appendChild(brand);
        slot.appendChild(nome);
        slot.appendChild(prezzo);
    }
}
function onJsonEvent(json){
    let max_results=10;
    const eventi=document.querySelector("#eventi");
    eventi.innerHTML="";
    if(json.page.totalElements<=max_results)
    {
        max_results=json.page.totalElements;
    }
    for(let i=0; i<max_results; i++){
        const nome_evento=json._embedded.events[i].name;
        const data_evento=json._embedded.events[i].dates.start.localDate;
        const slot=document.createElement("div");
        const nome=document.createElement("h1");
        nome.textContent=nome_evento;
        const data=document.createElement("p");
        data.textContent=data_evento;
        eventi.appendChild(slot);
        slot.appendChild(nome);
        slot.appendChild(data);
    }
}

const form=document.querySelector("form");
form.addEventListener("submit", cerca);

function aggiorna(){
    fetch(endpoint_event+API_KEY).then(onResponse, onError).then(onJsonEvent);
}

//Ticketmaster api
//https://app.ticketmaster.com/{package}/{version}/{resource}.json?apikey=**{API key}
//https://developer.ticketmaster.com/products-and-docs/apis/getting-started/


const API_KEY="Ai0JvwYHNKSDaJmIWAvgMQMlYWiEOaRA";
const endpoint_event="https://app.ticketmaster.com/discovery/v2/events.json?keyword=fashion%20show&sort=date,asc&apikey=";
fetch(endpoint_event+API_KEY).then(onResponse, onError).then(onJsonEvent);
const aggiornamento=document.querySelector("#aggiorna");
aggiornamento.addEventListener("click", aggiorna);