<?php

require 'partials/header.php';

require 'partials/nav.php';
?>

<form action="<?= PROJECT_FOLDER; ?>login/loginAction" method="POST">
    <div class="row">
        <div class="col s12 l4 offset-l4">
            <div class="card">            
                <div class="card-action teal darken-1 white-text">
                    <h3>Log In Form</h3>
                </div>
                    <div class="card-content">
                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" value="">
                        </div>

                        <div class="input-field">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                        </div>

                            <label for="remember">
                                <input type="checkbox" id="remember" name="remember">
                                <span>Remember me</span>
                            </label>
                        <br>
                        <br>

                        <div class="input-field">
                            <button class="btn waves-effect waves-light" type="submit" name="submit" style="width:100%;">Login</button>
                        </div>

                    </div>                
            </div>
        </div>
    </div>
</form>


<?php
require 'partials/footer.php';
