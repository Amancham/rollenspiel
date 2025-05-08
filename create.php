<?php include "header.php" ?>
<div id="content">
    <h1>Charakter-Erstellung</h1>
    <p>Willkommen in Tiamahr, erstelle hier deinen Charakter, um dich in den Dungeons zu beweisen.</p>
    <form action="fight.php?mode=new" method="POST">
        <fieldset>
            <legend>Charaktererstellung</legend>
            <label for="p_name">Spielername</label><br/>
            <input type="text" id="p_name" name="p_name" /><br/>
            <label for="c_name">Charaktername</label><br/>
            <input type="text" id="c_name" name="c_name" /><br/>
            <label for="c_type">Attribut</label><br/>
            <select id="c_type" name="c_type" />
                <option value="Ork">Feuer</option>
                <option value="Zwerg">Wasser</option>
                <option value="Mensch">Erde</option>
                <option value="Elf">Luft</option>
            </select><br/>

            <input type="submit" name="Absenden" />&nbsp;<input type="reset" value="Zurücksetzen">
        </fieldset>
    </form>
</div>
<?php include "footer.php" ?>