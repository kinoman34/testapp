<?
    // Application config class
    namespace App;
    
    use Illuminate\Database\Capsule\Manager as Capsule;
    
    class Config
    {
        // Database config
        private $host; /* Database hostname */
        
        private $login; /* Database login */
        
        private $password; /* Database password */
        
        public $dbName; /* Database name, if use */
        
        private $driver; /* Driver name */
        
        private $template; /* Template Path */
        
        private $TWIG; /* TWIG object */
        
        private $isInstalled; /* Is installed the application */
        
        private $dbParams; /* DB params */ 
        
        function __construct()
        {
            // Init DB connection On Doctrine ORM
            $this->host = 'localhost';
            $this->login = '';
            $this->password = '';
            $this->driver = 'mysql';
            
            // Database name if use
            $this->dbName = 'testapp';
            $this->table = 'pet__pages';
            
            // TWIG template path
            $this->template = 'App/Views/';
            $this->twigCache = 'App/Views/compilation_cache';
            $this->twigAutoreload = true;
            
            // the connection configuration
            $this->dbParams = array(
                'driver' => $this->driver,
                'host' => $this->host,
                'database' => $this->dbName,
                'username' => $this->login,
                'password' => $this->password,
                'charset' => 'utf8',
                'collation' => 'utf8_general_ci',
                'prefix' => ''
            );
            
            /* Database Connection */
            $capsule = new Capsule;
            $capsule->addConnection($this->dbParams);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            // Is installed application variable
            $this->isInstalled = $this->checkInstall();
            
            /* TWIG template path */
            $this->TWIG = new \Twig_Environment(
                new \Twig_Loader_Filesystem($this->template), 
                array(
                    'cache' => $this->twigCache, 
                    'auto_reload' => $this->twigAutoreload
                )
            );
            
            // Add TWIG extensions
            $this->TWIG->addExtension(new \Twig_Extensions_Extension_Text());
            
        }
        
        /**
        *   Check DB installation
        *   @return bool
        */
        function checkInstall()
        {
            return Capsule::select('SHOW TABLES LIKE "' . $this->table . '"') ? 1 : 0;
        }
        
        /**
        *   Get TWIG object
        *   @return mixed
        */
        function getTWIG()
        {
            return $this->TWIG;
        }
        
        /**
        *   Is installed application method
        *   @return bool
        */
        function isInstalled()
        {
            return $this->isInstalled;
        }
    }
?>