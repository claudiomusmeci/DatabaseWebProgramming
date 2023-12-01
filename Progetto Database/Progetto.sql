//CREAZIONE TABELLE
create table lavoratore(
nome varchar(20),
cod_fiscale varchar(20) primary key,
data_nascita date,
azienda varchar(20)
);

create table azienda(
provenienza varchar(20),
nome varchar(20) primary key,
direttore varchar(20),
descrizione varchar(255),
url_logo varchar(255),
num_lavoratori integer default 0
);

create table lavoro(
cod_fiscale varchar(20),
nome varchar(20),
stipendio float,
index idx_codFiscale(cod_fiscale),
index idx_nome(nome),
foreign key(cod_fiscale) references lavoratore(cod_fiscale),
foreign key(nome) references azienda(nome),
primary key(cod_fiscale, nome)
);

create table citta(
cap varchar(20) primary key,
nome varchar(20)
);

create table sede(
cap varchar(20),
nome varchar(20),
index idx_cap(cap),
index idx_nome(nome),
foreign key(cap) references citta(cap),
foreign key(nome) references azienda(nome),
primary key(cap, nome)
);

create table modello(
codice varchar(20) primary key,
data_nascita date,
nome varchar(20),
sesso varchar(20),
nazionalita varchar(20),
azienda varchar(20),
ingaggio float default 0
);

create table aff_pas(
nome_pas varchar(20),
codice varchar(20),
data_aff date,
index idx_codice(codice),
index idx_nome(nome_pas),
foreign key(nome_pas) references azienda(nome),
foreign key(codice) references modello(codice),
primary key(nome_pas, codice)
);

create table manager(
codice varchar(20) primary key
);

create table contratto(
codice_modello varchar(20),
codice_manager varchar(20) primary key,
index idx_cod(codice_manager),
foreign key(codice_manager) references manager(codice)
);

create table azienda_terza(
negozio varchar(20),
IVA varchar(20) primary key
);

create table lotto_gen(
codice_lotto varchar(20) primary key,
prezzo float,
tipo varchar(20)
);

create table vendita(
nome varchar(20),
IVA varchar(20),
codice varchar(20),
index idx_nome(nome),
index idx_IVA(IVA),
index idx_codice(codice),
foreign key(codice) references lotto_gen(codice_lotto),
foreign key(nome) references azienda(nome),
foreign key(IVA) references azienda_terza(IVA),
primary key(nome, IVA, codice)
);

create table sfilata(
nome varchar(50) primary key,
citta varchar(50)
);

create table ed_sfilata(
nome varchar(50),
anno integer,
invitati integer,
index idx_cod_sfilata(nome),
foreign key(nome) references sfilata(nome),
primary key(nome, anno)
);

create table partecipa(
nome varchar(20),
sfilata varchar(50),
anno integer,
index idx_azienda(nome),
index idx_sfilata(sfilata),
index idx_anno(anno),
foreign key(nome) references azienda(nome),
foreign key(sfilata, anno) references ed_sfilata(nome, anno),
primary key(nome, sfilata, anno)
);


create table utente(
    username varchar(20) not null,
    password varchar(20) not null,
    primary key(username, password)
);

create table preferiti(
    utente varchar(20),
    azienda varchar(20),
    index idx_utente(utente),
    index idx_azienda(azienda),
    foreign key (utente) references utente(username) on delete cascade,
    foreign key (azienda) references azienda(nome),
    primary key(utente, azienda)
);
create table prenotazioni(
    utente varchar(20),
    evento varchar(255),
    index index_utente(utente),
    foreign key (utente) references utente(username) on delete cascade,
    primary key (utente, evento)
);
//DATI
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Italia', 'Puma', 'Claudio Musmeci','Azienda tedesca specializzata nello streetwear','./loghi/puma.png') ;
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Francia', 'Superga', 'Manuel Locatelli','Azienda italiana specializzata in calzature','./loghi/superga.png') ;
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Spagna', 'Umbro', 'Mario Rossi','Azienda produttrice di scarpe','./loghi/umbro.png') ;
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Italia', 'Kappa', 'Mario Messina','Azienda italiana specializzata nel casual','./loghi/kappa.png') ;
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Germania', 'Nike', 'Angela Merkel','Azienda tedesca specializzata nello streetwear','./loghi/nike.png') ;
insert into azienda (provenienza, nome, direttore, descrizione, url_logo) values ('Germania', 'Adidas', 'Thomas Muller','Azienda tedesca specializzata nello streetwear','./loghi/adidas.png') ;
insert into lavoratore values ('Claudio Musmeci', 'MSMCLD', '2000/01/01', 'Puma');
insert into lavoratore values ('Manuel Locatelli', 'LCTMNL', '1998/10/11', 'Superga') ;
insert into lavoratore values ('Mario Rossi', 'RSSMRO', '1980/05/24', 'Umbro') ;
insert into lavoratore values ('Rita Torres', 'TRSRTA', '1990/01/08', 'Umbro') ;
insert into lavoratore values ('Harry Potter', 'PTTHRR', '1992/09/22', 'Kappa') ;
insert into lavoratore values ('Fabio Marino', 'MRNFAB', '2001/11/11', 'Nike') ;
insert into lavoratore values ('Cristiano Ronaldo', 'RNLCRT', '1992/10/28', 'Nike') ;
insert into lavoratore values ('Lionel Messi', 'MSSLNL', '1992/11/01', 'Adidas') ;
insert into lavoratore values ('Sara Ricco', 'RCCSAR', '1998/05/03', 'Nike') ;
insert into lavoratore values ('Aldo Baglio', 'BGLALD', '1997/10/03', NULL) ;
insert into lavoro values ('MSMCLD', 'Puma', 1200.5) ;
insert into lavoro values ('LCTMNL', 'Superga', 1400) ;
insert into lavoro values ('RSSMRO', 'Umbro', 500.0) ;
insert into lavoro values ('TRSRTA', 'Umbro', 2000) ;
insert into lavoro values ('PTTHRR', 'Kappa', 5000.5) ;
insert into lavoro values ('MRNFAB', 'Nike', 800) ;
insert into lavoro values ('RNLCRT', 'Nike',30000) ;
insert into lavoro values ('MSSLNL', 'Adidas', 25000) ;
insert into lavoro values ('RCCSAR', 'Nike', 1200) ;
insert into citta values ('95024', 'Acireale') ;
insert into citta values ('93908', 'Bari') ;
insert into citta values ('93794', 'Trento') ;
insert into citta values ('55785', 'Parigi') ;
insert into citta values ('31045', 'Londra') ;
insert into citta values ('68912', 'Sidney') ;
insert into citta values ('98134', 'NewYork') ;
insert into citta values ('56983','Lipsia') ;
insert into citta values ('97544','Padova') ;
insert into sede values ('95024', 'Umbro') ;
insert into sede values ('95024', 'Adidas') ;
insert into sede values ('95024', 'Nike') ;
insert into sede values ('93908', 'Nike') ;
insert into sede values ('93794', 'Adidas') ;
insert into sede values ('55785', 'Superga') ;
insert into sede values ('31045', 'Superga') ;
insert into sede values ('68912', 'Puma') ;
insert into sede values ('98134', 'Kappa') ;
insert into sede values ('56983','Puma') ;
insert into sede values ('97544','Kappa') ;
insert into modello values ('A01234', '1999/10/05', 'Salvo Russo', 'Maschio', 'Italia', 'Adidas', 30000);
insert into modello values ('B06634', '1980/11/15', 'Francesco Monaco', 'Maschio', 'Italia','Adidas', 30000);
insert into modello values ('C11111', '2000/01/01', 'Claudio Musmeci', 'Maschio', 'Italia','Adidas', 30000);
insert into modello values ('Z22113', '1992/02/26', 'Sofia Raciti', 'Femmina', 'Italia','Puma', 50000);
insert into modello values ('K09809', '2000/06/25', 'Marc Paul', 'Maschio', 'Francia', 'Superga', 30000);
insert into modello values ('01234', '1979/10/05', 'Rita Pavone', 'Femmina', 'San Marino','Kappa', 50000);
insert into modello values ('F01914', '2001/09/03', 'France Jacques', 'Femmina', 'Francia','Umbro', 50000);
insert into modello values ('G99234', '1997/10/05', 'Belen Rodriguez', 'Femmina', 'Argentina',NULL, 50000);
insert into modello values ('P09624', '1992/11/05', 'Marlon Brando', 'Maschio', 'Spagna','Kappa', 30000);
insert into modello values ('L94798', '1979/05/11', 'Sonia Muller', 'Femmina', 'Germania','Puma', 50000);
insert into aff_pas values ('Puma','A01234', '1992/10/10');
insert into aff_pas values ('Puma','F01914', '1992/10/10');
insert into aff_pas values ('Kappa','K09809', '2000/11/15');
insert into aff_pas values ('Superga','B06634', '2005/10/05');
insert into aff_pas values ('Superga','G99234', '2005/10/05');
insert into aff_pas values ('Umbro','P09624', '2010/06/25');
insert into aff_pas values ('Umbro','01234', '2010/06/25');
insert into aff_pas values ('Adidas','L94798', '2020/11/28');
insert into aff_pas values ('Nike','K09809', '1999/10/12');
insert into manager values ('M11');
insert into manager values ('M22');
insert into manager values ('M33');
insert into manager values ('M44');
insert into manager values ('M55');
insert into manager values ('M66');
insert into manager values ('M77');
insert into manager values ('M88');
insert into manager values ('M99');
insert into contratto values ('A01234','M11');
insert into contratto values ('F01914','M22');
insert into contratto values ('P09624','M33');
insert into contratto values (NULL,'M44');
insert into contratto values ('G99234','M55');
insert into contratto values ('L94798','M66');
insert into contratto values (NULL,'M77');
insert into azienda_terza values ('Negozio1','111111');
insert into azienda_terza values ('Negozio2','222222');
insert into azienda_terza values ('Negozio3','333333');
insert into azienda_terza values ('Negozio4','444444');
insert into azienda_terza values ('Negozio5','555555');
insert into azienda_terza values ('Negozio6','666666');
insert into azienda_terza values ('Negozio7','777777');
insert into lotto_gen values ('A1234',50000,'Scarpe');
insert into lotto_gen values ('B1234',76000,'Magliette');
insert into lotto_gen values ('C1234',30000.5,'Scarpe');
insert into lotto_gen values ('D1234',2000.8,'Pantaloni');
insert into lotto_gen values ('E1234',550000,'Pantaloni');
insert into lotto_gen values ('F1234',50000,'Scarpe');
insert into lotto_gen values ('G1234',2200,'Profumo');
insert into vendita values ('Adidas','222222','A1234');
insert into vendita values ('Adidas','111111','A1234');
insert into vendita values ('Nike','333333','B1234');
insert into vendita values ('Dolce e Gabbana','444444','C1234');
insert into vendita values ('Umbro','555555','D1234');
insert into vendita values ('Umbro','111111','E1234');
insert into vendita values ('Kappa','444444','F1234');
insert into vendita values ('Kappa','666666','G1234');
insert into vendita values ('Puma','777777','E1234');
insert into vendita values ('Dolce e Gabbana','777777','D1234');
insert into sfilata values ('Settimana della moda','Milano');
insert into sfilata values ('Venere della Etna','Catania');
insert into sfilata values ('Sfilata 3','Roma');
insert into sfilata values ('Sfilata 4','Parigi');
insert into sfilata values ('Sfilata 5','Berlino');
insert into sfilata values ('Sfilata 6','Madrid');
insert into sfilata values ('Sfilata 7','Milano');
insert into ed_sfilata values ('Settimana della moda',2020,550);
insert into ed_sfilata values ('Settimana della moda', 2000,150);
insert into ed_sfilata values ('Venere della Etna',2018,300);
insert into ed_sfilata values ('Sfilata 3', 2012,110);
insert into ed_sfilata values ('Sfilata 3',2011,50);
insert into ed_sfilata values ('Sfilata 4', 2000,110);
insert into ed_sfilata values ('Sfilata 5',2010,120);
insert into ed_sfilata values ('Sfilata 6',2010,60);
insert into ed_sfilata values ('Sfilata 7',2008,66);
insert into partecipa values ('Adidas','Settimana della moda',2020);
insert into partecipa values ('Adidas','Settimana della moda',2000);
insert into partecipa values ('Puma','Settimana della moda',2000);
insert into partecipa values ('Kappa','Venere della Etna',2018);
insert into partecipa values ('Umbro','Sfilata 3',2011);
insert into partecipa values ('Superga','Sfilata 3',2012);
insert into partecipa values ('Superga','Sfilata 4', 2000);
insert into partecipa values ('Nike','Sfilata 5',2010);
insert into partecipa values ('Nike','Sfilata 6',2010);
insert into partecipa values ('Umbro','Sfilata 7',2008);
insert into partecipa values ('Puma','Sfilata 3',2012);

//OPERAZIONI
1)
delimiter //
create procedure operazione1()
begin
select *
from modello 
where sesso like 'fe%' and nazionalita = any(
select nazionalita
from modello
where nazionalita not like 'ita%'
) ;
end //
delimiter ;

2)
delimiter //
create procedure `operazione2`()
begin
drop table if exists temp1, temp2;
create temporary table temp1(
nome varchar(20),
passati integer
);
create temporary table temp2(
nome varchar(20),
correnti integer
);
insert into temp1
select A.nome_pas, count(A.nome_pas) as impieghi_passati
from aff_pas A 
group by A.nome_pas;
insert into temp2
select M.azienda, count(M.azienda) as impieghi_correnti
from modello M 
group by M.azienda;
select T1.nome, T2.correnti, T1.passati
from temp1 T1 join temp2 T2 on T1.nome=T2.nome;
end //
delimiter ;

3)
delimiter //
create procedure operazione3(in codice1 varchar(20),in data_nasc1 date, in nome1 varchar(20), in sesso1 varchar(20), in nazione1 varchar(20), in azienda1 varchar(20), in ingaggio float)
begin
if exists (
select *
from azienda
where nome=azienda1
)
then 
case 
when timestampdiff(year,data_nasc1, current_date()) <=40 then set ingaggio= ingaggio + (ingaggio * 0.2); insert into modello values (codice1, data_nasc1, nome1, sesso1, nazione1, azienda1, ingaggio);
when timestampdiff(year,data_nasc1, current_date()) >40 then set ingaggio = ingaggio - (ingaggio * 0.2); insert into modello values (codice1, data_nasc1, nome1, sesso1, nazione1, azienda1, ingaggio);
end case;
else signal sqlstate '45000' set message_text = 'Il nome dell azienda deve far parte della lista delle aziende';
end if;
end //
delimiter ;

4)
delimiter //
create procedure operazione4()
begin
select L.nome, L.cod_fiscale, L.azienda, A.num_lavoratori
from lavoratore L join azienda A on L.azienda=A.nome;
end //
delimiter ;


//ALTRE OPERAZIONI

//Vista
create view modello_manager as
    SELECT M.nome as nome, M.sesso as sesso, M.nazionalita as nazionalita, M.azienda as azienda, M.codice as codice, M.data_nascita as data_nascita, C.codice_manager as codice_manager
    FROM modello M join contratto C on M.codice=C.codice_modello

//Trigger
delimiter //
create trigger aggiorna_lavoratore
after insert on lavoratore
for each row
begin
if exists (
select *
from azienda
where nome=NEW.azienda
) then 
update azienda
set num_lavoratori=num_lavoratori + 1
where nome=NEW.azienda;
end if;
end //
delimiter ;

//Business Rule
delimiter //
create trigger business_rule
before insert on contratto
for each row
begin
if (
select count(*)
from modello_manager M
where M.azienda=all(
select azienda
from modello
where codice=NEW.codice_modello)
)=2
then 
signal sqlstate '45000' set message_text = 'Una azienda non può affiliare più di due modelli con manager';
end if;
end //
delimiter ;




