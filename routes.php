<?php

// https://lukasz-socha.pl/php/routing-linkow-w-php/


$collection = new RouteColletion();

$collection->add('staticPages/home', new Route(
    HTTP.HOST.PROJECT_FOLDER,//PROJECT_FOLDER, dodac wszedze project folder
    array(
        'file' => 'controllers/StaticpagesController.php',
        'class' => 'StaticpagesController',
        'method' => 'home'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('outcomes/all', new Route(
    HTTP.HOST.PROJECT_FOLDER.'outcomes',
    array(
        'file' => 'controllers/OutcomesController.php',
        'class' => 'OutcomesController',
        'method' => 'index'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('outcomes/range', new Route(
    HTTP.HOST.PROJECT_FOLDER.'outcomes/indexRange',
    array(
        'file' => 'controllers/OutcomesController.php',
        'class' => 'OutcomesController',
        'method' => 'indexRange'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('outcomes/create', new Route(
    HTTP.HOST.PROJECT_FOLDER.'outcomes/create',
    array(
        'file' => 'controllers/OutcomesController.php',
        'class' => 'OutcomesController',
        'method' => 'create'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('outcomes/store', new Route(
    HTTP.HOST.PROJECT_FOLDER.'outcomes/store',
    array(
        'file' => 'controllers/OutcomesController.php',
        'class' => 'OutcomesController',
        'method' => 'store'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('outcomes/edit', new Route(
    HTTP.HOST.PROJECT_FOLDER.'outcomes/<id>/edit',
    array(
        'file' => 'controllers/OutcomesController.php',
        'class' => 'OutcomesController',
        'method' => 'edit'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
       'id' => "\d+"
    )
));

$collection->add('outcomes/update', new Route(
    HTTP.HOST.PROJECT_FOLDER.'outcomes/<id>/update',
    array(
        'file' => 'controllers/OutcomesController.php',
        'class' => 'OutcomesController',
        'method' => 'update'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
       'id' => "\d+"
    )
));

$collection->add('categories/all', new Route(
    HTTP.HOST.PROJECT_FOLDER.'categories',
    array(
        'file' => 'controllers/CategoriesController.php',
        'class' => 'CategoriesController',
        'method' => 'index'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('categories/show', new Route(
    HTTP.HOST.PROJECT_FOLDER.'categories/<id>?',
    array(
        'file' => 'controllers/CategoriesController.php',
        'class' => 'CategoriesController',
        'method' => 'show'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
       'id' => "\d+"
    )
));

$collection->add('categories/create', new Route(
    HTTP.HOST.PROJECT_FOLDER.'categories/create',
    array(
        'file' => 'controllers/CategoriesController.php',
        'class' => 'CategoriesController',
        'method' => 'create'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('categories/store', new Route(
    HTTP.HOST.PROJECT_FOLDER.'categories/store',
    array(
        'file' => 'controllers/CategoriesController.php',
        'class' => 'CategoriesController',
        'method' => 'store'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('categories/edit', new Route(
    HTTP.HOST.PROJECT_FOLDER.'categories/<id>/edit',
    array(
        'file' => 'controllers/CategoriesController.php',
        'class' => 'CategoriesController',
        'method' => 'edit'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
       'id' => "\d+"
    )
));

$collection->add('categories/update', new Route(
    HTTP.HOST.PROJECT_FOLDER.'categories/<id>/update',
    array(
        'file' => 'controllers/CategoriesController.php',
        'class' => 'CategoriesController',
        'method' => 'update'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
       'id' => "\d+"
    )
));


$collection->add('login/show', new Route(
    HTTP.HOST.PROJECT_FOLDER.'login',
    array(
        'file' => 'controllers/LoginController.php',
        'class' => 'LoginController',
        'method' => 'show'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('login/loginAction', new Route(
    HTTP.HOST.PROJECT_FOLDER.'login/loginAction',
    array(
        'file' => 'controllers/LoginController.php',
        'class' => 'LoginController',
        'method' => 'loginAction'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('login/logoutAction', new Route(
    HTTP.HOST.PROJECT_FOLDER.'logout',
    array(
        'file' => 'controllers/LoginController.php',
        'class' => 'LoginController',
        'method' => 'logoutAction'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('stats/menu', new Route(
    HTTP.HOST.PROJECT_FOLDER.'stats',
    array(
        'file' => 'controllers/StatsController.php',
        'class' => 'StatsController',
        'method' => 'index'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('stats/category', new Route(
    HTTP.HOST.PROJECT_FOLDER.'stats/category',
    array(
        'file' => 'controllers/StatsController.php',
        'class' => 'StatsController',
        'method' => 'indexCategory'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('stats/category/show', new Route(
    HTTP.HOST.PROJECT_FOLDER.'stats/api/categoryStats.php',
    array(
        'file' => 'controllers/StatsController.php',
        'class' => 'StatsController',
        'method' => 'showCategoriesStats'
    ),
    array( // wyrazenia regularne dla parametrow
    //    'year' => "\w+",
    //    'year' => "\d+"
    )
));

$collection->add('stats/category/showDetailed', new Route(
    HTTP.HOST.PROJECT_FOLDER.'stats/api/statsDetailed.php',
    array(
        'file' => 'controllers/StatsController.php',
        'class' => 'StatsController',
        'method' => 'showCategoriesStatsDetailed'
    ),
    array( // wyrazenia regularne dla parametrow
    //    'year' => "\w+",
    //    'year' => "\d+"
    )
));

$collection->add('stats/month', new Route(
    HTTP.HOST.PROJECT_FOLDER.'stats/month',
    array(
        'file' => 'controllers/StatsController.php',
        'class' => 'StatsController',
        'method' => 'indexMonth'
    ),
    array( // wyrazenia regularne dla parametrow
      //  'slug' => "\w+",
      //  'id' => "\d+"
    )
));

$collection->add('stats/month/show', new Route(
    HTTP.HOST.PROJECT_FOLDER.'stats/api/monthStats.php',
    array(
        'file' => 'controllers/StatsController.php',
        'class' => 'StatsController',
        'method' => 'showMonthStats'
    ),
    array( // wyrazenia regularne dla parametrow
    //    'year' => "\w+",
    //    'year' => "\d+"
    )
));

$collection->add('stats/month/showDetailed', new Route(
    HTTP.HOST.PROJECT_FOLDER.'stats/api/statsDetailed.php',
    array(
        'file' => 'controllers/StatsController.php',
        'class' => 'StatsController',
        'method' => 'showMonthStatsDetailed'
    ),
    array( // wyrazenia regularne dla parametrow
    //    'year' => "\w+",
    //    'year' => "\d+"
    )
));

// $collection->add('article/list', new Routing\Route(
//     'artykuly(/<page>)?',
//     array(
//         'file' => 'controller_article.php',
//         'class' => 'ArticleController',
//         'method' => 'index'
//     ),
//     array( // wyrazenia regularne dla parametrow
//         'page' => "\d+"
//     ),
//     array( // wartosci domyslne
//         'page' => 1
//     )
// ));





// $router->get('outcomes_php', 'controllers/index.php');
// $router->get('outcomes_php', 'StaticpagesController@home');

// $router->get('outcomes_php/outcomes', 'controllers/outcomes.php');
// $router->get('outcomes_php/outcomes', 'OutcomesController@index');
// $router->get('outcomes_php/outcomes/create', 'OutcomesController@create');
// $router->post('outcomes_php/outcomes/create/{outcome}', 'OutcomesController@store');



// $router->get('outcomes_php/outcomes/add', 'controllers/newOutcome.php');
// $router->post('outcomes_php/outcomes/add', 'controllers/addOutcome.php');



// $router->get('outcomes_php/categories', 'controllers/categories.php');
// $router->get('outcomes_php/categories', 'CategoriesController@index');
// $router->get('outcomes_php/categories/{id}', 'CategoriesController@show');    //pokazuje konkretna kategorie
// $router->get('outcomes_php/categories/create', 'CategoriesController@create');  //pokazuje forme do dodawania kategorii
// $router->post('outcomes_php/categories/create', 'CategoriesController@store');  //dodaje kategorie do bazy

// dd($router);

// $router->get('outcomes_php/categories/new', 'controllers/newCategory.php');
// $router->post('outcomes_php/categories/add', 'controllers/addCategory.php');


// $router->post('outcomes_php/test', 'controllers/test.php');

// var_dump($router->routes);