<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendMysqlDump extends Command
{
    protected $signature = 'send:mysql-dump {--download}';
    protected $description = 'Create MySQL dump and send it via email';

    public function handle()
    {
        $dumpFileName = 'mysql_dump.sql';
        $databaseName = config('database.connections.mysql.database');

        // Create MySQL dump
        $dumpCommand = "mysqldump -u " . config('database.connections.mysql.username') .
            " -p" . config('database.connections.mysql.password') .
            " " . $databaseName . " > " . storage_path($dumpFileName);

        // $dumpCommand = "mysqldump -u root isft38 > " . storage_path($dumpFileName);

        exec($dumpCommand);

        $file_path = storage_path($dumpFileName); // Replace with the actual path to your attachment file
        $file_contents = file_get_contents($file_path);
        $mail = '@';
        $asunto = 'MySQL Dump';
        $noreply = '';
        $headers = "";
        $headers .= "From: I.S.F.T N° 38 <" . $noreply . ">\r\n";
        // $headers .= "Reply-To: " . $nombre . " <" . $respuesta . ">\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $resultado = mail($mail, $asunto, $file_contents, $headers);

        // Clean up the dump file
        //unlink(storage_path($dumpFileName));

    }
}
