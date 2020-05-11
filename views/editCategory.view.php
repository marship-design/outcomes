<?php

require 'partials/header.php';

require 'partials/nav.php';
?>

<div class="section">
	<dir class="container">
		<div class="row">
			<div class="col s12 l6">
				<div class="card">
					<div class="card-content teal darken-1 white-text">
						<span class="card-title">Edit category</span>
						<p>Write-in new category name</p>						
					</div>
					<div class="card-action">
						<div class="row">
							<form action="<?= PROJECT_FOLDER; ?>categories/<?= $category[0]->id_kategorii; ?>/update" method="POST" class="col s12 l12">
								<div class="row">
									<div class="input-field col s12 l8">
										<input type="text" class="toCheck" name="category" id="category" value="<?= $category[0]->kategoria; ?>">
										<label for="category">Category Name</label>
										<span class="error">Pole nie może być puste.</span>
									</div>								
								</div>
								<input type="hidden" name="<?php echo TOKEN_NAME; ?>" value="<?php echo Token::generate(); ?>">

								<div class="row">
									<button class="btn waves-efffect waves-light" type="submit" id="add">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?= HTTP.HOST.PROJECT_FOLDER; ?>js/validation.js"></script>
<script type="text/javascript" src="<?= HTTP.HOST.PROJECT_FOLDER; ?>js/newCategory.js"></script>

<?php
require 'partials/footer.php';

