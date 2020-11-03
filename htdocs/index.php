<?php



require("./pre.inc.php");
require("./lib/functions.inc.php");
// require("./lib/services.lib.php");

llxHeader();

$bc[0] = "bgcolor=\"#90c090\"";
$bc[1] = "bgcolor=\"#b0e0b0\"";

// stat_print($dbname, $bc1, $bc2, $ftc, 0);


print "<ul><li><a href=\"" . $urlp . "../tech/\">Technique</a>";
print "<li><a href=\"../comm/\">Commercial</a>";
print "<li><a href=\"../compta/\">Compta</a>";
print "<li><a href=\"../stats/\">Stats</a></ul>";


print "<ul><li><a href=\"doc/\">Documents</a></ul>";

function valeur($sql) {
    global $db;
    if ($db->query($sql)) {
        if ($db->num_rows()) {
            $valeur = $db->result(0, 0);
        }
        $db->free();
    }
    return $valeur;
}
/*
 *
 */
$db = new Db();

if ($db->ok) {

    print "<table border=\"1\" cellspacing=\"0\" cellpadding=\"2\">";
    print "<tr bgcolor=\"orange\">";
    print "<td>Description</td><td>Valeur</td>";
    print "</tr>\n";

    $var = !$var;
    $sql = "SELECT count(*) FROM candidat WHERE active = 1";
    print "<tr $bc[$var]><td>CV en ligne</td><td align=\"right\">" . valeur($sql) . "</td></tr>";

    $var = !$var;
    $sql = "SELECT count(*) FROM offre WHERE active = 1";
    print "<tr $bc[$var]><td>Offres en ligne</td><td align=\"right\">" . valeur($sql) . "</td></tr>";

    $var = !$var;
    $sql = "SELECT count(*) FROM societe WHERE active = 1";
    print "<tr $bc[$var]><td>Compte societe</td><td align=\"right\">" . valeur($sql) . "</td></tr>";

    $var = !$var;
    $sql = "SELECT count(*) FROM llx_propal";
    print "<tr $bc[$var]><td>Propositions commerciales</td><td align=\"right\">" . valeur($sql) . "</td></tr>";

    $var = !$var;
    $sql = "SELECT count(*) FROM llx_facture";
    print "<tr $bc[$var]><td>Factures</td><td align=\"right\">" . valeur($sql) . "</td></tr>";


    print "</table>";

    $db->close();

}

llxFooter();
?>