<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'order3' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '700007' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'd1c5#Zp$b;>aalFD-Vq(Zu`utEh!?q[KH14 ^NKt {sE-Ob[]OmfybmJo=R)5e#y');
define('SECURE_AUTH_KEY',  '{Y+ebd]e|IZDip`FWf7e451vk7cQRHXT}p>}DO1kb&XQMty,*.!rbWhsf>3|{oGz');
define('LOGGED_IN_KEY',    'Zb!_|m2^0 #() Z&u0qJzzMXBRgw oT rhgf@>1Krck~{rS3x|*Zf70>~!PaEq0-');
define('NONCE_KEY',        '`u.=]c6zevmwg%9rg*dQn(Q)?}hj-1_WO14dYry:_de4&WBY?*H+fby+{i^Pud~<');
define('AUTH_SALT',        ',]!/d5Fq_EAFI1+Yl*6Pyg.^-=7_-qWTb3#s|roc=Yo+%m^gLzQA&r#<X8a#d;)o');
define('SECURE_AUTH_SALT', '_XAr+|2?.M+#B9[:-~t;ykZA,S{j=iNU1]?r+=-767-|6h#Kr*{alJ, at$I~Qkq');
define('LOGGED_IN_SALT',   'U#~5Ruf&AlT$&=,P`:6Cq~fE8|BV`f6)zul4veS|nSMT$g|y;Mcz|_Hb+*y|uD{+');
define('NONCE_SALT',       's5<1;c+`X$$6%-#%y18M5gIeZRcg_@N|&B8JjTbj79nyhy:-v6!pr]S0}B-e!BJc');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
