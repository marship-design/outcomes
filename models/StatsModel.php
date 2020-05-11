<?php

class StatsModel extends Model {

    // public function stats_category_monthly($year, $category){
    public function stats_category($year, $category){

        $query = 'SELECT SUM(o.kwota) total, o.waluta, MONTH(o.data_wydatku) miesiac, o.id_kategorii
        FROM wydatki o
        LEFT JOIN kategorie k ON o.id_kategorii = k.id_kategorii
        WHERE YEAR(o.data_wydatku) = ' . $year . ' AND k.id_kategorii = ' . $category .'
        GROUP BY miesiac, o.waluta';
        
        // Prepare statement
        $stmt = $this->_db->getPDO()->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;

        //return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function stats_category_detailed($year, $month, $category){
        $query = 'SELECT id_wydatku, kwota, nazwa_wydatku, waluta, data_wydatku 
        FROM wydatki o
        WHERE MONTH(data_wydatku) = ' . $month . ' AND YEAR(data_wydatku) = '. $year . ' AND id_kategorii = ' . $category .'
        ORDER BY data_wydatku DESC';

        // Prepare statement
        $stmt = $this->_db->getPDO()->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function stats_month($year, $month){

        $query = 'SELECT k.kategoria as category_name, SUM(o.kwota) total, o.waluta, o.id_kategorii
		FROM wydatki o
		LEFT JOIN kategorie k ON o.id_kategorii = k.id_kategorii
		WHERE MONTH(o.data_wydatku) = ' . $month . ' AND YEAR(o.data_wydatku) = '. $year . '
		GROUP BY category_name, o.waluta
		ORDER BY total DESC';

        // Prepare statement
        $stmt = $this->_db->getPDO()->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }


}