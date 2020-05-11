

<nav>
    <div class="nav-wrapper teal darken-3">
        <a href="<?= PROJECT_FOLDER; ?>" class="brand-logo">Wydatki</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <!-- <li><a href="/outcomes_php/outcomes">Outcomes</a></li>
            <li><a href="/outcomes_php/categories">Categories</a></li>
            <li><a href="./api/outcome/getCSV.php">Summary</a></li>
            <li><a href="javascript:stats.showStatsMenu()">Stats</a></li> -->
            <?php 
                if(!isLoggedIn()){
                    echo "<li><a href='".PROJECT_FOLDER."login'>Login</a></li>";
                }else{
                    echo "<li class='".activeLink(PROJECT_FOLDER.'outcomes')."'><a href='".PROJECT_FOLDER."outcomes'>Outcomes</a></li>";
                    echo "<li class='".activeLink(PROJECT_FOLDER.'categories')."'><a href='".PROJECT_FOLDER."categories'>Categories</a></li>";
                //    echo "<li><a href='./api/outcome/getCSV.php'>Summary</a></li>";
                //    echo "<li><a href='javascript:stats.showStatsMenu()'>Stats</a></li>";
                   echo "<li class='".activeLink(PROJECT_FOLDER.'stats')."'><a href='".PROJECT_FOLDER."stats'>Stats</a></li>";
                   echo "<li><a href='".PROJECT_FOLDER."logout'>Logout</a></li>";
                }
            ?>
        </ul>
    </div>
</nav>


<ul class="sidenav" id="mobile-demo">  
    <?php
        if(!isLoggedIn()){
            echo "<li><a href='".PROJECT_FOLDER."login' class='sidenav-close'>Login</a></li>";    
        }
        else{
           echo "<li><a href='".PROJECT_FOLDER."outcomes' class='sidenav-close'>Outcomes</a></li>";
           echo "<li><a href='".PROJECT_FOLDER."categories' class='sidenav-close'>Categories</a></li>";        
           echo "<li><a href='".PROJECT_FOLDER."stats' class='sidenav-close'>Stats</a></li>";        
        //    echo "<li><a href='#' class='sidenav-close' onclick='stats.showStatsMenu(); return false;'>Stats</a></li>";                    
        }
    ?>    

</ul>