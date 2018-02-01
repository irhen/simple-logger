<?php
namespace Logger;

use Brick\DateTime\LocalDateTime;
use Brick\DateTime\TimeZone;

class LoggerToFile extends AbstractLogger {
    protected $path = "";

    public function setPath(string $path)
    {
        $this->path = $path;
        return $this;
    }

    public function log(string $msg)
    {
        if (empty($this->path)) {
            trigger_error("Please specify the path.", E_USER_WARNING);
            return false;
        } else {
            $currentTime = LocalDateTime::now(TimeZone::utc());

            $logMsg = "{$currentTime}: {$msg}\n";

            $result = file_put_contents($this->path, $logMsg, FILE_APPEND | LOCK_EX);

            if (false === $result) {
                trigger_error("Couldn't log.", E_USER_WARNING);
                return false;
            } else {
                return true;
            }
        }
    }
}