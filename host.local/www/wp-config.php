<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'hotspot');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%@F;`1`I_H{dy:=O!d4GAT$h^)IAXV&S}c:;WE7q!%~.i}CGKgWv~s5|sp|I{Ry,');
define('SECURE_AUTH_KEY',  '*_l%n1A<im|K@W6HquQX:4fP9$G+vr<,mBJNZj),:BF7tcxSNNb9F$$i`QWT&mnA');
define('LOGGED_IN_KEY',    'F[bce:btx:2>/&ZE,?@C(Ckp??[FrVgrvmN5PPXbObrA}tS+ySpv-H31#-nFP7#$');
define('NONCE_KEY',        '_N$xi^S|+x5x)TVg.#5}y|CP<v:syhOS[phSroys+u]tlr_-n!2R@rd6ZL<b=lfb');
define('AUTH_SALT',        'RC<ojQtGDwyc-*[]$UT><a0U**%K?~y7{%-03A29Cd{iwOI9a:}a l0qJ7dtr43u');
define('SECURE_AUTH_SALT', 'ut?w(J>-:ph2ofB08-]z>g9wtp<v9Kt.:F y+u*dTn]JWT>pbttvDN5j}MRzR>t2');
define('LOGGED_IN_SALT',   'Ho}m*%`=_U.]K3%@Vyg1c%AUA$Suj@:T?Sh>}2.71L.*0!KQg&Tn]a1T[V?4D6 I');
define('NONCE_SALT',       '_9X^w}=9}uEWq0Glda]|mcB?CgV|%&9vZBI;_lV;q[frK}<$mX!>H41vahvs&8j]');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
