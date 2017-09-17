<?
    // Base application controller
    namespace App\Controllers;
    
    use App\Models\PageModel as Model;
    
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
            $APP['pageVariables'] = array(
                'isInstalled' => $APP['config']->isInstalled(),
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
            echo $APP['config']->getTWIG()->render('header.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('top-menu.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('home-page.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('footer.php', $APP['pageVariables']);
        }
        
        /**
        *   Install method of Base Controller
        *   @return mixed
        */
        function indexInstall($action)
        {
            global $APP; // Globaly $APP var
            
            if (
                $action == 'actionSetUp' &&
                Model::databaseCreate($APP['config']->getDBparams()['DB_NAME']) &&
                Model::tableCreate('pet__page')
            )
                header('Location: /install/');
            
            // Set default page variables
            $APP['pageVariables'] = array(
                'isInstalled' => $APP['config']->isInstalled(),
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
            echo $APP['config']->getTWIG()->render('header.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('top-menu.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('install-page.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('footer.php', $APP['pageVariables']);
        }
        
        /**
        *   Index about TestApp page
        *   @return mixed
        */
        function indexAbout()
        {
            global $APP; // Globaly $APP var
            
            // Set default page variables
            $APP['pageVariables'] = array(
                'isInstalled' => $APP['config']->isInstalled(),
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
            echo $APP['config']->getTWIG()->render('header.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('top-menu.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('about.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('footer.php', $APP['pageVariables']);
        }
    }
    
?>