<?php

class OutcomesModel extends Model {

    public function selectAllOutcomes(){

        $sql = 'SELECT k.kategoria as category_name, o.id_user, o.id_kategorii, o.kwota, o.data_wydatku, o.tagi, o.waluta, o.id_wydatku, o.nazwa_wydatku
        FROM wydatki o 
        LEFT JOIN kategorie k ON o.id_kategorii = k.id_kategorii
        ORDER BY o.data_wydatku DESC';
    
        $statement = $this->_db->getPDO()->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);    
    }

    public function read_one($id_wydatku){

        $query = 'SELECT k.kategoria as category_name, o.id_user, o.id_kategorii, o.kwota, o.data_wydatku, o.tagi, o.waluta, o.id_wydatku, o.nazwa_wydatku
        FROM  wydatki o
        LEFT JOIN kategorie k ON o.id_kategorii = k.id_kategorii
        WHERE o.id_wydatku = ' .$id_wydatku; 

        // Prepare statement
        $statement = $this->_db->getPDO()->prepare($query);

        // Execute query
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function findYears(){

        $query = 'SELECT Year(data_wydatku) as year FROM wydatki GROUP BY year DESC';

        $stmt = $this->_db->getPDO()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectOutcomes($year, $month){        

        $sql = 'SELECT k.kategoria as category_name, o.id_user, o.id_kategorii, o.kwota, o.data_wydatku, o.tagi, o.waluta, o.id_wydatku, o.nazwa_wydatku
        FROM wydatki o 
        LEFT JOIN kategorie k ON o.id_kategorii = k.id_kategorii
        WHERE YEAR(data_wydatku) = '.$year.' AND MONTH(data_wydatku) = '.$month.'
        ORDER BY o.data_wydatku DESC';
    
        $statement = $this->_db->getPDO()->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);    
    }

    

}