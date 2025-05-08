<?php include "header.php" ?>
<div id="content">
<h1>Weiterspielen</h1>
<p>Um einen vorherigen Spielstand weiterspielen zu können, musst du deinen Spielernamen und deine ID angeben.</p>
<form action="fight.php?mode=continue" method="POST">
        <fieldset>
            <legend>Charakter laden</legend>
            <label for="p_name">Spielername</label><br/>
            <input type="text" id="p_name" name="p_name" /><br/>
            <label for="c_id">Charakter-Id</label><br/>
            <input type="number" id="c_id" name="c_id" /><br/>

            <input type="submit" name="Absenden" />&nbsp;<input type="reset" value="Zurücksetzen">
        </fieldset>
    </form>
</div>
<?php include "footer.php" ?>