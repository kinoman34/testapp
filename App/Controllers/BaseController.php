<?
    // Base application controller
    namespace App\Controllers;
    
    class BaseController
    {
        /**
        *   Index method of Base Controller
        *   @return mixed
        */
        function indexAction()
        {
            global $APP; // Globaly $APP var
            
            // Set default page variables
            $APP->pageVariables = array(
                'isInstalled' => $APP->Config->isInstalled(),
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
                'installPageLnk' => '/install/',
            );
            
            // Render page template
            echo $APP->Config->getTWIG()->render('header.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('top-menu.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('home-page.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('footer.php', $APP->pageVariables);
        }
        
        /**
        *   Install method of Base Controller
        *   @return mixed
        */
        function indexInstall($action)
        {
            global $APP; // Globaly $APP var
            
            if ($action == 'actionSetUp' && $APP->Models->Pagemodel->installDB())
                    header('Location: /install/');
            
            // Set default page variables
            $APP->pageVariables = array(
                'isInstalled' => $APP->Config->isInstalled(),
                'pageTitle' => 'TestApp - Install page',
                'pageHeader' => 'TestApp - Install Page',
                'pageKeywords' => 'home, basecontroller, getstarted, install test app',
                'topMenu' => array(
                    'Home' => '/',
                    'Install' => '/install/',
                    'List' => '/pages-list/',
                    'About' => '/about/'
                ),
                'contentLnk' => '/pages-list/',
                'installLnk' => '/install/actionSetUp/'
            );
            
            // Render page template
            echo $APP->Config->getTWIG()->render('header.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('top-menu.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('install-page.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('footer.php', $APP->pageVariables);
        }
        
        /**
        *   Index about TestApp page
        *   @return mixed
        */
        function indexAbout()
        {
            global $APP; // Globaly $APP var
            
            // Set default page variables
            $APP->pageVariables = array(
                'isInstalled' => $APP->Config->isInstalled(),
                'pageTitle' => 'TestApp - About page',
                'pageHeader' => 'TestApp - About Page',
                'pageKeywords' => 'home, basecontroller, getstarted, about page',
                'topMenu' => array(
                    'Home' => '/',
                    'Install' => '/install/',
                    'List' => '/pages-list/',
                    'About' => '/about/'
                )
            );
            
            // Render page template
            echo $APP->Config->getTWIG()->render('header.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('top-menu.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('about.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('footer.php', $APP->pageVariables);
        }
    }
    
?>