<?
    // Require autoload.php section
    require_once dirname(__FILE__) . '/vendor/autoload.php';
    
    // Use Config App class
    global $APP;
    $APP['config'] = new App\Config;
    
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
    $APP['router'] = $router->matchCurrentRequest();
    $APP['route'] = new Route;