<p>Filtre via queryparams et boutons</p>
<a href="?">Filtre all<a>
<a href="?completed=true">Filtre completed<a>
<a href="?completed=false">Filtre not completed<a>
<p>Filtre via queryparams et formulaire</p>
<form action="" method="POST">
    <label for="completedtrue">Filtre completed</label>
    <input type="radio" id="completedtrue" name="completed" value="true" <?= isset($_REQUEST['completed'])  && $_REQUEST['completed'] === "true" ? 'checked' : '' ?>>
    <label for="completedfalse">Filtre not completed</label>
    <input type="radio" id="completedfalse" name="completed" value="false" <?= isset($_REQUEST['completed']) && $_REQUEST['completed'] === "false" ? 'checked' : '' ?>>
    <label for="test">test</label>
    <input type="file" name="testfile"/>
    <input type="checkbox" id="test" name="test" value="test-checked" <?= isset($_REQUEST['test']) && $_REQUEST['test'] === "test-checked" ? 'checked' : '' ?>>
    <input type="submit">
</form>