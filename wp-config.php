<?php
/** 
 * A WordPress fő konfigurációs állománya
 *
 * Ebben a fájlban a következő beállításokat lehet megtenni: MySQL beállítások
 * tábla előtagok, titkos kulcsok, a WordPress nyelve, és ABSPATH.
 * További információ a fájl lehetséges opcióiról angolul itt található:
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php} 
 *  A MySQL beállításokat a szolgáltatónktól kell kérni.
 *
 * Ebből a fájlból készül el a telepítési folyamat közben a wp-config.php
 * állomány. Nem kötelező a webes telepítés használata, elegendő átnevezni 
 * "wp-config.php" névre, és kitölteni az értékeket.
 *
 * @package WordPress
 */

// ** MySQL beállítások - Ezeket a szolgálatótól lehet beszerezni ** //
/** Adatbázis neve */
define('DB_NAME', 'aromabot_aromatika');

/** MySQL felhasználónév */
define('DB_USER', 'aromabot_uj');


/** MySQL jelszó. */
define('DB_PASSWORD', 'aromatika');

/** MySQL  kiszolgáló neve */
define('DB_HOST', 'localhost');

/** Az adatbázis karakter kódolása */
define('DB_CHARSET', 'utf8');

/** Az adatbázis egybevetése */
define('DB_COLLATE', '');

/**#@+
 * Bejelentkezést tikosító kulcsok
 *
 * Változtassuk meg a lenti konstansok értékét egy-egy tetszóleges mondatra.
 * Generálhatunk is ilyen kulcsokat a {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org titkos kulcs szolgáltatásával}
 * Ezeknek a kulcsoknak a módosításával bármikor kiléptethető az összes bejelentkezett felhasználó az oldalról. 
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'PenRfZ=1.d|?G-1c~~M.,OE+<T<qRTdNN|m p.E@-*RG=bPitU5bV_Jjxn[NJ>%y');
define('SECURE_AUTH_KEY', '{})(lFSK CYh)DP~~tG3;B^9gwu]j1|ekss42#`f6=4fd_,ZhBguh`x5#T1M;$|`');
define('LOGGED_IN_KEY', 'SU>IS~05U2c</$D[G2|9,[$v|r8SPrk2y]=c5dj|Kl&l!Yf`T81R;,Ln:4eYDAb4');
define('NONCE_KEY', '~,<DpV-/e:dTp8@ZX{22O{-Y(4X:}C?HlsLfgYgtFi<NS=+sZbU@=?vwBY+ u2nK');
define('AUTH_SALT',        '&^S0;3NVQ)9*uCq)@?|HB:%;!`Q@Uj(]+fX.L_!jC]a&?}wV$kae@A`,(mgJ|;)&');
define('SECURE_AUTH_SALT', '++%m3M><tt#$NW%u+;cQ/JHg8xx<[wfET&~DI`xo.!cq+Vs aD&[tTQ?T:[O}<*p');
define('LOGGED_IN_SALT',   'yUN|&m{n=^MP<IGr1_yxH`??60iU+;U@65p`?tq7k9kbTHobxo#;~#V{3,:M2~Yp');
define('NONCE_SALT',       '@$0^E]~18t,yxl8hU%y4YU?}5Z8$QnVyU!,}lqD`Z>SC^>>$%ukM;W#S;p5MQPr-');

/**#@-*/

/**
 * WordPress-adatbázis tábla előtag.
 *
 * Több blogot is telepíthetünk egy adatbázisba, ha valamennyinek egyedi
 * előtagot adunk. Csak számokat, betűket és alulvonásokat adhatunk meg.
 */
$table_prefix  = 'wp_aromatika_';

/**
 * WordPress nyelve. Ahhoz, hogy magyarul működjön az oldal, ennek az értéknek
 * 'hu_HU'-nak kell lennie. Üresen hagyva az oldal angolul fog megjelenni.
 *
 * A beállított nyelv .mo fájljának telepítve kell lennie a wp-content/languages
 * könyvtárba, ahogyan ez a magyar telepítőben alapértelmezetten benne is van.
 *  
 * Például: be kell másolni a hu_HU.mo fájlokat a wp-content/languages könyvtárba, 
 * és be kell állítani a WPLANG konstanst 'hu_HU'-ra, 
 * hogy a magyar nyelvi támogatást bekapcsolásra kerüljön.
 */

define ('WPLANG', 'hu_HU');

/**
 * Fejlesztőknek: WordPress hibakereső mód.
 *
 * Engedélyezzük ezt a megjegyzések megjelenítéséhez a fejlesztés során. 
 * Erősen ajánlott, hogy a bővítmény- és sablonfejlesztők használják a WP_DEBUG
 * konstansot.
 */
define('WP_DEBUG', false);

/* Ennyi volt, kellemes blogolást! */

/** A WordPress könyvtár abszolút elérési útja. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Betöltjük a WordPress változókat és szükséges fájlokat. */
require_once(ABSPATH . 'wp-settings.php');
