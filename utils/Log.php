<?php

/**
 * Log Class
 */
class Log
{
    protected static function logMessage($logLevel, $message)
    {
        $filename = 'log-' . date("Y-m") . '-.log';
        $handle = fopen($filename, 'a+');
        $string = date("Y-m-d-s") . '-' . $logLevel . '-' .$message;
        fwrite($handle, $string . PHP_EOL);
        fclose($handle);
        return true;
    }

    public static function info($message)
    {
        self::logMessage('INFO', $message);
    }

    public static function error($message)
    {
        self::logMessage('ERROR', $message);
    }
}
