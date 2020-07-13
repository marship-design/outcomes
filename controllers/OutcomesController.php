<?php



class OutcomesController {

    public function index(){

        // $outcomes = App::get('database')->selectAllOutcomes('wydatki');
        $model = new OutcomesModel();

        $years = $model->findYears();       

        $date = getdate();
        $outcomes = $model->selectOutcomes($date['year'], $date['mon']);
        
        require 'views/outcomes.view.php';
    }

    public function indexRange(){
        $model = new OutcomesModel();
        
        $years = $model->findYears();
        
        if(empty(Input::get('selectYear')) || empty(Input::get('selectMonth'))){
            header('Location: '.PROJECT_FOLDER.'outcomes');
            exit;
        }else{

            $outcomes = $model->selectOutcomes(Input::get('selectYear'), Input::get('selectMonth'));
        }

        require 'views/outcomes.view.php';

    }

    public function create(){

        $model = new CategoriesModel();
        $categories = $model->selectAll('kategorie');

        $country_code = getCountry();

        require 'views/newOutcome.view.php';
    }

    public function store(){

        $model = new OutcomesModel();
       
        $model->insert('wydatki', [
            'nazwa_wydatku' => $_POST['nazwa_wydatku'],
            'data_wydatku'  => $_POST['data_wydatku'],
            'id_kategorii'  => $_POST['id_kategorii'],
            'kwota'         => $_POST['kwota'],
            'waluta'        => $_POST['waluta'],
            'tagi'          => $_POST['tagi'],
            'id_user'       => Session::get(CURRENT_USER_SESSION_NAME)
            ]);

        header('Location: '.PROJECT_FOLDER.'outcomes');
    }

    public function edit(){

        $id = $_GET['id'];

        $model = new OutcomesModel();
        $outcome = $model->read_one($id);

        $model = new CategoriesModel();
        $categories = $model->selectAll('kategorie');


        require 'views/editOutcome.view.php';
    }

    public function update(){
        $id = $_GET['id'];

        $model = new OutcomesModel();   
        
        $outcomes = $model->update('wydatki', $id, [
            // 'id_user'           => Session::get(CURRENT_USER_SESSION_NAME), nie zmieniamy usera wiec nie trzeba go podawac
            'id_kategorii'      => $_POST['id_kategorii'],
            'kwota'             => $_POST['kwota'],
            'data_wydatku'      => $_POST['data_wydatku'],
            'nazwa_wydatku'     => $_POST['nazwa_wydatku'],
            'tagi'              => $_POST['tagi'],
            'waluta'            => $_POST['waluta'],
            ],
            ['conditions'       => 'id_wydatku = ?']
        );

        header('Location: '.PROJECT_FOLDER.'outcomes');

    }

    public function destroy(){

        
    }
}