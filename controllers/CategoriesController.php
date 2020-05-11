<?php

class CategoriesController {

    // pokazanie wszystkich kategorii
    public function index(){

        $model = new CategoriesModel();
        // $categories = $model->selectAll();
        $categories = $model->selectAll('kategorie');
        
        require 'views/categories.view.php';

    }

    // pokazuje konkretna kategorie
    public function show(){

        $id = $_GET['id'];

        $model = new CategoriesModel();
      //  $category = $model->read_single($id);
       
       
    }

    // pokazanie formy do dodawania kategorii
    public function create(){

        require 'views/newCategory.view.php';       //zmienic na jakas inna nazwa, zwiazana z modelem/controlerem
    }

    // zapisanie kategorii do bazy danych
    public function store(){

        if(Token::check(Input::get(TOKEN_NAME))){
            $model = new CategoriesModel();
            $categories = $model->insert('kategorie', ['kategoria' => $_POST['category']]);
                
            header('Location: '.PROJECT_FOLDER.'categories');
        }else {
            header('Location: '.PROJECT_FOLDER.'login');
        }
    }

    // pokazanie formy do zmiany kategorii
    public function edit(){

        $id = $_GET['id'];

        $model = new CategoriesModel();

        $category = $model->find('kategorie',['conditions' => 'id_kategorii = ?', 'bind' => $id]);
       
        require 'views/editCategory.view.php';
        
    }

    // aktualizacja kategorii
    public function update(){

        if(Token::check(Input::get(TOKEN_NAME))){

            $id = $_GET['id'];

            $model = new CategoriesModel();
            
            $model->update('kategorie', $id, ['kategoria' => $_POST['category']], ['conditions' => 'id_kategorii = ?']);

            header('Location: '.PROJECT_FOLDER.'categories');
        }else{
            header('Location: '.PROJECT_FOLDER.'login');

        }

    }

    // usuniecie kategorii
    public function destroy(){


    }
}