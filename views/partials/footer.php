

<!-- <script type="text/javascript" src="/outcomes_php/js/materialize.min.js"></script> -->

<script>
        document.addEventListener("DOMContentLoaded", function(){
           
            var elems = document.querySelectorAll('.sidenav');
            // console.log(elems);
            var instances = M.Sidenav.init(elems, {});
            
            <?php
                echo Materialize::init();
            ?>

            // var categorySelect = document.getElementById('categorySelect');
            // console.log(form);
            // var categorySelectInstances = M.FormSelect.init(categorySelect, {});
        });

              
    </script>

</body>

</html>