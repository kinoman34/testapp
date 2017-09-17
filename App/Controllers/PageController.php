<?
    // Page application controller
    namespace App\Controllers;
    
    class PageController
    {
        /**
        *   Get list of pages on DB
        *   @return mixed
        */
        function pagesList()
        {
            global $APP; // Globaly $APP var
            
            // Set default page variables
            $APP['pageVariables'] = array(
                'isInstalled' => $APP['config']->isInstalled(),
                'pageTitle' => 'TestApp - List of database pages',
                'pageHeader' => 'TestApp - List of database pages',
                'pageKeywords' => 'home, pagescontroller, list of pages',
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
            . $APP['config']->getTWIG()->render('page-list.php', $APP['pageVariables'])
            . $APP['config']->getTWIG()->render('footer.php', $APP['pageVariables']);
        }
        
        function pageDetail()
        {
            var_dump(456);die();
        }
    }
    
?>