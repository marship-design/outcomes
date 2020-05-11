<?php

class StatsController {

    public function index(){

        require 'views/stats.view.php';
    }

    public function indexCategory(){

        $outcomesModel = new OutcomesModel();
        $years = $outcomesModel->findYears();

        $statsModel = new StatsModel();

        $categories = $statsModel->selectAll('kategorie');

        require 'views/statsCategory.view.php';
    }
    
    public function indexMonth(){

        $outcomesModel = new OutcomesModel();
        $years = $outcomesModel->findYears();

        $statsModel = new StatsModel();

        require 'views/statsMonth.view.php';
    }

    public function showCategoriesStats(){

        require 'api/categoryStats.php';
    }

    public function showCategoriesStatsDetailed(){

        require 'api/statsDetailed.php';
    }

    public function showMonthStats(){

        require 'api/monthStats.php';
    }

    public function showMonthStatsDetailed(){

        require 'api/statsDetailed.php';
    }
}