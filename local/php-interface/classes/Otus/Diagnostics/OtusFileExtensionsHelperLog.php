<?php
namespace Otus\Diagnostics;

use bitrix\Main\Diag\FileExceptionHandlerLog;
use Bitrix\Main\Diag\ExceptionHandlerFormatter;

// населедуем класс
class OtusFileExtensionsHelperLog extends FileExceptionHandlerLog
{
    public function write($exception, $logType)
    {
        $text = ExceptionHandlerFormatter::format($exception);
        $context = [
            'type' => static::logTypeToString($logType)
        ];
        $logLevel = static::LogTypeToLevel($logType);
        $message = "{date} - Host: {host} - {type} - {text}\n";
        $lines = explode("\n", $message);
        foreach ($lines as $line) {
            $line = 'OTUS - ' . $line;
        }

        $message = implode("\n", $lines);
        $this->logger->log($logLevel, $message, $context);

    }
}
