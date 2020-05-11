<?php

class CategoriesModel extends Model {

    public function __construct(){

        parent::__construct();
    }

    // public function read_single($id){

    //     $query = 'SELECT * FROM  kategorie' . ' WHERE id_kategorii = ?';

    //     // Prepare statement
    //     $statement = $this->pdo->prepare($query);

    //     // Bind id
    //     $statement->bindParam(1, $id);

    //     // Execute query
    //     $statement->execute();

    //     return $statement->fetchAll(PDO::FETCH_OBJ);
     
    // }

    // public function update($id, $updatedCategory){
    //     // Create query
    //     $query = 'UPDATE kategorie  
    //         SET
    //             kategoria = :kategoria
    //         WHERE id_kategorii = :id_kategorii';
    //     // Prepare statement
    //     $statement = $this->pdo->prepare($query);
        
    //     // Clean data
    //     $updatedCategory = htmlspecialchars(strip_tags($updatedCategory));
    //     $id = htmlspecialchars(strip_tags($id));

    //     // Bind named parameters
    //     $statement->bindParam(':kategoria', $updatedCategory);
    //     $statement->bindParam(':id_kategorii', $id);

    //     //Execute query
    //     if($statement->execute()){
    //         return true;
    //     }

    //     // Print error if something goes wrong
    //     printf("Error: %s. \n", $statement->error);

    //     return false;
    // }
    

}