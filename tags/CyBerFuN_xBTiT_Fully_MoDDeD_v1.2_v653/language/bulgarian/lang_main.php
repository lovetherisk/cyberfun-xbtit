<?php
global $users, $torrents, $seeds, $leechers, $percent;
// $language["rtl"]="rtl"; // if your language is  right to left then uncomment this line
$language["charset"]="UTF-8"; // uncomment this line with specific language charset if different than tracker's one
$language["ACCOUNT_CONFIRM"]="Потвърждаване на регистрация в $SITENAME.";
$language["ACCOUNT_CONGRATULATIONS"]="Поздравления! Вашият акаунт е вече активен!<br />Сега можете да <a href=index.php?page=login>Влезнете</a> в сайта като използвате вашето име и парола.";$language["ACCOUNT_CREATE"]="Създай акаунт";
$language["ACCOUNT_DELETE"]="Изтрии акаунт";
$language["ACCOUNT_DETAILS"]="Детайли за акаунта";
$language["ACCOUNT_EDIT"]="Промени акаунт";
$language["ACCOUNT_MGMT"]="Промяна акаунт";
$language["ACCOUNT_MSG"]="Здравейте,\n\nТози email беше изпратен ,защото някой е регистрирал акаунт при нас с този email адрес.\nАко не сте били вие моля игнорирайте този email, или моля потвърдете \n\nПоздрави от екипа.";
$language["ACTION"]="Действие";
$language["ACTIVATED"]="Активен";
$language["ACTIVE"]="Статус";
$language["ACTIVE_ONLY"]="Активирай само";
$language["ADD"]="Добави";
$language["ADDED"]="Добавен";
$language["ADMIN_CPANEL"]="Администраторски панел";
$language["ADMINCP_NOTES"]="От тук можете да контролирате всички настройки по тракера...";
$language["ALL"]="Всички";
$language["ALL_SHOUT"]="Всички";
$language["ANNOUNCE_URL"]="Тракер аноунс url:";
$language["ANONYMOUS"]="Анонимен";
$language["ANSWER"]="Отговори";
$language["AUTHOR"]="Автор";
$language["AVATAR_URL"]="Аватар (url): ";
$language["AVERAGE"]="Средно";
$language["BACK"]="назад";
$language["BAD_ID"]="Грешно ID!";
$language["BCK_USERCP"]="Обратно към Потребителския панел";
$language["BLOCK"]="Блок";
$language["BODY"]="Тяло";
$language["BOTTOM"]="дъно";
$language["BY"]="От";
$language["CANT_DELETE_ADMIN"]="Невъзможно е да изтриете друг админ!";
$language["CANT_DELETE_NEWS"]="Нямате права да триете новини!";
$language["CANT_DELETE_TORRENT"]="Нямате права да изтриете този торент!...";
$language["CANT_DELETE_USER"]="Нямате права да изтриете този потребител!";
$language["CANT_DO_QUERY"]="не може да се изпълни SQL заявка - ";
$language["CANT_EDIT_TORR"]="Нямате права да променяте този торент!";
$language["CANT_FIND_TORRENT"]="Няма торент файла!";
$language["CANT_READ_LANGUAGE"]="невъзможно прочитане на езиковия файл!";
$language["CANT_SAVE_CONFIG"]="Невъзможно записване на настройките в config.php";
$language["CANT_SAVE_LANGUAGE"]="Невъзможно записване на езиковия файл";
$language["CANT_WRITE_CONFIG"]="Внимание: невъзможно записване в config.php!";
$language["CATCHUP"]="Маркирай всички като прочетени";
$language["CATEGORY"]="Кат.";
$language["CATEGORY_FULL"]="категория";
$language["CENTER"]="център";
$language["CHANGE_PID"]="Смени PID";
$language["CHARACTERS"]="знаци";
$language["CHOOSE"]="Избери";
$language["CHOOSE_ONE"]="избери един";
$language["CLICK_HERE"]="цъкни тук";
$language["CLOSE"]="затвори";
$language["COMMENT"]="Ком.";
$language["COMMENT_1"]="Коментар";
$language["COMMENT_PREVIEW"]="Преглад на коментара";
$language["COMMENTS"]="Коментари";
$language["CONFIG_SAVED"]="Поздравления, новата конфигурация беше записана";
$language["COUNTRY"]="Държава";
$language["CURRENT_DETAILS"]="Сегашни детайли";
$language["DATABASE_ERROR"]="Грешка в базата данни.";
$language["DATE"]="Дата";
$language["DB_ERROR_REQUEST"]="Грешка в базата данни. Не може да се изпълни заявката.";
$language["DB_SETTINGS"]="Настройки на базата данни";
$language["DEAD_ONLY"]="Само неактивни";
$language["DELETE"]="Изтрии";
$language["DELETE_ALL_READED"]="Изтрии всички прочетени";
$language["DELETE_CONFIRM"]="Сигурни ли сте че искате да изтриете/премахнете това?";
$language["DELETE_TORRENT"]="Изтрии торент";
$language["DELFAILED"]="Грешка при изтриване";
$language["DESCRIPTION"]="Описание";
$language["DONT_NEED_CHANGE"]="Няма нужда да променяте тези настройки!";
$language["DOWN"]="ДЛ";
$language["DOWNLOAD"]="Даунлоуд";
$language["DOWNLOAD_TORRENT"]="Свали Торент";
$language["DOWNLOADED"]="Свален";
$language["EDIT"]="Промени";
$language["EDIT_LANGUAGE"]="Промени езика";
$language["EDIT_POST"]="Промени поста";
$language["EDIT_TORRENT"]="Промени Торент";
$language["EMAIL"]="Email";
$language["EMAIL_SENT"]="Беше изтпратено писмо на вашия email адрес<br />кликнете на линка за да потвърдите.";
$language["EMAIL_VERIFY"]="email акаунт променен в $SITENAME";
$language["EMAIL_VERIFY_BLOCK"]="Потвърдително писмо изпратено";
$language["EMAIL_VERIFY_MSG"]="Здравейте,\n\nТова писмо ви е изпратено във връзка с искането ви да смените email-a си, моля кликнете отдолу за да потвърдите.\n\nПоздрави от екипа.";
$language["EMAIL_VERIFY_SENT1"]="<br /><center>Потвърдително писмо беше изпратено на:<br /><br /><strong><font color=\"red\">";
$language["EMAIL_VERIFY_SENT2"]="</font></strong><br /><br />Ще трябва да кликнете на линка в  email-а за да<br />промените email адреса си. Еmail-ът трябва да престигне но 10 минути<br />(принципно веднага) въпреки това email-ът може да бъде маркиран като СПАМ<br />затова моля проверете и СПАМ секцията в пощата си ако не получите писмо.<br /><br />";
$language["ERR_500"]="HTTP/1.0 500 Неразрешен достъп!";
$language["ERR_AVATAR_EXT"]="Разрешено качване само на gif,jpg,bmp или png";
$language["ERR_BAD_LAST_POST"]="";
$language["ERR_BAD_NEWS_ID"]="Грешно ID на новината!";
$language["ERR_BODY_EMPTY"]="Тялото не може да бъде празно!";
$language["ERR_CANT_CONNECT"]="Не мога да се свържа с локалния MySQL сързър";
$language["ERR_CANT_OPEN_DB"]="Не мога да отворя базата данни";
$language["ERR_DB_ERR"]="Грешка в базата данни. Моля свържете се с някой от екипа за това.";
$language["ERR_DELETE_POST"]="Изтрии поста. Проверка: Искате да изтриете поста. Клик";
$language["ERR_DELETE_TOPIC"]="Изтрии тема. Проверка: Искате да изтриете тема. Клик";
$language["ERR_EMAIL_ALREADY_EXISTS"]="Тази Email вече съществува в нашата база!";
$language["ERR_EMAIL_NOT_FOUND_1"]="Еmail адрес";
$language["ERR_EMAIL_NOT_FOUND_2"]="не беше намерен в базата данни.";
$language["ERR_ENTER_NEW_TITLE"]="Трябва да въведете ново заглавие!";
$language["ERR_FORUM_NOT_FOUND"]="Форумът не е открит";
$language["ERR_FORUM_UNKW_ACT"]="Форумна грешка: непознато действие";
$language["ERR_GUEST_EXISTS"]="'Гост' е запазено име. не може да се регистрирате като 'Гост'";
$language["ERR_IMAGE_CODE"]="Кода за сигурност не съвпада";
$language["ERR_INS_TITLE_NEWS"]="Трябва да въведете двете заглавие и новина";
$language["ERR_INV_NUM_FIELD"]="Invalid numerical field(s) from client";
$language["ERR_INVALID_CLIENT_EVENT"]="Invalid event= from client.";
$language["ERR_INVALID_INFO_BT_CLIENT"]="невалидна информация приета от BitTorrent клиента";
$language["ERR_INVALID_IP_NUMB"]="Невалиден IP адрес. Трябва да бъде стандартен с точки (hostnames не са позволени)";
$language["ERR_LEVEL"]="Съжелявам, вашият левел ";
$language["ERR_LEVEL_CANT_POST"]="Нямате права да поствате във този форум.";
$language["ERR_LEVEL_CANT_VIEW"]="Нямате права за гледане на темата.";
$language["ERR_MISSING_DATA"]="Липсваща информация!";
$language["ERR_MUST_BE_LOGGED_SHOUT"]="Трябва да сте логнат за да чатите...";
$language["ERR_NO_BODY"]="Няма текст в тялото";
$language["ERR_NO_NEWS_ID"]="ID-то на новината не е открито!";
$language["ERR_NO_POST_WITH_ID"]="Няма постове с ID ";
$language["ERR_NO_SPACE"]="Името ви не може да съдържа празно място, моля заменете го с друго като:<br /><br />";
$language["ERR_NO_TOPIC_ID"]="Грешка в ID на темата";
$language["ERR_NO_TOPIC_POST_ID"]="Няма теми свързани с това пост ID";
$language["ERR_NOT_AUTH"]="Нямате разрешение!";
$language["ERR_NOT_FOUND"]="Не е открит...";
$language["ERR_NOT_PERMITED"]="Нямате позволение";
$language["ERR_PASS_LENGTH"]="<font color=\"black\">Вашата парола трябва да бъде от минимум 4 символа.</font>";
$language["ERR_PASSWORD_INCORRECT"]="Грешна парола";
$language["ERR_PERM_DENIED"]="Достъп отказан";
$language["ERR_PID_NOT_FOUND"]="Моля свалете торента отново. PID системата е активирана а в торента тя не фигурира";
$language["ERR_RETR_DATA"]="Грешка при получаване на информация!";
$language["ERR_SEND_EMAIL"]="Невъзможно изпращане на писмото. Моля свържете се с някой от екипа за това.";
$language["ERR_SERVER_LOAD"]="Натоварването на сървъра е прекалено голямо. Моля изчакайте...";
$language["ERR_SPECIAL_CHAR"]="<font color=\"black\">Името ви не може да съдържа специялни символи като:<br /><br /><font color=\"red\"><strong>* ? < > @ $ & % etc.</strong></font></font><br />";
$language["ERR_SQL_ERR"]="SQL Грешка";
$language["ERR_SUBJECT"]="Трябва да въведете тема.";
$language["ERR_TOPIC_ID_NA"]="ID-то на темата е неизвестно";
$language["ERR_TOPIC_LOCKED"]="Темата е Заключена";
$language["ERR_TORRENT_IN_BROWSER"]="Този файл е за BitTorrent клиенти.";
$language["ERR_UPDATE_USER"]="Невъзможна промяна на потребителската информация. Моля свържете се с някой от екипа за това.";
$language["ERR_USER_ALREADY_EXISTS"]="Потребителското име вече съществува!";
$language["ERR_USER_NOT_FOUND"]="Няма такъв потребител";
$language["ERR_USER_NOT_USER"]="Нямате права да преглеждате профила на други потребители!";
$language["ERR_USERNAME_INCORRECT"]="Грешно потребителско име";
$language["ERROR"]="Грешка";
$language["ERROR_ID"]="Error ID";
$language["FACOLTATIVE"]="незадължително";
$language["FILE"]="Файл";
$language["FILE_CONTENTS"]="Съдържание на файла";
$language["FILE_NAME"]="Име на файла";
$language["FIND_USER"]="Намери потребител";
$language["FINISHED"]="Завършен";
$language["FORUM"]="Форум";
$language["FORUM_ERROR"]="форум грешка";
$language["FORUM_INFO"]="форум инфо";
$language["FORUM_MIN_CREATE"]="Мин клас създаване";
$language["FORUM_MIN_READ"]="Мин клас четене";
$language["FORUM_SEARCH"]="Форум търсене";
$language["FORUM_N_TOPICS"]="Н. Теми";
$language["FORUM_N_POSTS"]="Н. постове";
$language["FRM_DELETE"]="Изтрии";
$language["FRM_LOGIN"]="Вход";
$language["FRM_PREVIEW"]="Преглед";
$language["FRM_REFRESH"]="Обнови";
$language["FRM_RESET"]="Изчисти";
$language["FRM_SEND"]="Изпрати";
$language["FRM_CONFIRM"]="Потвърди";
$language["FRM_CANCEL"]="Отмени";
$language["FRM_CLEAN"]="Изчисти";
$language["GLOBAL_SERVER_LOAD"]="Натоварване на сървъра (Всички сайтове на сървъра)";
$language["GO"]="давай";
$language["GROUP"]="Група";
$language["GUEST"]="Гост";
$language["GUESTS"]="Гости";
$language["HERE"]="тук";
$language["HISTORY"]="История";
$language["HOME"]="Начало";
$language["IF_YOU_ARE_SURE"]="ако сте сигурни.";
$language["IM_SURE"]="сигурен съм";
$language["IN"]="в";
$language["INF_CHANGED"]="Сменена информация!";
$language["INFINITE"]="Безкр.";
$language["INFO_HASH"]="Хаш";
$language["INS_NEW_PWD"]="Въведете нова парола!";
$language["INS_OLD_PWD"]="Въведете старата парола!";
$language["INSERT_DATA"]="Въведете всичката нужна информация за качването.";
$language["INSERT_NEW_FORUM"]="Създай нов форум";
$language["INVALID_ID"]="Не е валиден ID. съжелявам!";
$language["INVALID_INFO_HASH"]="Невалиден хаш.";
$language["INVALID_PID"]="Невалиден PID";
$language["INVALID_TORRENT"]="Тракер грешка: невалиден торент";
$language["KEYWORDS"]="Ключови думи";
$language["LAST_EXTERNAL"]="Последната проверка на външните торенти беше на ";
$language["LAST_NEWS"]="Последни новини";
$language["LAST_POST_BY"]="Последен пост на";
$language["LAST_SANITY"]="Последната проверка беше на ";
$language["LAST_TORRENTS"]="Последните торенти";
$language["LAST_UPDATE"]="Последен ъпдейт";
$language["LASTPOST"]="Последен пост";
$language["LEECHERS"]="Лийчъри";
$language["LEFT"]="ляво";
$language["LOGIN"]="Вход";
$language["LOGOUT"]="Излез";
$language["MAILBOX"]="Поща";
$language["MANAGE_NEWS"]="Настойка на новините";
$language["MEMBER"]="Потребител";
$language["MEMBERS"]="Потребители";
$language["MEMBERS_LIST"]="Списък с потребителите";
$language["MINIMUM_100_DOWN"]="(с минимум 100 МБ свалено)";
$language["MINIMUM_5_LEECH"]="с минимум 5 лийчъри, не показва неактивни торенти";
$language["MINIMUM_5_SEED"]="с минимум 5 сийдъри";
$language["MKTOR_INVALID_HASH"]="Грешен Хаш";
$language["MNU_ADMINCP"]="Админ Панел";
$language["MNU_FORUM"]="Форум";
$language["MNU_INDEX"]="Начало";
$language["MNU_MEMBERS"]="Потребители";
$language["MNU_NEWS"]="Новини";
$language["MNU_STATS"]="Статистики";
$language["MNU_TORRENT"]="Торенти";
$language["MNU_UCP_CHANGEPWD"]="Смени парола";
$language["MNU_UCP_HOME"]="Потребителски панел";
$language["MNU_UCP_IN"]="Вашите входящи ЛС-та";
$language["MNU_UCP_INFO"]="Промени профил";
$language["MNU_UCP_NEWPM"]="Ново ЛС";
$language["MNU_UCP_OUT"]="Вашите изходящи ЛС-та";
$language["MNU_UCP_PM"]="Вашата ЛС кутия";
$language["MNU_UPLOAD"]="Качи";
$language["MORE_SMILES"]="Още Емотикони";
$language["MORE_THAN"]="Повече от ";
$language["MORE_THAN_2"]="намерени, показване на първите";
$language["NA"]="N/A";
$language["NAME"]="Име";
$language["NEED_COOKIES"]="Бележка: Трябват ви включени cookies за да влезнете.";
$language["NEW_COMMENT"]="Пуснете коментар";
$language["NEW_COMMENT_T"]="Нов коментар";
$language["NEWS"]="новината";
$language["NEWS_DESCRIPTION"]="Новини:";
$language["NEWS_INSERT"]="Добавете новина";
$language["NEWS_PANEL"]="новинарски панел";
$language["NEWS_TITLE"]="Заглавие:";
$language["NEXT"]="Следващ";
$language["NO"]="Не";
$language["NO_BANNED_IPS"]="Няма баннати IP-та";
$language["NO_COMMENTS"]="Все още няма коментари...";
$language["NO_FORUMS"]="няма форуми!";
$language["NO_MAIL"]="нямате нови съобщения.";
$language["NO_MESSAGES"]="Няма намерени ЛС-та...";
$language["NO_NEWS"]="няма новини";
$language["NO_PEERS"]="Няма пиъри";
$language["NO_RECORDS"]="Списъкът е празен...";
$language["NO_TOPIC"]="Няма намерени теми";
$language["NO_TORR_UP_USER"]="Потребителя няма качени торенти";
$language["NO_TORRENTS"]="Няма торенти...";
$language["NO_USERS_FOUND"]="Няма потребители!";
$language["NOBODY_ONLINE"]="Никой онлайн";
$language["NONE"]="Никой";
$language["NOT_ADMIN_CP_ACCESS"]="Нямате права з админ панела!";
$language["NOT_ALLOW_DOWN"]="няма разрешение за даунлоуд от";
$language["NOT_AUTH_DOWNLOAD"]="Нямате права да сваляте.";
$language["NOT_AUTH_VIEW_NEWS"]="Нямате права да преглеждате новините!";
$language["NOT_AUTHORIZED"]="Нямате права да прежлеждате";
$language["NOT_AUTHORIZED_UPLOAD"]="Нямате права за ъплоуд!";
$language["NOT_AVAILABLE"]="N/A";
$language["NOT_MAIL_IN_URL"]="това не е email който беше в този url";
$language["NOT_POSS_RESET_PID"]="Не е възможна промяна на PID-а ви! <br />Свържете се с екипа...";
$language["NOW_LOGIN"]="Вече можете да влезнете";
$language["NUMBER_SHORT"]="#";
$language["OLD_PWD"]="Стара парола";
$language["ONLY_REG_COMMENT"]="Само регистрирани могат да пускат коментари!";
$language["OPT_DB_RES"]="Оптимизиране на базата данни";
$language["OPTION"]="Опция";
$language["PASS_RESET_CONF"]="потвърждение за рестартиране на парола";
$language["PEER_CLIENT"]="Клиент";
$language["PEER_COUNTRY"]="Държава";
$language["PEER_ID"]="Пиър ID";
$language["PEER_LIST"]="Списък с пиъри";
$language["PEER_PORT"]="Порт";
$language["PEER_PROGRESS"]="Прогрес";
$language["PEER_STATUS"]="Статус";
$language["PEERS"]="Пиъри";
$language["PEERS_DETAILS"]="Кликнете тук за пиърите";
$language["PICTURE"]="Картина";
$language["PID"]="PID";
$language["PLEASE_WAIT"]="Моля изчакайте...";
$language["PM"]="ЛС";
$language["POSITION"]="Позиция";
$language["POST_REPLY"]="Отговори";
$language["POSTED_BY"]="Пуснато от";
$language["POSTED_DATE"]="Постнато на";
$language["POSTS"]="Постове";
$language["POSTS_PER_DAY"]="%s постове за ден";
$language["POSTS_PER_PAGE"]="Постове на страница";
$language["PREVIOUS"]="Пред.";
$language["PRIVATE_MSG"]="Лични Съобщения";
$language["PWD_CHANGED"]="Парола сменена!";
$language["QUESTION"]="Въпрос";
$language["QUICK_JUMP"]="Бърз скок";
$language["QUOTE"]="Цитирай";
$language["RANK"]="Ранк";
$language["RATIO"]="Коефициент";
$language["REACHED_MAX_USERS"]="Максимален брой потребители";
$language["READED"]="Прочети";
$language["RECEIVER"]="Получател";
$language["RECOVER_DESC"]="Попълнете формата отдолу за рестартиране на паролата и да ви бъде изпратена обратно.<br />(Трябва да отговорите на потвърдителния email.)";
$language["RECOVER_PWD"]="Забравена парола";
$language["RECOVER_TITLE"]="Забравено име или парола";
$language["REDIRECT"]="ако браузарът ви няма включен javascript, клик";
$language["REDOWNLOAD_TORR_FROM"]="Свалете торента отново от";
$language["REGISTERED"]="Регистриран";
$language["REGISTERED_EMAIL"]="Регистриран email";
$language["REMOVE"]="Премахни";
$language["REPLIES"]="Отговори";
$language["REPLY"]="Отговор";
$language["RESULT"]="Резултат";
$language["RETRY"]="Опитай отново";
$language["RETURN_TORRENTS"]="Обратно към торентите";
$language["REVERIFY_CONGRATS1"]="<center><br />Поздравления, вашият email беше потвърден и успешно сменен<br /><br /><strong>От: <font color=\"red\">";
$language["REVERIFY_CONGRATS2"]="</strong></font><br /><strong>До: <font color=\"red\">";
$language["REVERIFY_CONGRATS3"]="</strong></font><br /><br />";
$language["REVERIFY_FAILURE"]="<center><br /><strong><font color=\"red\"><u>Този url не е валиден</u></strong></font><br /><br />Произволно число се генерира всеки път като опитате да смените email-а си така че<br />ако виждате това съобщение най-вероятно се опитвате да смените email-а си<br />повече от веднъж и използвате стария url.<br /><br /><strong>Моля изчакайте докато сте сигурни че не сте получили <br />потвърдителен email преди да опитвате да смените вашия email отново.</strong><br /><br />";
$language["REVERIFY_MSG"]="Ако се опитвате да смените вашия email адрес ще ви бъде изпратено писмо за потвърждение.<br /><br /><font color=\"red\"><strong>Еmail адресът няма да бъде сменен докато не го потвърдите.</strong></font>";
$language["RIGHT"]="дясно";
$language["SEARCH"]="Търси";
$language["SEEDERS"]="Сийдъри";
$language["SEEN"]="Виждан";
$language["SELECT"]="Избери...";
$language["SENDER"]="Изпращач";
$language["SENT_ERROR"]="Грешка при изпращане";
$language["SHORT_C"]="З"; //Shortname for Completed
$language["SHORT_L"]="Л"; //Shortname for Leechers
$language["SHORT_S"]="С"; //Shortname for Seeders
$language["SHOUTBOX"]="Чат";
$language["SIZE"]="Големина";
$language["SORRY"]="Извинявайте";
$language["SORTID"]="Сортировка";
$language["SPEED"]="Скорост";
$language["STICKY"]="Важна";
$language["SUB_CATEGORY"]="Суб-Категория";
$language["SUBJECT"]="Тема";
$language["SUBJECT_MAX_CHAR"]="Темата е намалена до ";
$language["SUC_POST_SUC_EDIT"]="Постът беше промене успешно.";
$language["SUC_SEND_EMAIL"]="Потвърдителен emdil ви беше изпратен";
$language["SUC_SEND_EMAIL_2"]="Моля изчакайте няколко минути докато получите email-а.";
$language["SUCCESS"]="Успех";
$language["SUMADD_BUG"]="Tracker bug calling summaryAdd";
$language["TABLE_NAME"]="Име на таблицата";
$language["TIMEZONE"]="Времева зона";
$language["TITLE"]="Заглавие";
$language["TOP"]="отгоре";
$language["TOP_10_ACTIVE"]="10 Най-активни торента";
$language["TOP_10_BEST_SEED"]="10 торента с най-много сийдъри";
$language["TOP_10_BSPEED"]="10 торента с най-бърза скорост";
$language["TOP_10_DOWNLOAD"]="Топ 10 Даунлоудери";
$language["TOP_10_SHARE"]="Топ 10 Най-Добри Потребители";
$language["TOP_10_UPLOAD"]="Топ 10 Ъплоудери";
$language["TOP_10_WORST"]="Топ 10 Най-Лоши Потребители";
$language["TOP_10_WORST_SEED"]="10 Torrents Worst Seeders";
$language["TOP_10_WSPEED"]="10 торента с най-бавна скорост";
$language["TOP_TORRENTS"]="Най-популярни торенти";
$language["TOPIC"]="Тема";
$language["TOPICS"]="Tеми";
$language["TOPICS_PER_PAGE"]="Tеми на страница";
$language["TORR_PEER_DETAILS"]="Детайли за пиърите";
$language["TORRENT"]="Торент";
$language["TORRENT_ANONYMOUS"]="Изпрати като анонимен";
$language["TORRENT_CHECK"]="Позволи на тракера да получава и използва информация от торент файла.";
$language["TORRENT_DETAIL"]="Торент детайли";
$language["TORRENT_FILE"]="Tорент файл";
$language["TORRENT_SEARCH"]="търси торенти";
$language["TORRENT_STATUS"]="Статус";
$language["TORRENT_UPDATE"]="Ъпдейтване, моля изчакайте...";
$language["TORRENTS"]="Торенти";
$language["TORRENTS_PER_PAGE"]="Торенти на страница";
$language["TRACK_DB_ERR"]="Тракер/база данни грешка. Детайлите са в лога за грешки.";
$language["TRACKER_INFO"]="$users потребители, следващи $torrents торенти ($seeds Сийдъри e $leechers Лийчъри, $percent%)";
$language["TRACKER_LOAD"]="Натоварване на тракера";
$language["TRACKER_SETTINGS"]="Настройки на тракера";
$language["TRACKER_STATS"]="Статистика на тракера";
$language["TRACKING"]="Проследяване";
$language["TRAFFIC"]="Трафик";
$language["UCP_NOTE_1"]="Тук можете да контролирате входящата си кутия, пишете ЛС-та на други потребители,";
$language["UCP_NOTE_2"]="Контролирате и променяте вашите настройки, etc...";
$language["UNAUTH_IP"]="Неупълномощен IP адрес.";
$language["UNKNOWN"]="неизвестен";
$language["UPDATE"]="Ъпдейт";
$language["UPFAILED"]="Ъплоудване прекратено";
$language["UPLOAD_IMAGE"]="качи Картина";
$language["UPLOAD_LANGUAGE_FILE"]="Качи Езиков Файл";
$language["UPLOADED"]="Качен";
$language["UPLOADER"]="Ъплоудер";
$language["UPLOADS"]="Ъплоудвания";
$language["URL"]="URL";
$language["USER_CP"]="Промени Акаунт";
$language["USER_CP_1"]="Потребителски Контролен Панел";
$language["USER_DETAILS"]="Потребителски детайли";
$language["USER_EMAIL"]="Валиден email";
$language["USER_ID"]="потребителско ID";
$language["USER_JOINED"]="Присъединил се на";
$language["USER_LASTACCESS"]="Последно влязъл";
$language["USER_LEVEL"]="Ранк";
$language["USER_LOCAL_TIME"]="Локално време";
$language["USER_NAME"]="Потребител";
$language["USER_PASS_RECOVER"]="Парола/потребител възтановяване";
$language["USER_PWD"]="Парола";
$language["USERS_SEARCH"]="Търсене на потребители";
$language["VIEW_DETAILS"]="Прегледай детайли";
$language["VIEW_TOPIC"]="Прегледай Тема";
$language["VIEW_UNREAD"]="Прегледай непрочетените";
$language["VIEWS"]="Гледания";
$language["VISITOR"]="Посетител";
$language["VISITORS"]="Посетители";
$language["WAIT_ADMIN_VALID"]="Трябва да изчакате за одобрение...";
$language["WARNING"]="Внимание!";
$language["WELCOME"]="Здравейте";
$language["WELCOME_ADMINCP"]="Добре дошли в Администраторския Панел";
$language["WELCOME_BACK"]="Здравейте отново";
$language["WELCOME_UCP"]="Добре дошли във Потребителския Панел";
$language["WORD_AND"]="и";
$language["WORD_NEW"]="нов";
$language["WROTE"]="написа";
$language["WT"]="WT";
$language["X_TIMES"]="пъти";
$language["YES"]="Да";
$language["LAST_IP"]="Последно IP";
$language["FIRST_UNREAD"]="Отиди на пъврия непрочетен пост";
$language["MODULE_UNACTIVE"]="Поискания модур е неактивен!";
$language["MODULE_NOT_PRESENT"]="Поискания модул не съществива!";
$language["MODULE_LOAD_ERROR"]="поискания модул изглежда е грешен!";

$language["SIGNATURE"]="Подпис";
?>