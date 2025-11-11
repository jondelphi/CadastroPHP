<?php

class Conexao
{
    private static $db_host = 'db';     // O nome do serviço Docker
    private static $db_name = 'bderp';  // O nome do banco (MYSQL_DATABASE)
    private static $db_user = 'root';   // O utilizador (MYSQL_USER)
    private static $db_pass = 'vtgd65aoty'; // A senha (MYSQL_PASSWORD)
    private static $db_charset = 'utf8mb4';

    /**
     * @var ?PDO A instância única (Singleton) da conexão PDO.
     */
    private static ?PDO $instancia = null;

    /**
     * Método estático público para obter a conexão.
     * * @return PDO A instância da conexão PDO.
     */
    public static function getConexao(): PDO
    {
        // Se a conexão ainda não foi criada...
        if (self::$instancia === null) {

            // DSN (Data Source Name) para o MySQL
            $dsn = "mysql:host=" . self::$db_host . ";dbname=" . self::$db_name . ";charset=" . self::$db_charset;

            // Opções do PDO para otimização e segurança
            $opcoes = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lança exceções em caso de erro
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retorna resultados como array associativo
                PDO::ATTR_EMULATE_PREPARES   => false,                  // Usa "prepared statements" reais do MySQL
            ];

            try {
                // ...tenta criar a conexão e guardá-la na variável $instancia
                self::$instancia = new PDO($dsn, self::$db_user, self::$db_pass, $opcoes);
            } catch (PDOException $e) {
                // Se falhar, interrompe o script e mostra o erro
                die("Erro de Conexão ao Banco de Dados (PDO): " . $e->getMessage());
            }
        }

        // Retorna a conexão (seja a nova ou a que já existia)
        return self::$instancia;
    }

    /**
     * O construtor é privado para impedir que a classe
     * seja instanciada diretamente (padrão Singleton).
     */
    private function __construct()
    {
        // Vazio
    }

    /**
     * Impede a clonagem da instância (padrão Singleton).
     */
    private function __clone()
    {
        // Vazio
    }
}
