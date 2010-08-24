<?php

/**
 * Description of Logger
 *
 * @author Vanessa
 */
class Logger {

    private static $configFile = "/../conf/log.cfg.php";

    private static $handle;

    private static $baseFileName;
    private static $path;
    private static $adminMail;
    private static $adminMailSubject;
    private static $sendErrorMail;
    private static $sendWarnMail;
    private static $sendInfoMail;
    private static $sizePerLog;

    private static function openHandle() {

        self::loadConfigurations();

        // open file for write
        $fileName = self::$baseFileName.date("Ym");
        $filePath = self::$path.$fileName;
        $filePathTested = $filePath;

        while (file_exists($filePathTested)
            && filesize($filePathTested) > self::$sizePerLog) {
            
            $i++;
            $filePathTested = $filePath."_".$i;
        }

        self::$handle = fopen($filePathTested, "a+");
    }

    private static function loadConfigurations() {
        // include log configuration file
        require_once(ROOT.self::$configFile);

        // get the log data
        self::$baseFileName         = $log["baseFileName"];
        self::$path                 = $log["path"];
        self::$adminMail            = $log["adminMail"];
        self::$adminMailSubject     = $log["adminMailSubject"];
        self::$sendErrorMail        = $log["sendErrorMail"];
        self::$sendWarnMail         = $log["sendWarnMail"];
        self::$sendInfoMail         = $log["sendInfoMail"];
        self::$sizePerLog           = $log["sizePerLog"];
    }

    private static function log($msg, $type, $mailAdmin) {

        if (!self::$handle) {
            self::openHandle();
        }

        if (self::$handle) {

            // get the user information
            //if ($type == "ERROR" || $type == "WARN") {

                $ip             = $_SERVER["REMOTE_ADDR"];
                $host           = $_SERVER["REMOTE_HOST"];
                $port           = $_SERVER["REMOTE_PORT"];
                $userAgent      = $_SERVER["HTTP_USER_AGENT"];

                $userInfo = "{userInfo = ".$ip." (".$host.":".$port.") with user agent ".$userAgent."}";
            //}

            $line = date("Y-m-d H:i:s")." ".$type."=> ".$msg." ".$userInfo."\r\n";

            // Write information in the file
            fwrite(self::$handle, $line);

            if ($mailAdmin == "true") {
                self::mailAdmin($line);
            }
        }
    }

    public static function logError($msg, $mailAdmin = "") {
        if (!$mailAdmin) $mailAdmin = self::$sendErrorMail;

        self::log($msg, "ERROR", $mailAdmin);
    }

    public static function logWarn($msg, $mailAdmin = "") {
        if (!$mailAdmin) $mailAdmin = self::$sendWarnMail;

        self::log($msg, "WARN", $mailAdmin);
    }

    public static function logInfo($msg, $mailAdmin = "") {

        if (!$mailAdmin) $mailAdmin = self::$sendInfoMail;

        self::log($msg, "INFO", $mailAdmin);
    }

    public static function logDebug($msg, $mailAdmin = "") {

        self::log($msg, "DEBUG", $mailAdmin);
    }

    public static function mailAdmin($msg) {
        //mail(self::$adminMail, self::$adminMailSubject, $msg);
    }	
}
?>
