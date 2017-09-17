<?
    // Application config class
    namespace App;
    
    // Use DOCTRINE ORM
    use Doctrine\ORM\Tools\Setup;
    use Doctrine\ORM\EntityManager;
    
    class Config
    {
        // Database config
        private $host; /* Database hostname */
        
        private $login; /* Database login */
        
        private $password; /* Database password */
        
        private $paths; /* Entity files path's */
        
        private $isDevMode; /* Is Dev mode */
        
        private $dbName; /* Database name, if use */
        
        private $driver; /* Driver name */
        
        private $config; /* Configuration object of Doctrine */
        
        private $ENT_MANAGER; /* ENT of Doctrine */
        
        private $template; /* Template Path */
        
        private $TWIG; /* TWIG object */
        
        function __construct()
        {
            // Init DB connection On Doctrine ORM
            $this->paths = array("/path/to/entity-files");
            $this->isDevMode = false;
            $this->host = 'localhost';
            $this->login = '';
            $this->password = '';
            $this->driver = 'pdo_mysql';
            
            // Database name if use
            $this->dbName = '';
            
            // TWIG template path
            $this->template = 'App/Views/';
            
            // the connection configuration
            $dbParams = array(
                'driver'   => $this->driver,
                'user'     => $this->login,
                'password' => $this->password,
                'dbname'   => $this->dbName,
            );
            
            /* Database Connection */
            $this->config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);
            $this->ENT_MANAGER = EntityManager::create($dbParams, $this->config);
            
            /* TWIG template path */
            $this->twigLoader = new \Twig_Loader_Filesystem($this->template);
            $this->TWIG = new \Twig_Environment($this->twigLoader, array('cache' => 'compilation_cache', 'auto_reload' => true));
            
        }
        
        /**
        *   Get ORM config function
        *   @return mixed
        */
        function getConfig()
        {
            return $this->config;
        }
        
        /**
        *   Get EntittyManager object for ORM
        *   @return mixed
        */
        function getEntitty()
        {
            return $this->ENT_MANAGER;
        }
        
        /**
        *   Get TWIG loader
        *   @return mixed
        */
        function getTWIGloader()
        {
            return $this->twigLoader;
        }
        
        /**
        *   Get TWIG object
        *   @return mixed
        */
        function getTWIG()
        {
            return $this->TWIG;
        }
    }
?>