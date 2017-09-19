<?
    // Page application controller
    namespace App\Controllers;
    
    class PageController
    {
        /**
        *   Get list of pages on DB method
        *   @return mixed
        */
        function pagesList()
        {
            global $APP; // Globaly $APP var
            
            // Set default page variables
            $APP->pageVariables = array(
                'pageTitle' => 'TestApp - List of database pages',
                'pageHeader' => 'This is list of pages',
                'pageKeywords' => 'home, pagescontroller, list of pages',
                'topMenu' => array(
                    'Home' => '/',
                    'Install' => '/install/',
                    'List' => '/pages-list/',
                    'About' => '/about/'
                ),
                'tableRows' => '',
                'installLnk' => '/install/actionSetUp/'
            );
            
            // Render page template
            echo $APP->Config->getTWIG()->render('header.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('top-menu.php', $APP->pageVariables)
            . (!$APP->Config->isInstalled() ? 
                $APP->Config->getTWIG()->render('install-page.php', $APP->pageVariables) : 
                $APP->Config->getTWIG()->render('page-list.php', $APP->pageVariables))
            . $APP->Config->getTWIG()->render('footer.php', $APP->pageVariables);
        }
        
        /**
        *   Get page details method
        * 
        */
        function pagesDetail($id, $action)
        {
            global $APP; // Globaly $APP var
            
            // Set default page variables
            $APP->pageVariables = array(
                'isInstalled' => $APP->Config->isInstalled(),
                'pageTitle' => 'TestApp - Detail page content',
                'pageHeader' => '',
                'pageKeywords' => '',
                'pageBody' => '',
                'topMenu' => array(
                    'Home' => '/',
                    'Install' => '/install/',
                    'List' => '/pages-list/',
                    'About' => '/about/'
                ),
                'installLnk' => '/install/actionSetUp/'
            );
            
            // Render page template
            echo $APP->Config->getTWIG()->render('header.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('top-menu.php', $APP->pageVariables)
            . (!$APP->Config->isInstalled() ? 
                $APP->Config->getTWIG()->render('install-page.php', $APP->pageVariables) :
                $APP->Config->getTWIG()->render('page-detail.php', $APP->pageVariables))
            . $APP->Config->getTWIG()->render('footer.php', $APP->pageVariables);
        }
    }
    
?>