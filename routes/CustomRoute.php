<?php 
namespace Routes;
/**
* 
*/
use \Phroute\Phroute\RouteCollector;
use \Phroute\Phroute\Dispatcher;
class CustomRoute
{
	
	public static function init($url){
		$router = new RouteCollector();

		// danh sach san pham
		$router->get('/', ["Controllers\HomeController", "index"]);

		// chi tiet san pham
		$router->get('/detail/{id}', ["Controllers\HomeController", "detail"]);

		// form them moi san pham
		$router->get('/post/add', ["Controllers\BookController", "addForm"]);

		// Luu them moi san pham
		$router->post('/post/add', ["Controllers\BookController", "saveAdd"]);

		// form sua san pham
		$router->get('/post/edit/{id}', ["Controllers\BookController", "editForm"]);

		// luu sua san pham
		$router->post('/post/edit/{id}', ["Controllers\BookController", "saveEdit"]);

		// xoa san pham
		$router->get('/post/remove/{id}', ["Controllers\BookController", "remove"]);

		$router->get('/search', ["Controllers\BookController", "getSearch"]);
		$router->post('/search', ["Controllers\BookController", "postSearch"]);

		$router->get('/dang-ky', ["Controllers\DKController", "getSearchDK"]);

		$router->post('/dang-ky', ["Controllers\DKController", "postSearchDK"]);

		$router->get('/dang-nhap', ["Controllers\DNController", "dangNhap"]);
		$router->post('/dang-nhap', ["Controllers\DNController", "postDangNhap"]);
		$router->get('/log-out', ["Controllers\DNController", "logOut"]);
		$router->get('/password/{token}', ["Controllers\DKController", "VerifyEmail"]);




		$dispatcher = new \Phroute\Phroute\Dispatcher($router->getData());
		$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
		    
		// Print out the value returned from the dispatched function
		echo $response;
	}
}
 ?>