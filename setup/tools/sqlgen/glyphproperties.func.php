<?php

if (!defined('AOWOW_REVISION'))
    die('illegal access');

if (!CLI)
    die('not in cli mode');

$reqDBC = ['glyphproperties', 'spellicon'];

function glyphproperties()
{
    DB::Aowow()->query('REPLACE INTO ?_glyphproperties SELECT id, spellId, typeFlags, 0, iconId FROM dbc_glyphproperties');

    DB::Aowow()->query('UPDATE ?_glyphproperties gp, ?_icons ic, dbc_spellicon si SET gp.iconId = ic.id WHERE gp.iconIdBak = si.id AND ic.name = LOWER(SUBSTRING_INDEX(si.iconPath, "\\\\", -1))');

    return true;
}

?>
