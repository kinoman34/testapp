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
            
            // Get All pages into DB
            $tableRows = $APP->Models->PageModel->getAllPages();
            foreach ($tableRows as &$row)
                $row->body = json_decode($row->body);
            
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
                'tableRows' => $tableRows,
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
            
            if ($id == 'pageAdd' && !empty($_GET))
            {
                $APP->Models->PageModel->createPage($_GET);
                header('Location: /pages-list/');
            }
            else
                if (isset($id) && $action == 'pageEdit' && !empty($_GET))
                {
                    $APP->Models->PageModel->updatePage($id, $_GET);
                    header('Location: /pages-list/');
                }
                else if (isset($id) && $action == 'pageEdit')
                    $pageDetail = $APP->Models->PageModel->getPageByID($id);
                else if (isset($id) && $action == 'pageDelete')
                {
                    $APP->Models->PageModel->deletePage($id);
                    header('Location: /pages-list/');
                }
                else if (isset($id) && !isset($action))
                    $pageDetail = $APP->Models->PageModel->getPageByID($id);
                else
                    header('Location: /pages-list/');
            
            // Set default page variables
            $APP->pageVariables = array(
                'isInstalled' => $APP->Config->isInstalled(),
                'pageTitle' => $pageDetail->title ? $pageDetail->title : 'TestApp - Create page content',
                'pageHeader' => $pageDetail->title,
                'pageKeywords' => $pageDetail->keywords,
                'pageBody' => json_decode($pageDetail->body),
                'topMenu' => array(
                    'Home' => '/',
                    'Install' => '/install/',
                    'List' => '/pages-list/',
                    'About' => '/about/'
                ),
                'installLnk' => '/install/actionSetUp/',
                'formActionLnk' => ($id == 'pageAdd') ? 
                    '/page-detail/pageAdd/' : ((isset($id) 
                    && $action == 'pageEdit' ? '/page-detail/' . $id . '/pageEdit/' : ''))
            );
            
            // Render page template
            echo $APP->Config->getTWIG()->render('header.php', $APP->pageVariables)
            . $APP->Config->getTWIG()->render('top-menu.php', $APP->pageVariables)
            . (!$APP->Config->isInstalled() ? 
                $APP->Config->getTWIG()->render('install-page.php', $APP->pageVariables) :
                (($id == 'pageAdd') || (isset($id) && $action == 'pageEdit') ? 
                $APP->Config->getTWIG()->render('page-detail-add-edit.php', $APP->pageVariables) : 
                $APP->Config->getTWIG()->render('page-detail.php', $APP->pageVariables)))
            . $APP->Config->getTWIG()->render('footer.php', $APP->pageVariables);
        }
    }
    
?>