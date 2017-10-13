<form action="<?php echo WEBROOT . "Article/ajouter"; ?>" method="post"  enctype="multipart/form-data">
	<div class="column is-20">
		<h3 class="title is-3">Ajouter un article</h3>
		<table class="table">
			<tr>
				<td>
					<label for="titre">Titre</label>
				</td>
				<td>
					<input id="titre" class="form-control" type="text" name="titre" value="" />
					<?php if(isset($titre_error)): ?>
						<p style="color:red;"><?php echo $titre_error; ?></p>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for="contenu">Contenu</label>
				</td>
				<td>
					<textarea id="contenu" class="form-control" name="contenu" rows="5"></textarea>
					<?php if(isset($contenu_error)): ?>
						<p style="color:red;"><?php echo $contenu_error; ?></p>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for="image">Image</label>
				</td>
				<td>
					<input type="file" id="image" class="form-control" name="image"/>
					<?php if(isset($image_error)): ?>
						<p style="color:red;"><?php echo $image_error; ?></p>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for="category">Category</label>
				</td>
				<td>
					<?php if(isset($authors) && count($authors) > 0): ?>
						<select id="category" class="form-control" name="category">
							<option value="-1">Selectionner une category</option>
							<?php foreach($categories as $row): ?>
								<option value="<?php echo $row['id_categorie'] ?>"><?php echo $row["nom_categorie"]; ?></option>
							<?php endforeach; ?>
						</select>
					<?php endif; ?>
					<?php if(isset($category_error)): ?>
						<p style="color:red;"><?php echo $category_error; ?></p>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for="author">Author</label>
				</td>
				<td>
					<?php if(isset($authors) && count($authors) > 0): ?>
						<select id="author" class="form-control" name="author">
							<?php foreach($authors as $row): ?>
								<option value="-1">Selectionner un auteur</option>
								<option value="<?php echo $row['id_auteur'] ?>"><?php echo $row["nom_auteur"] . " " . $row["prenom_auteur"]; ?></option>
							<?php endforeach; ?>
						</select>
					<?php endif; ?>
					<?php if(isset($author_error)): ?>
						<p style="color:red;"><?php echo $author_error; ?></p>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>
					<label for="active">Activation</label>
				</td>
				<td>
					<input type="checkbox" id="active" name="active">
					Activer
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<input class="btn btn-primary active" type="submit" value="Ajouter"/>
				</td>
			</tr>
		</table>
	</div>
</form>