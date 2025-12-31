<?php
// Значення з Docker environment
define('DB_NAME', getenv('WORDPRESS_DB_NAME'));
define('DB_USER', getenv('WORDPRESS_DB_USER'));
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
define('DB_HOST', getenv('WORDPRESS_DB_HOST'));
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');


// Визначаємо середовище
$env = getenv('WP_ENV') ?: 'local';
define('WP_DEBUG', $env === 'local');
define('WP_DEBUG_LOG', $env === 'local');
define('SAVEQUERIES', $env === 'local'); // Enable query logging for debug mode
define('WP_ENVIRONMENT_TYPE', $env); // Встановлюємо тип середовища для wp_get_environment_type()
define('WP_DEVELOPMENT_MODE', 'theme');

// Ключі (згенеруй свої на https://api.wordpress.org/secret-key/1.1/salt/)
define('AUTH_KEY',         'J%cOlT5}Sx3|#xQt9~0i)8X,HpfbD`R:8Uoh:HZD`o-zXR *jtyR#|KNUCoS1k?0');
define('SECURE_AUTH_KEY',  '3lD8 ,M:#gjPpm0z:-6_-aYbC=uF0)UFG+G/um?Yltvi;e76|rFg-st7u+9w%)_<');
define('LOGGED_IN_KEY',    'bK$!e~-c%<!h EX?31o,H`7hq$z9EjJt?Se9x%>-d3JoK6AB1^mKD8:V(_Q5ec0D');
define('NONCE_KEY',        '7!3|gC7<Upm:DnXg-Sh2ifQiF,7Eow/K0&%05RSEny9~L|{S$)cPR6pe&~<@B5s%');
define('AUTH_SALT',        '4Yi;dgQrA`+!C> Y/ntE?d)*<i HPo]M))ZW5|K1VPKVx?@*:>jVOv#Bx^b-5A-<');
define('SECURE_AUTH_SALT', '}AreR!WWFLFh$xh(n8%S@CW-<sd>Z{Shz)!1)q)B-6y{S5:fx]oqRTnhQg<&Y+CW');
define('LOGGED_IN_SALT',   's&sG(>eHTx,ZgQN[17C`ep]n;%G6_[/p`aaY>^W}0PWm5X)5 p]&]{V},zen8Hkt');
define('NONCE_SALT',       'xLmJ@g+-[{(c:nn?,!@yQ]!NFww@o8k1AVZr2c|7E*W/9|I-B00s+nv)?W^Ax.LJ');

$table_prefix = 'wp_';

if (! defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';