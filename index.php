<?
    // Require autoload.php section
    require_once dirname(__FILE__) . '/vendor/autoload.php';
    global $APP; // Application Global Object
    
    // Use Config App section
    $APP->Config = new App\Config;
    
    // Use Models section
    $APP->Models->PageModel = new App\Models\PageModel;
    
    // Use Php-Router class for handling request's
    use PHPRouter\RouteCollection;
    use PHPRouter\Router;
    use PHPRouter\Route;
    
    // Base Router's section GROUP BY Collection
    $collection = new RouteCollection();
    
    // Pages list
    $collection->attachRoute(new Route('/pages-list/', array(
        '_controller' => 'App\Controllers\PageController::pagesList',
        'methods' => 'GET'
    )));
    
    // Page detail WITH ID
    $collection->attachRoute(new Route('/page-detail/:id/:action', array(
        '_controller' => 'App\Controllers\PageController::pagesDetail',
        'methods' => 'GET'
    )));
    
    // Page detail WITH action param
    $collection->attachRoute(new Route('/page-detail/:id/', array(
        '_controller' => 'App\Controllers\PageController::pagesDetail',
        'methods' => 'GET'
    )));
    
    // Page detail
    $collection->attachRoute(new Route('/page-detail/', array(
        '_controller' => 'App\Controllers\PageController::pagesDetail',
        'methods' => 'GET'
    )));
    
    // Base index action
    $collection->attachRoute(new Route('/', array(
        '_controller' => 'App\Controllers\BaseController::indexAction',
        'methods' => 'GET'
    )));
    
    // Base install action with setup
    $collection->attachRoute(new Route('/install/:action/', array(
        '_controller' => 'App\Controllers\BaseController::indexInstall',
        'methods' => 'GET'
    )));
    
    // Base install action
    $collection->attachRoute(new Route('/install/', array(
        '_controller' => 'App\Controllers\BaseController::indexInstall',
        'methods' => 'GET'
    )));
    
    // Base about action
    $collection->attachRoute(new Route('/about/', array(
        '_controller' => 'App\Controllers\BaseController::indexAbout',
        'methods' => 'GET'
    )));
    
    // Exec router collection
    $router = new Router($collection);
    $router->setBasePath('/');
    $router->matchCurrentRequest();