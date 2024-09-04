$logFile = __DIR__ . "/debug.log";
$currentDateTime = date ("Y-m-d H:i:s");
$logEntry = 'Текущая дата: ' . $currentDateTime . PHP_EOL;

file_put_contents($logFile, $logEntry, FILE_APPEND);
echo 'Дата записана';