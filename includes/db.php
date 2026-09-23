<?php
/**
 * Mare & Monte Hotel & Bistro — Database Connection Helper
 * Production Database: maresite
 * Altinoluk / Edremit / Kaz Daglari
 */

if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
if (!defined('DB_NAME')) define('DB_NAME', 'maresite');
if (!defined('DB_USER')) define('DB_USER', 'maresite');
if (!defined('DB_PASS')) define('DB_PASS', 'Maresite1122334455..');
if (!defined('DB_CHARSET')) define('DB_CHARSET', 'utf8mb4');

/**
 * Get PDO Database Connection
 * Returns PDO instance or null if connection fails (graceful degradation)
 * 
 * @return PDO|null
 */
function getDB() {
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
    ];

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $e) {
        // Fallback for local development if production credentials fail
        if (DB_HOST === 'localhost' && (DB_USER !== 'root' || DB_PASS !== '')) {
            try {
                $fallbackDsn = 'mysql:host=localhost;dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
                $pdo = new PDO($fallbackDsn, 'root', '', $options);
                return $pdo;
            } catch (PDOException $e2) {
                error_log('DB Fallback Connection Error: ' . $e2->getMessage());
                return null;
            }
        }
        error_log('DB Connection Error: ' . $e->getMessage());
        return null;
    }
}
