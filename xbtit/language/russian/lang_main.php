<?php
global $users, $torrents, $seeds, $leechers, $percent;
// $language["rtl"]="rtl"; // if your language is  right to left then uncomment this line
$language["charset"]="UTF-8"; // uncomment this line with specific language charset if different than tracker's one
$language["ACCOUNT_CONFIRM"]="Подтверждение аккаунта на сайте $SITENAME .";
$language["ACCOUNT_CONGRATULATIONS"]="Поздравляем! Теперь Ваш аккаунт активирован!<br />Теперь Вы можете <a href=index.php?page=login>войти</a> на сайт используя свои данные.";
$language["ACCOUNT_CREATE"]="Создать аккаунт";
$language["ACCOUNT_DELETE"]="Удалить аккаунт";
$language["ACCOUNT_DETAILS"]="детали аккаунта";
$language["ACCOUNT_EDIT"]="Редактировать аккаунт";
$language["ACCOUNT_MGMT"]="Управление аккаунтом";
$language["ACCOUNT_MSG"]="Здравствуйте,\n\nЭто письмо было отправлено потому что кто то зарегистрировался на нашем сайте используя этот адресс E-mail.\nЕсли это были не Вы, то просто проигнорируйте это письмо, в другом случае Вам нужно активировать аккаунт \n\nС наилутшими пожеланиями, Администрация.";
$language["ACTION"]="Action";
$language["ACTIVATED"]="Активный";
$language["ACTIVE"]="Статус";
$language["ACTIVE_ONLY"]="Только Активные";
$language["ADD"]="Добавить";
$language["ADDED"]="Добавленн";
$language["ADMIN_CPANEL"]="Панель Администрации";
$language["ADMINCP_NOTES"]="Сдесь Вы можете контролировать все настройки трекера...";
$language["ALL"]="Все";
$language["ALL_SHOUT"]="Все сообщения";
$language["ANNOUNCE_URL"]="Анонс адресс трекера:";
$language["ANONYMOUS"]="Аноним";
$language["ANSWER"]="Ответ";
$language["AUTHOR"]="Автор";
$language["AVATAR_URL"]="Аватар (url): ";
$language["AVERAGE"]="Average";
$language["BACK"]="Назад";
$language["BAD_ID"]="Плохой ID!";
$language["BCK_USERCP"]="Назад в панель пользователя";
$language["BLOCK"]="Блок";
$language["BODY"]="Тело";
$language["BOTTOM"]="низ";
$language["BY"]="От";
$language["CANT_DELETE_ADMIN"]="Невозможно удалить другого админа!";
$language["CANT_DELETE_NEWS"]="Вы не можете удалять новости!";
$language["CANT_DELETE_TORRENT"]="Вы не можете удалить этот торрент!...";
$language["CANT_DELETE_USER"]="Вы не можете удалять пользователей!";
$language["CANT_DO_QUERY"]="Немогу выполнить SQL запрос - ";
$language["CANT_EDIT_TORR"]="Вы не можете редактировать торрент!";
$language["CANT_FIND_TORRENT"]="Не могу найти торрент файл!";
$language["CANT_READ_LANGUAGE"]="Не могу прочесть языковой файл!";
$language["CANT_SAVE_CONFIG"]="Не могу сохранить настройки в config.php";
$language["CANT_SAVE_LANGUAGE"]="Не могу сохранить языковой файл";
$language["CANT_WRITE_CONFIG"]="Внимание: не могу записывать в config.php!";
$language["CATCHUP"]="Отметить все как прочитано";
$language["CATEGORY"]="Кат.";
$language["CATEGORY_FULL"]="Категория";
$language["CENTER"]="центер";
$language["CHANGE_PID"]="Изменить PID";
$language["CHARACTERS"]="символы";
$language["CHOOSE"]="выберите";
$language["CHOOSE_ONE"]="выберите один";
$language["CLICK_HERE"]="нажмите здесь";
$language["CLOSE"]="закрыть";
$language["COMMENT"]="Ком.";
$language["COMMENT_1"]="Комментарий";
$language["COMMENT_PREVIEW"]="Просмотр Комментариев";
$language["COMMENTS"]="Комментарии";
$language["CONFIG_SAVED"]="Поздравляем, новые настройки были сохранены";
$language["COUNTRY"]="Страна";
$language["CURRENT_DETAILS"]="Детали";
$language["DATABASE_ERROR"]="Ошибка БД.";
$language["DATE"]="Дата";
$language["DB_ERROR_REQUEST"]="Ошибка БД. Немогу выполнить запрос.";
$language["DB_SETTINGS"]="Настройки БД";
$language["DEAD_ONLY"]="Только мертвые";
$language["DELETE"]="Удалить";
$language["DELETE_ALL_READED"]="Удалить все прочитаные";
$language["DELETE_CONFIRM"]="Вы уверены что хотите удалить/убрать это?";
$language["DELETE_TORRENT"]="Удалить торрент";
$language["DELFAILED"]="Удаление неудалось";
$language["DESCRIPTION"]="Описание";
$language["DONT_NEED_CHANGE"]="Вам не нужно изменять эти настройки!";
$language["DOWN"]="Дл";
$language["DOWNLOAD"]="Скачать";
$language["DOWNLOAD_TORRENT"]="Скачать торрент";
$language["DOWNLOADED"]="Скачано";
$language["EDIT"]="Редактировать";
$language["EDIT_LANGUAGE"]="Редактировать язык";
$language["EDIT_POST"]="Редактировать ответ";
$language["EDIT_TORRENT"]="Редактировать торрент";
$language["EMAIL"]="E-mail";
$language["EMAIL_SENT"]="E-mail был послан на указанный адресс.<br />нажмите на ссылку в письме для подтверждения регистрации.";
$language["EMAIL_VERIFY"]="e-mail аккаунт обновление на $SITENAME";
$language["EMAIL_VERIFY_BLOCK"]="Письмо для проверки выслано";
$language["EMAIL_VERIFY_MSG"]="Здравствуйте,\n\nЭто письмо было отправлено Вам т.к. Вы запросили изменение своего e-mail адресса в аккаунте. Нажмите на ссылку ниже для подтверждения изменения.\n\nС наилутшими пожеланиями, Администрация сайта.";
$language["EMAIL_VERIFY_SENT1"]="<br /><center>E-mail с подтверждением был выслан на:<br /><br /><strong><font color=\"red\">";
$language["EMAIL_VERIFY_SENT2"]="</font></strong><br /><br />Вам нужно будет пройдти по ссылке в нем для<br />обновления e-mail адресса. Вы должны получить e-mail в течении нескольких минут.<br /><br />";
$language["ERR_500"]="HTTP/1.0 500 Unauthorized access!";
$language["ERR_AVATAR_EXT"]="Извените, разрешены только gif,jpg,bmp или png";
$language["ERR_BAD_LAST_POST"]="";
$language["ERR_BAD_NEWS_ID"]="Плохой ID!";
$language["ERR_BODY_EMPTY"]="Тело не может быть пустым!";
$language["ERR_CANT_CONNECT"]="Не могу присоединиться к MySQL серверу";
$language["ERR_CANT_OPEN_DB"]="Не могу открыть БД";
$language["ERR_DB_ERR"]="Ошибка БД. Пожалуйста сообщите администрации об ошибке.";
$language["ERR_DELETE_POST"]="Удаление ответа. Sanity check: Вы собираетесь удалить ответ. Нажмите";
$language["ERR_DELETE_TOPIC"]="Удаление топика. Sanity check: Вы собираетесь удалить топик. Нажмите";
$language["ERR_EMAIL_ALREADY_EXISTS"]="Такой e-mail уже есть в нашей БД!";
$language["ERR_EMAIL_NOT_FOUND_1"]="E-mail адресс";
$language["ERR_EMAIL_NOT_FOUND_2"]="не найден в нашей БД.";
$language["ERR_ENTER_NEW_TITLE"]="Вы должны указать новый Титл!";
$language["ERR_FORUM_NOT_FOUND"]="Форум не найден";
$language["ERR_FORUM_UNKW_ACT"]="Ошибка форума: Неизвестное действие";
$language["ERR_GUEST_EXISTS"]="'Guest' зарегистрированное имя системы. Вы не можете зарегистрироваться как 'Guest'";
$language["ERR_IMAGE_CODE"]="Защитный код не верен";
$language["ERR_INS_TITLE_NEWS"]="Вы должны ввести Титл/название и саму новость";
$language["ERR_INV_NUM_FIELD"]="Неправильное числовое поле(я) от клиента";
$language["ERR_INVALID_CLIENT_EVENT"]="Неправильное действие= от клиента.";
$language["ERR_INVALID_INFO_BT_CLIENT"]="Неправильная информация получена от BitTorrent клиента";
$language["ERR_INVALID_IP_NUMB"]="Некоректный IP адресс.";
$language["ERR_LEVEL"]="Извените, Ваш уровень ";
$language["ERR_LEVEL_CANT_POST"]="Вам не разрешено отвечать в этом форуме.";
$language["ERR_LEVEL_CANT_VIEW"]="Вам не разрешено смотреть этот топик.";
$language["ERR_MISSING_DATA"]="Missing data!";
$language["ERR_MUST_BE_LOGGED_SHOUT"]="Вы должны войти для чата...";
$language["ERR_NO_BODY"]="В теле нет текста";
$language["ERR_NO_NEWS_ID"]="ID новостей не найдено!";
$language["ERR_NO_POST_WITH_ID"]="Нет ответов с ID  ";
$language["ERR_NO_SPACE"]="Ваше имя не должно иметь символов пробела, замените их на подчеркивание или:<br /><br />";
$language["ERR_NO_TOPIC_ID"]="ID топика не возвращено";
$language["ERR_NO_TOPIC_POST_ID"]="Нет топика ассоциированного с этим ID";
$language["ERR_NOT_AUTH"]="Вы не вошли!";
$language["ERR_NOT_FOUND"]="Не найдено...";
$language["ERR_NOT_PERMITED"]="Не разрешено";
$language["ERR_PASS_LENGTH"]="<font color=\"black\">Ваш пароль должен иметь минимум 4 символа.</font>";
$language["ERR_PASSWORD_INCORRECT"]="Пароль не верен";
$language["ERR_PERM_DENIED"]="Доступ закрыт";
$language["ERR_PID_NOT_FOUND"]="Пожалуйста скачайте торрент заново. PID система активирована";
$language["ERR_RETR_DATA"]="Ошибка получения данных!";
$language["ERR_SEND_EMAIL"]="Не могу отправить письмо. Пожалуйста сообщите Администрации об ошибке.";
$language["ERR_SERVER_LOAD"]="Нагрузка на сервер очень высока в данный момент. Пожалуйста подождите...";
$language["ERR_SPECIAL_CHAR"]="<font color=\"black\">Ваше имя пользователя не может иметь символы как:<br /><br /><font color=\"red\"><strong>* ? < > @ $ & % etc.</strong></font></font><br />";
$language["ERR_SQL_ERR"]="SQL Ошибка";
$language["ERR_SUBJECT"]="Вы должны ввести Тему.";
$language["ERR_TOPIC_ID_NA"]="Топик ID N/A";
$language["ERR_TOPIC_LOCKED"]="Топик заблокирован";
$language["ERR_TORRENT_IN_BROWSER"]="Этот файл для BitTorrent клиента.";
$language["ERR_UPDATE_USER"]="Не могу обновить данные пользователя. Пожалуйста сообщите Администрации об ошибке.";
$language["ERR_USER_ALREADY_EXISTS"]="Пользователь с таким ником уже существует!";
$language["ERR_USER_NOT_FOUND"]="Извените, Пользователь не найден";
$language["ERR_USER_NOT_USER"]="Вам не разрешено входить в панел других пользователей!";
$language["ERR_USERNAME_INCORRECT"]="Имя пользователя не верно";
$language["ERROR"]="Ошибка";
$language["ERROR_ID"]="ID Ошибки";
$language["FACOLTATIVE"]="не обязательно";
$language["FILE"]="Файл";
$language["FILE_CONTENTS"]="Данные файла";
$language["FILE_NAME"]="Имя Файла";
$language["FIND_USER"]="Найти пользователей";
$language["FINISHED"]="Закончено";
$language["FORUM"]="Форум";
$language["FORUM_ERROR"]="Инфо Форума";
$language["FORUM_MIN_CREATE"]="Мин. Класс для создания";
$language["FORUM_MIN_READ"]="Мин. Класс для чтения";
$language["FORUM_SEARCH"]="Поиск по Форумам";
$language["FORUM_N_TOPICS"]="N. Топиков";
$language["FORUM_N_POSTS"]="N. Ответов";
$language["FRM_DELETE"]="Удалить";
$language["FRM_LOGIN"]="Вход";
$language["FRM_PREVIEW"]="Просмотр";
$language["FRM_REFRESH"]="Обновить";
$language["FRM_RESET"]="Сброс";
$language["FRM_SEND"]="Послать";
$language["FRM_CONFIRM"]="Подтверждение";
$language["FRM_CANCEL"]="Отмена";
$language["FRM_CLEAN"]="Очистить";
$language["GLOBAL_SERVER_LOAD"]="Общая нагрузка сервера";
$language["GO"]="Go";
$language["GROUP"]="Группа";
$language["GUEST"]="Гость";
$language["GUESTS"]="Гости";
$language["HERE"]="здесь";
$language["HISTORY"]="История";
$language["HOME"]="Home";
$language["IF_YOU_ARE_SURE"]="если вы уверены.";
$language["IM_SURE"]="Я Уверен";
$language["IN"]="в";
$language["INF_CHANGED"]="Информация изменена!";
$language["INFINITE"]="Inf.";
$language["INFO_HASH"]="Info Hash";
$language["INS_NEW_PWD"]="Вставте Новый пароль!";
$language["INS_OLD_PWD"]="Вставте Старый пароль!";
$language["INSERT_DATA"]="Вставте всю нужную информацию для загрузки.";
$language["INSERT_NEW_FORUM"]="Вставить новый форум";
$language["INVALID_ID"]="Это не верный ID. Извените!";
$language["INVALID_INFO_HASH"]="Неверное info hash значение.";
$language["INVALID_PID"]="Неверный PID";
$language["INVALID_TORRENT"]="Ошибка трекера: неверный торрент";
$language["KEYWORDS"]="Keywords";
$language["LAST_EXTERNAL"]="Последнее обновление внешних торрентов было ";
$language["LAST_NEWS"]="Последние новости";
$language["LAST_POST_BY"]="Последный ответ от";
$language["LAST_SANITY"]="Последняя проверка Санити была ";
$language["LAST_TORRENTS"]="Последние торренты";
$language["LAST_UPDATE"]="Последнее обновление";
$language["LASTPOST"]="Последний ответ";
$language["LEECHERS"]="личеры";
$language["LEFT"]="слево";
$language["LOGIN"]="Вход";
$language["LOGOUT"]="Выход";
$language["MAILBOX"]="Маилбокс";
$language["MANAGE_NEWS"]="Управление новостями";
$language["MEMBER"]="Пользователь";
$language["MEMBERS"]="Пользователи";
$language["MEMBERS_LIST"]="Список пользователей";
$language["MINIMUM_100_DOWN"]="(минимум 100 MB скачано)";
$language["MINIMUM_5_LEECH"]="минимум 5 личеров, мертвые торренты не включены";
$language["MINIMUM_5_SEED"]="минимум 5 сидеров";
$language["MKTOR_INVALID_HASH"]="makeTorrent: Получен не верный hash";
$language["MNU_ADMINCP"]="Панель Админа";
$language["MNU_FORUM"]="Форум";
$language["MNU_INDEX"]="Индекс";
$language["MNU_MEMBERS"]="Пользователи";
$language["MNU_NEWS"]="Новости";
$language["MNU_STATS"]="Экстра статистика";
$language["MNU_TORRENT"]="Торренты";
$language["MNU_UCP_CHANGEPWD"]="Сменить пароль";
$language["MNU_UCP_HOME"]="Панель пользователей";
$language["MNU_UCP_IN"]="Ваш ящик ЛС";
$language["MNU_UCP_INFO"]="Изменить профиль";
$language["MNU_UCP_NEWPM"]="Новое ЛС";
$language["MNU_UCP_OUT"]="Исходящие ЛС";
$language["MNU_UCP_PM"]="Вашы ЛС";
$language["MNU_UPLOAD"]="Загрузка";
$language["MORE_SMILES"]="Больше Смайликов";
$language["MORE_THAN"]="Больше чем ";
$language["MORE_THAN_2"]="штук найдено, показаны первые";
$language["NA"]="N/A";
$language["NAME"]="Имя";
$language["NEED_COOKIES"]="Заметка: Кукисы должны быть включены.";
$language["NEW_COMMENT"]="Добавьте свой комментарий...";
$language["NEW_COMMENT_T"]="Новый комментарий";
$language["NEWS"]="новости";
$language["NEWS_DESCRIPTION"]="Новости:";
$language["NEWS_INSERT"]="Добавте свою новость";
$language["NEWS_PANEL"]="Панель новостей";
$language["NEWS_TITLE"]="Титул:";
$language["NEXT"]="Далее";
$language["NO"]="Нет";
$language["NO_BANNED_IPS"]="Нет забаненых IP адрессов";
$language["NO_COMMENTS"]="Комментариев нет...";
$language["NO_FORUMS"]="Форумов нет!";
$language["NO_MAIL"]="у Вас нет новых сообщений.";
$language["NO_MESSAGES"]="ЛС не найдены...";
$language["NO_NEWS"]="нет новостей";
$language["NO_PEERS"]="Пиров нет";
$language["NO_RECORDS"]="Извените, список пуст...";
$language["NO_TOPIC"]="Топики не найдены";
$language["NO_TORR_UP_USER"]="Торренты не загружены этим пользователей";
$language["NO_TORRENTS"]="Торрентов нет...";
$language["NO_USERS_FOUND"]="Пользователи не найдены!";
$language["NOBODY_ONLINE"]="Онлайн никого нет";
$language["NONE"]="Ничто";
$language["NOT_ADMIN_CP_ACCESS"]="Вы не можете заходить в панель Админов!";
$language["NOT_ALLOW_DOWN"]="не разрешено качать с";
$language["NOT_AUTH_DOWNLOAD"]="Вам не разрешено качать. Извените...";
$language["NOT_AUTH_VIEW_NEWS"]="Вам не разрешено смотреть новости!";
$language["NOT_AUTHORIZED"]="Вам не разрешено смотреть";
$language["NOT_AUTHORIZED_UPLOAD"]="Вам не разрешено загружать!";
$language["NOT_AVAILABLE"]="N/A";
$language["NOT_MAIL_IN_URL"]="Это не тот е-маил адресс который был в этом url";
$language["NOT_POSS_RESET_PID"]="Невозможно сбросить Ваш PID! <br />Обратитесь к Админам...";
$language["NOW_LOGIN"]="Сейчас Вам нужно будет войти";
$language["NUMBER_SHORT"]="#";
$language["OLD_PWD"]="Старый пароль";
$language["ONLY_REG_COMMENT"]="Только зарегистрированные пользователи могут комментировать!";
$language["OPT_DB_RES"]="Оптимизация БД";
$language["OPTION"]="Опции";
$language["PASS_RESET_CONF"]="подтверждение сброса пароля";
$language["PEER_CLIENT"]="Клиент";
$language["PEER_COUNTRY"]="Страна";
$language["PEER_ID"]="ID пира";
$language["PEER_LIST"]="Список пиров";
$language["PEER_PORT"]="Порт";
$language["PEER_PROGRESS"]="Прогресс";
$language["PEER_STATUS"]="Статус";
$language["PEERS"]="пиры";
$language["PEERS_DETAILS"]="Нажмите здесь чтобы увидеть детали пиров";
$language["PICTURE"]="Картинка";
$language["PID"]="PID";
$language["PLEASE_WAIT"]="Пожалуйста подождите...";
$language["PM"]="ЛС";
$language["POSITION"]="Позиция";
$language["POST_REPLY"]="Ответить";
$language["POSTED_BY"]="Ответил";
$language["POSTED_DATE"]="Отвечено";
$language["POSTS"]="Ответы";
$language["POSTS_PER_DAY"]="%s ответов в день";
$language["POSTS_PER_PAGE"]="Ответов на страницу";
$language["PREVIOUS"]="Пред.";
$language["PRIVATE_MSG"]="Личное Сообщение";
$language["PWD_CHANGED"]="Пароль изменен!";
$language["QUESTION"]="Вопрос";
$language["QUICK_JUMP"]="Быстрый переход";
$language["QUOTE"]="Квота";
$language["RANK"]="Ранк";
$language["RATIO"]="Рейтинг";
$language["REACHED_MAX_USERS"]="Максимальное кол-во пользователей достигнуто";
$language["READED"]="Читать";
$language["RECEIVER"]="Получатель";
$language["RECOVER_DESC"]="Используйте эту форму для сброса пароля.<br />(Вам будет выслано письмо для подтверждения.)";
$language["RECOVER_PWD"]="Востановление пароля";
$language["RECOVER_TITLE"]="Востановление имени пользователя или пароля";
$language["REDIRECT"]="если Ваш броузер не поддерживает яваскрипт, нажмите";
$language["REDOWNLOAD_TORR_FROM"]="Перекачайте торрент с";
$language["REGISTERED"]="Зарегистрирован";
$language["REGISTERED_EMAIL"]="Зарегистрированный e-mail";
$language["REMOVE"]="Убрать";
$language["REPLIES"]="Ответы";
$language["REPLY"]="Ответить";
$language["RESULT"]="Результат";
$language["RETRY"]="Повтор";
$language["RETURN_TORRENTS"]="обратно";
$language["REVERIFY_CONGRATS1"]="<center><br />Поздравляем, Ваш e-mail был подтвержден и изменен<br /><br /><strong>От: <font color=\"red\">";
$language["REVERIFY_CONGRATS2"]="</strong></font><br /><strong>Кому: <font color=\"red\">";
$language["REVERIFY_CONGRATS3"]="</strong></font><br /><br />";
$language["REVERIFY_FAILURE"]="<center><br /><strong><font color=\"red\"><u>Извените, но Ваш url не верен</u></strong></font><br /><br />Случайное число генерируется каждый раз когда Вы пытаетесь сменить e-mail.<br /><br /><strong>Пожалуйста подождите пока Вы не будете уверены что Вы получили последний адресс подтверждения.</strong><br /><br />";
$language["REVERIFY_MSG"]="Если Вы изменили e-mail адресс, Вам будет выслано письмо для подтверждения на Ваш новый e-mail.<br /><br /><font color=\"red\"><strong>E-mail адресс в Вашем профиле не будет изменен пока Вы не подтврдите новый адресс нажав на ссылку в письме.</strong></font>";
$language["RIGHT"]="справо";
$language["SEARCH"]="Искать";
$language["SEEDERS"]="сиды";
$language["SEEN"]="Был";
$language["SELECT"]="Выбрать...";
$language["SENDER"]="Отправитель";
$language["SENT_ERROR"]="Ошибка отправки";
$language["SHORT_C"]="С"; //Shortname for Completed
$language["SHORT_L"]="Л"; //Shortname for Leechers
$language["SHORT_S"]="С"; //Shortname for Seeders
$language["SHOUTBOX"]="Миничат";
$language["SIZE"]="Размер";
$language["SORRY"]="Извените";
$language["SORTID"]="Сорт. id";
$language["SPEED"]="Скорость";
$language["STICKY"]="Стики";
$language["SUB_CATEGORY"]="Под Категория";
$language["SUBJECT"]="Субъект";
$language["SUBJECT_MAX_CHAR"]="Субъект ограничен до ";
$language["SUC_POST_SUC_EDIT"]="Ответ был успешно изменен.";
$language["SUC_SEND_EMAIL"]="Письмо с подтверждением было выслано на";
$language["SUC_SEND_EMAIL_2"]="Вы получите письмо в течении нескольких минут.";
$language["SUCCESS"]="Удачно";
$language["SUMADD_BUG"]="Tracker bug calling summaryAdd";
$language["TABLE_NAME"]="Имя таблицы";
$language["TIMEZONE"]="Временная зона";
$language["TITLE"]="Титл";
$language["TOP"]="топ";
$language["TOP_10_ACTIVE"]="10 Самых активных торрентов";
$language["TOP_10_BEST_SEED"]="10 торрентов с лутшими сидами";
$language["TOP_10_BSPEED"]="10 торрентов с лутшей скоростью";
$language["TOP_10_DOWNLOAD"]="Топ 10 Качающих";
$language["TOP_10_SHARE"]="Топ 10 Лутших шареров";
$language["TOP_10_UPLOAD"]="Топ 10 Аплоадеров";
$language["TOP_10_WORST"]="Топ 10 худших шареров";
$language["TOP_10_WORST_SEED"]="10 торрентов с худшими сидами";
$language["TOP_10_WSPEED"]="10 торрентов с худшей скоростью";
$language["TOP_TORRENTS"]="Самые популярные торренты";
$language["TOPIC"]="Топик";
$language["TOPICS"]="Топики";
$language["TOPICS_PER_PAGE"]="Топиков на страницу";
$language["TORR_PEER_DETAILS"]="Детали пиров торрента";
$language["TORRENT"]="Торрент";
$language["TORRENT_ANONYMOUS"]="Послано анонимом";
$language["TORRENT_CHECK"]="Разрешите трекеру получить торрент файл и информацию из него.";
$language["TORRENT_DETAIL"]="Детали торрентов";
$language["TORRENT_FILE"]="Торрент файл";
$language["TORRENT_SEARCH"]="Поиск торрентов";
$language["TORRENT_STATUS"]="Статус";
$language["TORRENT_UPDATE"]="Обновление, пожалуйста подождите...";
$language["TORRENTS"]="торренты";
$language["TORRENTS_PER_PAGE"]="Торрентов на страницу";
$language["TRACK_DB_ERR"]="Трекер/БД ошибка. Детали в логе сайта.";
$language["TRACKER_INFO"]="$users пользователей, tracking $torrents торрентов ($seeds сидов e $leechers личеров, $percent%)";
$language["TRACKER_LOAD"]="Нагрузка Трекера";
$language["TRACKER_SETTINGS"]="Натсройки трекера";
$language["TRACKER_STATS"]="Статистика трекера";
$language["TRACKING"]="tracking";
$language["TRAFFIC"]="Трафик";
$language["UCP_NOTE_1"]="Здесь Вы можете конролировать свои папки ЛС, посылать сообщения,";
$language["UCP_NOTE_2"]="Контролировать и изменять настройки, и т.д. ...";
$language["UNAUTH_IP"]="Не разрешенный IP адресс.";
$language["UNKNOWN"]="неизвестно";
$language["UPDATE"]="обновить";
$language["UPFAILED"]="Загрузка не удалась";
$language["UPLOAD_IMAGE"]="Загрузка картинки";
$language["UPLOAD_LANGUAGE_FILE"]="Загрузка языкового файла";
$language["UPLOADED"]="Загружено";
$language["UPLOADER"]="Аплоадер";
$language["UPLOADS"]="Загрузок";
$language["URL"]="URL";
$language["USER_CP"]="Моя Панель";
$language["USER_CP_1"]="Панель пользователя";
$language["USER_DETAILS"]="Детали пользователя";
$language["USER_EMAIL"]="Существующий E-mail";
$language["USER_ID"]="ID пользователя";
$language["USER_JOINED"]="Зарегистрирован";
$language["USER_LASTACCESS"]="Последний вход";
$language["USER_LEVEL"]="Ранк";
$language["USER_LOCAL_TIME"]="Локальное время пользователя";
$language["USER_NAME"]="Пользователь";
$language["USER_PASS_RECOVER"]="Востановление Пароля/пользователя";
$language["USER_PWD"]="Пароль";
$language["USERS_SEARCH"]="Поиск Пользователей";
$language["VIEW_DETAILS"]="Просмотр деталей";
$language["VIEW_TOPIC"]="Просмотр топика";
$language["VIEW_UNREAD"]="Смотреть не прочитаные";
$language["VIEWS"]="Просмотров";
$language["VISITOR"]="Посетитель";
$language["VISITORS"]="Посетители";
$language["WAIT_ADMIN_VALID"]="Вам нужно подождать одобрение Администрации...";
$language["WARNING"]="Внимание!";
$language["WELCOME"]="Добро Пожаловать";
$language["WELCOME_ADMINCP"]="Добро Пожаловать В Панель Админа";
$language["WELCOME_BACK"]="Добро пожаловать назад";
$language["WELCOME_UCP"]="Добро пожаловать в Панель пользователя";
$language["WORD_AND"]="и";
$language["WORD_NEW"]="Новое";
$language["WROTE"]="написано";
$language["WT"]="WT";
$language["X_TIMES"]="раз";
$language["YES"]="Да";
$language["LAST_IP"]="Последний IP";
$language["FIRST_UNREAD"]="К первому не прочитаному посту";
$language["MODULE_UNACTIVE"]="Требуемый модуль не активен!";
$language["MODULE_NOT_PRESENT"]="Требуемый модуль не существует!";
$language["MODULE_LOAD_ERROR"]="Требуемый модуль похоже не верен!";
?>