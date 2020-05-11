<?php

define('HTTP', 'http://');
define('HOST','outcomes.marshipdesign.pl');
// define('HOST','localhost/outcomes_php/');
define('PROJECT_FOLDER', '/');
// define('PROJECT_FOLDER', '/outcomes_php/');



require 'core/App.php';


require_once 'core/Route.php';
require_once 'core/RouteCollection.php';
require_once 'core/Router.php';
require_once 'core/Session.php';
require_once 'core/Cookie.php';
require_once 'core/Input.php';
require_once 'core/Token.php';

require 'routes.php';

require 'controllers/StaticpagesController.php';
require 'controllers/OutcomesController.php';
require 'controllers/CategoriesController.php';
require 'controllers/StatsController.php';
require 'controllers/LoginController.php';

require 'models/Model.php';
require 'models/CategoriesModel.php';
require 'models/OutcomesModel.php';
require 'models/UsersModel.php';
require 'models/LoginModel.php';
require 'models/StatsModel.php';
require 'models/UserSessions.php';

require 'core/functions.php';

require 'core/Request.php';
// require 'core/database/Connection.php';
require 'core/database/DB.php';
// require 'core/database/QueryBuilder.php';
require 'core/Materialize.php';

App::bind('config', require 'config.php');

// App::bind('database', new QueryBuilder(
// 	Connection::make(App::get('config')['database'])
// ));


