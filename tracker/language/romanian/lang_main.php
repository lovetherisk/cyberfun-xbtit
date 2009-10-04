﻿<?php
global $users, $torrents, $seeds, $leechers, $percent;
$language['ACCOUNT_CONFIRM']='Confirmarea contului pentru site-ul '.$SITENAME;
$language['ACCOUNT_CONGRATULATIONS']='Felicitari, contul tau este acum valid!<br>Te poti <a href="index.php?page=login">autentifica</a> pe tracker folosindu-ti noul cont.';
$language['ACCOUNT_CREATE']='Creaza cont';
$language['ACCOUNT_DELETE']='sterge cont';
$language['ACCOUNT_DETAILS']='detalii cont';
$language['ACCOUNT_EDIT']='Editeaza cont';
$language['ACCOUNT_MGMT']='Administrare Cont';
$language['ACCOUNT_MSG']='Salut,'."\n\n".'Acest e-mail a fost expediat deoarece adresa ta de e-mail a fost folosita pentru inregistrarea unui cont pe site-ul nostru.'."\n".'Daca nu tu ai inregistrat contul te rugam sa ignori acest e-mail, in caz contrar te rugam sa-ti validezi contul.'."\n\n".'Cele mai bune urari din partea Staff-ului.';
$language['ACTION']='Actiune';
$language['ACTIVATED']='Activ';
$language['ACTIVE']='Status';
$language['ACTIVE_ONLY']='Doar active';
$language['ADD']='Adauga';
$language['ADDED']='Adaugat';
$language['ADMIN_CPANEL']='Panoul de Administrare';
$language['ADMINCP_NOTES']='Aici poti administra toate setarile tracker-ului...';
$language['ALL']='Toate';
$language['ALL_SHOUT']='Toate Mesajele';
$language['ANNOUNCE_URL']='Tracker announce url:';
$language['ANONYMOUS']='Anonim';
$language['ANSWER']='Raspuns';
$language['AUTHOR']='Autor';
$language['AVATAR_URL']='Avatar (URL): ';
$language['AVERAGE']='Medie';
$language['BACK']='inapoi';
$language['BAD_ID']='ID gresit!';
$language['BCK_USERCP']='inapoi la Panoul Utilizatorului';
$language['BLOCK']='Blocheaza';
$language['BODY']='Continut';
$language['BOTTOM']='bottom';
$language['BY']='De';
$language['CANT_DELETE_ADMIN']='Nu poti sterge contul altui Administrator!';
$language['CANT_DELETE_NEWS']='Nu ai permisiunea sa stergi stiri!';
$language['CANT_DELETE_TORRENT']='Nu ai permisiunea sa stergi acest torrent!...';
$language['CANT_DELETE_USER']='Nu ai permisiunea sa stergi utilizatori!';
$language['CANT_DO_QUERY']='Nu se poate executa interogarea SQL - ';
$language['CANT_EDIT_TORR']='Nu ai permisiunea sa editezi acest torrent!';
$language['CANT_FIND_TORRENT']='Fisierul torrent nu a fost gasit!';
$language['CANT_READ_LANGUAGE']='Fisierul de limba nu poate fi citit!';
$language['CANT_SAVE_CONFIG']='Setarile nu pot fi salvate in config.php';
$language['CANT_SAVE_LANGUAGE']='Fisierul de limba nu poate fi salvat';
$language['CANT_WRITE_CONFIG']='Atentie: config.php nu poate fi scris!';
$language['CATCHUP']='Marcheaza toate ca Citit';
$language['CATEGORY']='Cat.';
$language['CATEGORY_FULL']='Categorie';
$language['CENTER']='centru';
$language['CHANGE_PID']='Schimba PID';
$language['CHARACTERS']='Caractere';
$language['CHOOSE']='Alege';
$language['CHOOSE_ONE']='alege una';
$language['CLICK_HERE']='apasa aici';
$language['CLOSE']='inchide';
$language['COMMENT']='Com.';
$language['COMMENT_1']='Comentariu';
$language['COMMENT_PREVIEW']='Previzualizarea Comentariului';
$language['COMMENTS']='Comentarii';
$language['CONFIG_SAVED']='Felicitari, noua configuratie a fost salvata';
$language['COUNTRY']='tara';
$language['CURRENT_DETAILS']='Detalii curente';
$language['DATABASE_ERROR']='Eroare Baza de Date.';
$language['DATE']='Data';
$language['DB_ERROR_REQUEST']='Eroare Baza de Date. Cererea nu poate fi procesata.';
$language['DB_SETTINGS']='Setari Baza de Date';
$language['DEAD_ONLY']='Doar Moarte';
$language['DELETE']='sterge';
$language['DELETE_ALL_READED']='sterge tot ce e citit';
$language['DELETE_CONFIRM']='Esti sigur ca vrei sa stergi asta?';
$language['DELETE_TORRENT']='sterge Torrent';
$language['DELFAILED']='stergere esuata';
$language['DESCRIPTION']='Descriere';
$language['DONT_NEED_CHANGE']='Nu este nevoie sa schimbi aceste setari!';
$language['DOWN']='Dl';
$language['DOWNLOAD']='Descarca';
$language['DOWNLOAD_TORRENT']='Descarca Torrent';
$language['DOWNLOADED']='Descarcat';
$language['EDIT']='Editeaza';
$language['EDIT_LANGUAGE']='Editeaza Limba';
$language['EDIT_POST']='Editeaza Mesajul';
$language['EDIT_TORRENT']='Editeaza Torrent';
$language['EMAIL']='E-mail';
$language['EMAIL_SENT']='Un e-mai a fost trimis la adresa indicata.<br>Foloseste link-ul pentru a-ti confirma contul.';
$language['EMAIL_VERIFY']='E-mail pentru actualizarea contului pe '.$SITENAME;
$language['EMAIL_VERIFY_BLOCK']='E-mail de verificare trimis';
$language['EMAIL_VERIFY_MSG']='Salut,'."\n\n".'Acest e-mail a fost expediat deoarece ai cerut schimbarea adresei de e-mail care figureaza acum in baza noastra de date, te rugam sa dai click pe link-ul de mai jos pentru a finaliza actualizarea.'."\n\n".'Cele mai bune urari din partea Staff-ului.';
$language['EMAIL_VERIFY_SENT1']='<br /><center>Un e-mail de verificare a fost trimis la adresa:<br /><br /><strong><font color="red">';
$language['EMAIL_VERIFY_SENT2']='</font></strong><br /><br />Va trebui sa dai click pe link-ul inclus in e-mail pentru<br />a putea finaliza actualizarea adresei. Acest e-mail trebuie sa soseasca in urmatoarele 10 minute<br />(de obicei instantaneu) dar se poate ca unii operatori de servicii e-mail sa il marcheze ca SPAM<br />. Asigura-te ca verifici directorul SPAM in cazul in care nu gasesti e-mail-ul.<br /><br />';
$language['ERR_500']='HTTP/1.0 500 Acces nepermis!';
$language['ERR_AVATAR_EXT']='Nu pare rau dar formatele permise sunt gif,jpg,bmp sau png';
$language['ERR_BAD_LAST_POST']='';
$language['ERR_BAD_NEWS_ID']='ID stiri gresit!';
$language['ERR_BODY_EMPTY']='Continutul nu poate fi gol!';
$language['ERR_CANT_CONNECT']='Nu se poate realiza conexiunea cu server-ul local de MySQL';
$language['ERR_CANT_OPEN_DB']='Nu se poate accesa Baza de Date';
$language['ERR_DB_ERR']='Eroare Baza de Date. Te rugam sa raportezi aceasta problema unui Administrator.';
$language['ERR_DELETE_POST']='sterge Mesaj. Sanity check: Esti pe cale sa stergi un Mesaj. Apasa';
$language['ERR_DELETE_TOPIC']='sterge topic. Sanity check: Esti pe cale sa stergi un topic. Apasa';
$language['ERR_EMAIL_ALREADY_EXISTS']='Aceasta adresa de e-mail exista deja in baza noastra de date!';
$language['ERR_EMAIL_NOT_FOUND_1']='Aceasta adresa de e-mail';
$language['ERR_EMAIL_NOT_FOUND_2']='nu a fost gasita in baza noastra de date.';
$language['ERR_ENTER_NEW_TITLE']='Trebuie sa specifici un nou Titlu!';
$language['ERR_FORUM_NOT_FOUND']='Forum negasit';
$language['ERR_FORUM_UNKW_ACT']='Eroare Forum: Actiune necunoscuta';
$language['ERR_GUEST_EXISTS']='Utilizarea umelui "Guest" este restrictionata. Nu te poti inregistra ca "Guest"';
$language['ERR_IMAGE_CODE']='Codul din Imagine nu se potriveste';
$language['ERR_INS_TITLE_NEWS']='Trebuie completate atât Titlul cât si stirea';
$language['ERR_INV_NUM_FIELD']='Câmp(uri) numerice invalide din partea clientului';
$language['ERR_INVALID_CLIENT_EVENT']='Eveniment invalid din partea clientului.';
$language['ERR_INVALID_INFO_BT_CLIENT']='Au fost primite informatii invalide din partea clientului BitTorrent';
$language['ERR_INVALID_IP_NUMB']='Adresa IP invalida. Trebuie sa fie compusa din zecimale punctate standard (nu sunt permise nume de host-uri)';
$language['ERR_LEVEL']='Ne pare rau, nivelul tau ';
$language['ERR_LEVEL_CANT_POST']='Nu ai permisiunea de a scrie un Mesaj in acest Forum.';
$language['ERR_LEVEL_CANT_VIEW']='Nu ai permisiunea sa vizualizezi acest Topic.';
$language['ERR_MISSING_DATA']='Lipsesc date!';
$language['ERR_MUST_BE_LOGGED_SHOUT']='Trebuie sa te autentifici pentru a scrie un Mesaj...';
$language['ERR_NO_BODY']='Nu exista continut';
$language['ERR_NO_NEWS_ID']='ID stire negasit!';
$language['ERR_NO_POST_WITH_ID']='Nici un Mesaj cu ID-ul ';
$language['ERR_NO_SPACE']='Numele tau de utilizator nu poate contine spatii libere, te rugam sa le inlocuiesti cu un underline. Ex:<br /><br />';
$language['ERR_NO_TOPIC_ID']='Nu a fost returnat nici un ID de Topic';
$language['ERR_NO_TOPIC_POST_ID']='Nu exista nici un Topic asociat cu ID-ul Mesajului';
$language['ERR_NOT_AUTH']='Nu esti autorizat!';
$language['ERR_NOT_FOUND']='Negasit...';
$language['ERR_NOT_PERMITED']='Nepermis';
$language['ERR_PASS_LENGTH']='<font color="black">Parola trebuie sa fie mai lunga de 4 caractere.</font>';
$language['ERR_PASSWORD_INCORRECT']='Parola incorecta';
$language['ERR_PERM_DENIED']='Permisiune respinsa';
$language['ERR_PID_NOT_FOUND']='Te rugam sa descarci iarasi torrent-ul. Sistemul PID este activ si nu a fost detectat in torrent';
$language['ERR_RETR_DATA']='Eroare obtinere date!';
$language['ERR_SEND_EMAIL']='E-mail-ul nu poate fi trimis. Te rugam sa raportezi aceasta eroare unui Administrator.';
$language['ERR_SERVER_LOAD']='Load-ul pe server este foarte mare in acest moment. incerc din nou, te rog asteapta...';
$language['ERR_SPECIAL_CHAR']='<font color="black">Numele tau de utilizator nu poate contine caractere speciale precum:<br /><br /><font color="red"><strong>* &#63; &#60; &#62; &#64; &#36; &#38; &#37; etc.</strong></font></font><br />';
$language['ERR_SQL_ERR']='Eroare SQL';
$language['ERR_SUBJECT']='Trebuie sa introduci un Subiect.';
$language['ERR_TOPIC_ID_NA']='ID Topic N/A';
$language['ERR_TOPIC_LOCKED']='Topic-ul este incuiat';
$language['ERR_TORRENT_IN_BROWSER']='Acest fisier este destinat clientilor BitTorrent.';
$language['ERR_UPDATE_USER']='Datele utilizatorului nu pot fi actualizate. Te rugam sa raportezi aceasta eroare unui Administrator.';
$language['ERR_USER_ALREADY_EXISTS']='Exista deja un utilizator cu acest nume!';
$language['ERR_USER_NOT_FOUND']='Ne pare rau, Utilizatorul nu a fost gasit';
$language['ERR_USER_NOT_USER']='Nu ai permisiunea sa accesezi Panoul altui utilizator!';
$language['ERR_USERNAME_INCORRECT']='Nume incorect';
$language['ERROR']='Eroare';
$language['ERROR_ID']='Eroare ID';
$language['FACOLTATIVE']='optional';
$language['FILE']='Fisier';
$language['FILE_CONTENTS']='Continut fisier';
$language['FILE_NAME']='Nume fisier';
$language['FIND_USER']='Cauta utilizator';
$language['FINISHED']='Finalizat';
$language['FORUM']='Forum';
$language['FORUM_ERROR']='Eroare Forum';
$language['FORUM_INFO']='Info Forum';
$language['FORUM_MIN_CREATE']='Min Class Create';
$language['FORUM_MIN_READ']='Min Class Read';
$language['FORUM_SEARCH']='Cautare Forum';
$language['FORUM_N_TOPICS']='Nr. Topic-uri';
$language['FORUM_N_POSTS']='Nr. Mesaje';
$language['FRM_DELETE']='sterge';
$language['FRM_LOGIN']='Autentificare';
$language['FRM_PREVIEW']='Previzualizare';
$language['FRM_REFRESH']='Reimprospateaza';
$language['FRM_RESET']='Reseteaza';
$language['FRM_SEND']='Trimite';
$language['FRM_CONFIRM']='Confirma';
$language['FRM_CANCEL']='Anuleaza';
$language['FRM_CLEAN']='Curata';
$language['GLOBAL_SERVER_LOAD']='Load Global (Toate website-urile aflate pe acest server)';
$language['GO']='Go';
$language['GROUP']='Grup';
$language['GUEST']='Guest';
$language['GUESTS']='Guests';
$language['HERE']='aici';
$language['HISTORY']='Istorie';
$language['HOME']='Acasa';
$language['IF_YOU_ARE_SURE']='daca esti sigur.';
$language['IM_SURE']='Sunt Sigur';
$language['IN']='in';
$language['INF_CHANGED']='Informatii schimbate!';
$language['INFINITE']='Inf.';
$language['INFO_HASH']='Info Hash';
$language['INS_NEW_PWD']='Insereaza NOUA parola!';
$language['INS_OLD_PWD']='Insereaza VECHEA parola!';
$language['INSERT_DATA']='Insereaza toate datele necesare pentru upload.';
$language['INSERT_NEW_FORUM']='Insereaza un nou forum';
$language['INVALID_ID']='Nu este un ID valid. Ne pare rau!';
$language['INVALID_INFO_HASH']='Valoare hash invalida.';
$language['INVALID_PID']='PID invalid';
$language['INVALID_TORRENT']='Eroare tracker: torrent invalid';
$language['KEYWORDS']='Cuvinte cheie';
$language['LAST_EXTERNAL']='Ultimul Update Extern a fost realizat la ';
$language['LAST_NEWS']='stiri Recente';
$language['LAST_POST_BY']='Ultimul Mesaj de';
$language['LAST_SANITY']='Ultimul Sanity Check a fost realizat la ';
$language['LAST_TORRENTS']='Ultimele Torrente';
$language['LAST_UPDATE']='Ultimul Update';
$language['LASTPOST']='Ultimul Mesaj';
$language['LEECHERS']='leecher(i)';
$language['LEFT']='stanga';
$language['LOGIN']='Autentificare';
$language['LOGOUT']='Deconectare';
$language['MAILBOX']='Mailbox';
$language['MANAGE_NEWS']='Administreaza stiri';
$language['MEMBER']='Utilizator';
$language['MEMBERS']='Utilizatori';
$language['MEMBERS_LIST']='Lista Membrii';
$language['MINIMUM_100_DOWN']='(cu mimin 100mb download)';
$language['MINIMUM_5_LEECH']='cu minim 5 leecher-i, fara torrent-ele moarte';
$language['MINIMUM_5_SEED']='cu minim 5 seeder-i';
$language['MKTOR_INVALID_HASH']='makeTorrent: Hash invalid primit';
$language['MNU_ADMINCP']='Panou de Administrare';
$language['MNU_FORUM']='Forum';
$language['MNU_INDEX']='Index';
$language['MNU_MEMBERS']='Membrii';
$language['MNU_NEWS']='stiri';
$language['MNU_STATS']='Statistici';
$language['MNU_TORRENT']='Torrente';
$language['MNU_UCP_CHANGEPWD']='Schimba Parola';
$language['MNU_UCP_HOME']='Pagina principala Panou Utilizator';
$language['MNU_UCP_IN']='Casuta de mesaje primite';
$language['MNU_UCP_INFO']='Schimba Profilul';
$language['MNU_UCP_NEWPM']='Mesaj Nou';
$language['MNU_UCP_OUT']='Casuta de mesaje trimise';
$language['MNU_UCP_PM']='Casuta de mesaje';
$language['MNU_UPLOAD']='Upload';
$language['MORE_SMILES']='Mai multe Iconite Emotive';
$language['MORE_THAN']='Mai mult de ';
$language['MORE_THAN_2']='obiecte gasite, afisez primele';
$language['NA']='N/A';
$language['NAME']='Nume';
$language['NEED_COOKIES']='Nota: Cookie-urile trebuie sa fie activate pentru autentificare.';
$language['NEW_COMMENT']='Insereaza comentariul tau...';
$language['NEW_COMMENT_T']='Adauga un nou Comentariu';
$language['NEWS']='stirile';
$language['NEWS_DESCRIPTION']='stire:';
$language['NEWS_INSERT']='Adauga stirea ta';
$language['NEWS_PANEL']='Panou Administrare stiri';
$language['NEWS_TITLE']='Titlu:';
$language['NEXT']='inainte';
$language['NO']='Nu';
$language['NO_BANNED_IPS']='Nu exista niciun IP restrictionat';
$language['NO_COMMENTS']='Niciun comentariu...';
$language['NO_FORUMS']='Niciun Forum gasit!';
$language['NO_MAIL']='Nu ai niciun mesaj nou.';
$language['NO_MESSAGES']='Niciun mesaj gasit...';
$language['NO_NEWS']='Nicio stire';
$language['NO_PEERS']='Niciun peer';
$language['NO_RECORDS']='Ne pare rau, lista este goala...';
$language['NO_TOPIC']='Niciun Topic gasit';
$language['NO_TORR_UP_USER']='Acest utilizator nu a urcat niciun torrent';
$language['NO_TORRENTS']='Niciun torrent aici...';
$language['NO_USERS_FOUND']='Niciun utilizator gasit!';
$language['NOBODY_ONLINE']='Nimeni online';
$language['NONE']='None';
$language['NOT_ADMIN_CP_ACCESS']='Nu ai permisiunea sa accesezi Panoul de Administrare!';
$language['NOT_ALLOW_DOWN']='nu are permisiunea sa descarce de la';
$language['NOT_AUTH_DOWNLOAD']='Nu ai permisiunea sa faci download. Ne pare rau...';
$language['NOT_AUTH_VIEW_NEWS']='Nu ai permisiunea sa vizualizezi stirile!';
$language['NOT_AUTHORIZED']='Nu ai permisiunea sa vizualizezi';
$language['NOT_AUTHORIZED_UPLOAD']='Nu ai permisiunea sa faci upload!';
$language['NOT_AVAILABLE']='N/A';
$language['NOT_MAIL_IN_URL']='in URL nu este specificata aceasta adresa de e-mail';
$language['NOT_POSS_RESET_PID']='Nu ti se poate reseta PID-ul! <br />Contacteaza un Administrator...';
$language['NOW_LOGIN']='Acum ti se va cere sa te autentifici';
$language['NUMBER_SHORT']='Nr.';
$language['OLD_PWD']='Parola veche';
$language['ONLY_REG_COMMENT']='Doar utilizatorii inregistrati pot adauga comentarii!';
$language['OPT_DB_RES']='Rezultatul Optimizarii Bazei de Date';
$language['OPTION']='Optiune';
$language['PASS_RESET_CONF']='confirma resetarea parolei';
$language['PEER_CLIENT']='Client';
$language['PEER_COUNTRY']='tara';
$language['PEER_ID']='ID peer';
$language['PEER_LIST']='Lista Peer(i)';
$language['PEER_PORT']='Port';
$language['PEER_PROGRESS']='Progres';
$language['PEER_STATUS']='Status';
$language['PEERS']='peer(i)';
$language['PEERS_DETAILS']='Apasa aici pentru a vedea peer(ii)';
$language['PICTURE']='Poza';
$language['PID']='PID';
$language['PLEASE_WAIT']='Te rugam sa astepti...';
$language['PM']='PM';
$language['POSITION']='Pozitie';
$language['POST_REPLY']='Adauga Raspuns';
$language['POSTED_BY']='Adaugat de';
$language['POSTED_DATE']='Adaugat la';
$language['POSTS']='Mesaje';
$language['POSTS_PER_DAY']='%s mesaje per zi';
$language['POSTS_PER_PAGE']='Mesaje per pagina';
$language['PREVIOUS']='inapoi';
$language['PRIVATE_MSG']='Mesaj Privat';
$language['PWD_CHANGED']='Parola a fost schimbata!';
$language['QUESTION']='intrebare';
$language['QUICK_JUMP']='Salt rapid';
$language['QUOTE']='Citat';
$language['RANK']='Rang';
$language['RATIO']='Ratie';
$language['REACHED_MAX_USERS']='Numarul maxim de utilizatori a fost atins';
$language['READED']='Citeste';
$language['RECEIVER']='Destinatar';
$language['RECOVER_DESC']='Foloseste formularul de mai jos pentru resetarea parolei iar detaliile contului tau iti vor fi trimise prin e-mail.<br />(Va trebui sa raspunzi unui e-mail de confirmare.)';
$language['RECOVER_PWD']='Recupereaza parola';
$language['RECOVER_TITLE']='Recupereaza nume sau parola uitate';
$language['REDIRECT']='Daca browser-ul tau nu are activat JavaScript, apasa';
$language['REDOWNLOAD_TORR_FROM']='Descarca iarasi torrent-ul de la';
$language['REGISTERED']='inregistrat';
$language['REGISTERED_EMAIL']='E-mail inregistrat';
$language['REMOVE']='inlatura';
$language['REPLIES']='Raspunsuri';
$language['REPLY']='Raspuns';
$language['RESULT']='Rezultat';
$language['RETRY']='incearca iar';
$language['RETURN_TORRENTS']='inapoi la lista de torrente';
$language['REVERIFY_CONGRATS1']='<center><br />Felicitari, e-mail-ul tau a fost verificat si actualizat cu succes<br /><br /><strong>Din: <font color="red">';
$language['REVERIFY_CONGRATS2']='</strong></font><br /><strong>in: <font color="red">';
$language['REVERIFY_CONGRATS3']='</strong></font><br /><br />';
$language['REVERIFY_FAILURE']='<center><br /><strong><font color="red"><u>Ne pare rau dar acest URL nu este valid</u></strong></font><br /><br />Un nou numar aleatoriu este generat la fiecare incercare de a-ti schimba adresa de e-mail<br />asa ca daca citesti acest mesaj inseamna ca ai incercat de mai multe ori<br />sa-ti schimbi e-mail-ul si folosesti un URL vechi.<br /><br /><strong>Te rugam sa astepti pâna esti absolut sigur ca nu ai primit noul<br />e-mail de verificare inainte de-a incerca sa-ti mai schimbi adresa de e-mail.</strong><br /><br />';
$language['REVERIFY_MSG']='in cazul in care vei dori schimbarea adresei de e-mail vei primi un link de verificare pe noua adresa.<br /><br /><font color="red"><strong>Adresa de e-mail din baza noastra de date nu va fi actualizata pâna nu-ti vei confirma adresa cu ajutorul link-ului.</strong></font>';
$language['RIGHT']='dreapta';
$language['SEARCH']='Cauta';
$language['SEEDERS']='seeder(i)';
$language['SEEN']='Vazut';
$language['SELECT']='Selecteaza...';
$language['SENDER']='Expeditor';
$language['SENT_ERROR']='Sent Error';
$language['SHORT_C']='C'; //Shortname for Completed
$language['SHORT_L']='L'; //Shortname for Leechers
$language['SHORT_S']='S'; //Shortname for Seeders
$language['SHOUTBOX']='ShoutBox';
$language['SIZE']='Dimensiuni';
$language['SORRY']='Ne pare rau';
$language['SORTID']='ID sortare';
$language['SPEED']='Viteza';
$language['STICKY']='Lipicios';
$language['SUB_CATEGORY']='Sub-Categorie';
$language['SUBJECT']='Subiect';
$language['SUBJECT_MAX_CHAR']='Subiectul este limitat la ';
$language['SUC_POST_SUC_EDIT']='Mesajul a fost editat cu succes.';
$language['SUC_SEND_EMAIL']='Un e-mail de confirmare a fost expediat pe adresa';
$language['SUC_SEND_EMAIL_2']='Te rugam sa astepti acest e-mail timp de câteva minute.';
$language['SUCCESS']='Succes';
$language['SUMADD_BUG']='Tracker bug calling summaryAdd';
$language['TABLE_NAME']='Nume tabela';
$language['TIMEZONE']='Fus orar';
$language['TITLE']='Titlu';
$language['TOP']='top';
$language['TOP_10_ACTIVE']='10 Torrents Most active';
$language['TOP_10_BEST_SEED']='10 Torrents Best Seeders';
$language['TOP_10_BSPEED']='10 Torrents Best Speed';
$language['TOP_10_DOWNLOAD']='Top 10 Downloaders';
$language['TOP_10_SHARE']='Top 10 Best Sharers';
$language['TOP_10_UPLOAD']='Top 10 Uploaders';
$language['TOP_10_WORST']='Top 10 Worst Sharers';
$language['TOP_10_WORST_SEED']='10 Torrents Worst Seeders';
$language['TOP_10_WSPEED']='10 Torrents Worst Speed';
$language['TOP_TORRENTS']='Cele mai populare torrente';
$language['TOPIC']='Topic';
$language['TOPICS']='Topic-uri';
$language['TOPICS_PER_PAGE']='Topic-uri per pagina';
$language['TORR_PEER_DETAILS']='Detalii peer-i';
$language['TORRENT']='Torrent';
$language['TORRENT_ANONYMOUS']='Trimite ca Anonim';
$language['TORRENT_CHECK']='Permite tracker-ului sa obtina si sa foloseasca informatiile din acest torrent.';
$language['TORRENT_DETAIL']='Detalii torrent';
$language['TORRENT_FILE']='Fisier torrent';
$language['TORRENT_SEARCH']='Cauta Torrent';
$language['TORRENT_STATUS']='Status';
$language['TORRENT_UPDATE']='Actualizare, te rugam sa astepti...';
$language['TORRENTS']='torrent(e)';
$language['TORRENTS_PER_PAGE']='Torrente per pagina';
$language['TRACK_DB_ERR']='Eroare Tracker/Baza de Date. Mai multe detalii in log-ul cu erori.';
$language['TRACKER_INFO']=$users.' utilizatori, urmaresc '.$torrents.' torrente ('.$seeds.' seed-eri, '.$leechers.' leech-eri, '.$percent.'%)';
$language['TRACKER_LOAD']='Load Tracker';
$language['TRACKER_SETTINGS']='Setari Tracker';
$language['TRACKER_STATS']='Statistici Tracker';
$language['TRACKING']='tracking';
$language['TRAFFIC']='Trafic';
$language['UCP_NOTE_1']='Aici poti controla Casuta de Mesaje, scrie Mesaje Priavate catre alti utilizatori,';
$language['UCP_NOTE_2']='Controla si modifica setarile tale, etc...';
$language['UNAUTH_IP']='Adresa IP neautorizata.';
$language['UNKNOWN']='necunoscut';
$language['UPDATE']='Actualizare';
$language['UPFAILED']='Actualizare esuata';
$language['UPLOAD_IMAGE']='Upload Imagine';
$language['UPLOAD_LANGUAGE_FILE']='Upload Fisier Limba';
$language['UPLOADED']='Uploaded';
$language['UPLOADER']='Uploader';
$language['UPLOADS']='Upload-uri';
$language['URL']='URL';
$language['USER_CP']='Panoul Meu';
$language['USER_CP_1']='Panou Control Utilizator';
$language['USER_DETAILS']='Detalii Utilizator';
$language['USER_EMAIL']='E-mail valid';
$language['USER_ID']='ID Utilizator';
$language['USER_JOINED']='inscris la';
$language['USER_LASTACCESS']='Ultima accesare';
$language['USER_LEVEL']='Rang';
$language['USER_LOCAL_TIME']='Ora locala';
$language['USER_NAME']='Utilizator';
$language['USER_PASS_RECOVER']='Recuperare Parola/Nume';
$language['USER_PWD']='Parola';
$language['USERS_SEARCH']='Cautare Utilizatori';
$language['VIEW_DETAILS']='Vizualizeaza detalii';
$language['VIEW_TOPIC']='Vezi Topic';
$language['VIEW_UNREAD']='Vezi Necitite';
$language['VIEWS']='Vizualizari';
$language['VISITOR']='Vizitator';
$language['VISITORS']='Vizitatori';
$language['WAIT_ADMIN_VALID']='Trebuie sa astepti validarea contului de catre un Administrator...';
$language['WARNING']='Avertizare!';
$language['WELCOME']='Bun-venit';
$language['WELCOME_ADMINCP']='Bun-venit la Panoul de Administrare';
$language['WELCOME_BACK']='Bun-venit inapoi';
$language['WELCOME_UCP']='Bun-venit la Panoul Utilizatorului';
$language['WORD_AND']='si';
$language['WORD_NEW']='Nou';
$language['WROTE']='a scris';
$language['WT']='WT';
$language['X_TIMES']='time(s)';
$language['YES']='Da';
$language['LAST_IP']='Ultimul IP';
$language['SHARE_ON_FB']='Adauga in facebook';
?>
