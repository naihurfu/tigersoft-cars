<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['cars'] = 'Welcome';
$route['Cars/login'] = 'login';

$route['adminCars'] = 'AdminCars/index';
$route['carEdit'] = 'AdminCars/carEdit';
$route['carDel'] = 'AdminCars/carDel';
$route['assets'] = 'Welcome';

$route['carsCreate'] = 'AdminCars/carsCreate';
$route['kmCreate'] = 'AdminCars/kmCreate';
$route['taxCreate'] = 'AdminCars/taxCreate';
$route['insrCreate'] = 'AdminCars/insrCreate';
$route['washCreate'] = 'AdminCars/washCreate';
$route['checkCreate'] = 'AdminCars/checkCreate';

$route['taxUpdate'] = 'Cars/taxUpdate';
$route['kmUpdate'] = 'Cars/kmUpdate';
$route['insrUpdate'] = 'Cars/insrUpdate';
$route['washUpdate'] = 'Cars/washUpdate';
$route['acdUpdate'] = 'Cars/acdUpdate';

$route['login_submit'] = 'User/submit';
$route['logout'] = 'User/logout';
$route['change_password'] = 'Me/changePwd';

$route['spec_pc'] = 'Spec/first_page';