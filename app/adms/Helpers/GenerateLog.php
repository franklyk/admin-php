<?php

namespace App\adms\Helpers;


use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class GenerateLog
{
    /**
     * Gera Log
     * 
     * @author Franklin <frsbatist@gmail.com>
     * 
     * -DEBUG (100): Informações de depuração.
     * -INFO (200): Eventos interessantes. Por exemplo um usuário realizou login ou logs de SQL.
     * -NOTICE (250): Eventos normais, mas significantes
     * -WARNING (300): Ocorrências exepcionais mas que não são erros. Por exemplo: Uso de APIs descontinuadas, uso inadequado de uma API. Em geral coisa que não estão erradas mas que precisão de atenção.
     * -ERROR (400): Erros de tempo de execução que não requerem ação imediata, mas que devem ser logados e monitrados.
     * -CRITICAL (500): Condições criticas. Por exemplo: Um compomnente da aplicação não esta disponível, uma exceção não esperada ocorreu.
     * -ALERT (550): Uma ação imediata deve ser tomada. Exemplo o sistema caiu, o banco de dados está indisponível, etc... Deve disparar um alerta para o responsável tomar providências o mais rápido possível.
     * -EMERGENCY (600): Emergência: O Sistema está inutilizavel. 
     * 
     */

    /**
     * Método estático pose ser chamado diretamente na classe, sem a necessidade de criar uma instância(objeto) da classe.
     * 
     * Salvar log no argquivo de log
     * @return void
     */
    
    public static function generateLog(string $level, string $message, array|null $content): void
    {
        // Criar o log
        $log = new Logger('name');

        // Obter a data atual no formato "ddmmYYYY"
        $nameFileLog = date('dmY') . ".log";

        // Criar o camino dos logs
        $filePath = "logs/" . $nameFileLog;

        // Verificar se or aarquivo existe 
        if(!file_exists($filePath)){
            $fileOpen = fopen($filePath, 'w');

            fclose($fileOpen);
        }
        $log->pushHandler(new StreamHandler($filePath, level::Debug));

        $log->$level($message, $content);
    }
}