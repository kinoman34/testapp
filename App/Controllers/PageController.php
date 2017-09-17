<?
    // Page application controller
    namespace App\Controllers;
    
    use App\Models\PageModel as Model;
    
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
            $APP['pageVariables'] = array(
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
            echo $APP['config']->getTWIG()->render('header.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('top-menu.php', $APP['pageVariables'])
            . (!$APP['config']->isInstalled() ? 
                $APP['config']->getTWIG()->render('install-page.php', $APP['pageVariables']) : 
                $APP['config']->getTWIG()->render('page-list.php', $APP['pageVariables']))
            . $APP['config']->getTWIG()->render('footer.php', $APP['pageVariables']);
        }
        
        /**
        *   Get page details method
        * 
        */
        function pagesDetail($id, $action)
        {
            global $APP; // Globaly $APP var
            
            // Set default page variables
            $APP['pageVariables'] = array(
                'isInstalled' => $APP['config']->isInstalled(),
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
            echo $APP['config']->getTWIG()->render('header.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('top-menu.php', $APP['pageVariables'])
            . (!$APP['config']->isInstalled() ? 
                $APP['config']->getTWIG()->render('install-page.php', $APP['pageVariables']) :
                $APP['config']->getTWIG()->render('page-detail.php', $APP['pageVariables']))
            . $APP['config']->getTWIG()->render('footer.php', $APP['pageVariables']);
        }
    }
    
?>