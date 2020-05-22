<?php

define('CURRENT_USER_SESSION_NAME','session_name');	//session name for logged in user
define('REMEMBER_ME_COOKIE_NAME','cookie_name');	//cookie name for logged in user remember me
define('REMEMBER_ME_COOKIE_EXPIRY',10800);	//time in seconds for remember me cookie to live
define('TOKEN_NAME','token');	//time in seconds for remember me cookie to live

require_once 'define.php';

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


