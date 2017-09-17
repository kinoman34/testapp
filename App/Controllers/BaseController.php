<?
    // Base application controller
    namespace App\Controllers;
    
    class BaseController
    {
        /**
        *   Index method of Base Controller
        *   @return 
        */
        function indexAction()
        {
            // Get TWIG object
            $twig = $GLOBALS['appConfig']->getTWIG();
            
            // Set default page variables
            $pageVariables = array(
                'pageTitle' => 'TestApp - Home page',
                'pageHeader' => 'TestApp - Home Page',
                'pageKeywords' => 'home, basecontroller, getstarted',
                'topMenu' => array(
                    'Home' => '/',
                    'Install' => '/install/',
                    'List' => '/pages-list/',
                    'About' => '/about/'
                ),
                'contentPageLnk' => '/pages-list/',
            );
            
            // Render page template
            echo $twig->render('header.php', $pageVariables)
            . $twig->render('top-menu.php', $pageVariables)
            . $twig->render('home-page.php', $pageVariables)
            . $twig->render('footer.php', $pageVariables);
        }
        
        /**
        *   Install method of Base Controller
        *   @return
        */
        function indexInstall()
        {
            
        }
    }
    
?>