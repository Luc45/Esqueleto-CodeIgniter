<h2><?=$title?></h2>

<?=validation_errors();?>

<?=form_open('news/create');?>
	<label>Titulo</label>
	<input type="text" name="title">
	<br><br>
	<label>Texto</label>
	<textarea name="text"></textarea>
	<br><br>
	<input type="submit" value="Salvar">
</form>