<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */

// Ruta principal
$routes->get('/', 'HomeController::index');

// Rutas para equipos
$routes->get('/equipos', 'EquipoController::index');
$routes->get('/equipos/create', 'EquipoController::create');
$routes->post('/equipos/store', 'EquipoController::store');
$routes->get('/equipos/jugadores/(:num)', 'EquipoController::jugadores/$1');
$routes->get('/equipos/edit/(:num)', 'EquipoController::edit/$1');
$routes->post('/equipos/update/(:num)', 'EquipoController::update/$1');
$routes->get('/equipos/delete/(:num)', 'EquipoController::delete/$1');

// Rutas para jugadores
$routes->get('/jugadores', 'JugadorController::index');
$routes->get('/jugadores/create/(:num)', 'JugadorController::create/$1');
$routes->post('/jugadores/store', 'JugadorController::store');
$routes->get('/jugadores/edit/(:num)', 'JugadorController::edit/$1');
$routes->post('/jugadores/update/(:num)', 'JugadorController::update/$1');
$routes->get('/jugadores/delete/(:num)', 'JugadorController::delete/$1');

// Rutas para jornadas
$routes->get('/jornadas', 'JornadaController::index');
$routes->get('/jornadas/create', 'JornadaController::create');
$routes->post('/jornadas/store', 'JornadaController::store');
$routes->get('/jornadas/edit/(:num)', 'JornadaController::edit/$1');
$routes->post('/jornadas/update/(:num)', 'JornadaController::update/$1');
$routes->get('/jornadas/delete/(:num)', 'JornadaController::delete/$1');

// Rutas para puntos
$routes->get('/puntos/jornada/(:num)', 'PuntosController::index/$1');
$routes->get('/puntos/create/(:num)', 'PuntosController::create/$1');
$routes->post('/puntos/store', 'PuntosController::store');
$routes->get('/puntos/edit/(:num)', 'PuntosController::edit/$1');
$routes->post('/puntos/update/(:num)', 'PuntosController::update/$1');
$routes->get('/puntos/delete/(:num)', 'PuntosController::delete/$1');

// Ruta para ver todos los jugadores agrupados por equipo
$routes->get('/informes/jugadores_por_equipo', 'InformeController::JugadoresPorEquipo');

// Ruta para ver jugadores de un equipo ordenados por apellidos
$routes->get('/informes/jugadores_por_equipo_ordenados/(:num)', 'InformeController::JugadoresPorEquipoOrdenados/$1');

// Ruta para ver el informe de máximos anotadores
$routes->get('/informes/maximos_anotadores', 'InformeController::MaximosAnotadores');
//Ruta general informes
$routes->get('/informes', 'InformeController::index');

// Rutas para los informes en PDF
$routes->get('/informes/jugadores_por_equipo_pdf', 'InformeController::informeJugadoresPorEquipoPDF');
$routes->get('/informes/jugadores_por_equipo_ordenados_pdf/(:num)', 'InformeController::informeJugadoresPorEquipoOrdenadosPDF/$1');
$routes->get('/informes/maximos_anotadores_pdf', 'InformeController::informeMaximosAnotadoresPDF');

