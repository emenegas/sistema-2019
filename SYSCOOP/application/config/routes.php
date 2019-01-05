<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['projetopnae/(:num)/itens']['get'] = 'itens/index/$1';
$route['projetopnae/(:num)/itens']['post'] = 'itens/adicionar/$1';
$route['projetopnae/(:num)/itens/remover'] = 'itens/remover/$1';
$route['projetopnae/(:num)/info'] = 'projetopnae/info/$1';
$route['projetopnae/(:num)/remover'] = 'projetopnae/remover/$1';
$route['projetopnae/(:num)/alterar'] = 'projetopnae/alterar/$1';
$route['agricultor/(:num)/editar'] = 'agricultor/editar/$1';
$route['agricultor/(:num)/alterar'] = 'agricultor/alterar/$1';
$route['cooperativa/(:num)/editar'] = 'cooperativa/editar/$1';
$route['cooperativa/(:num)/alterar'] = 'cooperativa/alterar/$1';
$route['entidade/(:num)/editar'] = 'entidade/editar/$1';
$route['entidade/(:num)/alterar'] = 'entidade/alterar/$1';
$route['funcionario/(:num)/editar'] = 'funcionario/editar/$1';
$route['funcionario/(:num)/alterar'] = 'funcionario/alterar/$1';
$route['produto/(:num)/remover'] = 'produto/remover/$1';
$route['produto/(:num)/editar'] = 'produto/editar/$1';
$route['produto/(:num)/alterar'] = 'produto/alterar/$1';


