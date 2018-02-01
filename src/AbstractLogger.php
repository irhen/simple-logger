<?php
namespace Logger;

abstract class AbstractLogger implements ILogger
{
    abstract public function log(string $msg);
}