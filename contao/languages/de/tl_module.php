<?php
/**
 * Google Custom Search
 * The google custom search extension provides frontend modules
 * to integrate a google custom search in your Contao website
 *
 * PHP version 5
 * @package    google-custom-search
 * @author     Martin Treml <mrtool@r2pi.net>
 * @copyright  Martin Treml <mrtool@r2pi.net>
 * @license    LGPL.
 */


/**
 * MOD
 */
$GLOBALS['TL_LANG']['FMD']['google-custom-search'] = array('Google Custom Search');
$GLOBALS['TL_LANG']['FMD']['gcs_searchEngine'] = array('Google Suchmaschine');

/**
 * Legend
 */
$GLOBALS['TL_LANG']['tl_module']['gcs_legend'] = 'Google Custom Search Einstellungen';
$GLOBALS['TL_LANG']['tl_module']['gcs_result_legend'] = 'Ergebnis Einstellungen';

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['gcs_type'] = array('Art der Suche', 'Normale Suche = Eingabe + Ergebnis');
$GLOBALS['TL_LANG']['tl_module']['gcs_engineID'] = array('Suchmaschinen-ID', '');
$GLOBALS['TL_LANG']['tl_module']['gcs_queryParameterName'] = array('Parameter Name', '');
$GLOBALS['TL_LANG']['tl_module']['gcs_modTemplate'] = array('Modul Template', '');
$GLOBALS['TL_LANG']['tl_module']['gcs_resultsUrl'] = array('Weiterleitungsseite', '');
$GLOBALS['TL_LANG']['tl_module']['gcs_gname'] = array('Link Name', 'Beschreibt ob 2 Suchmaschinen zusammengehören. Es muss bei beiden eine Weiterleitungsseite gesetzt sein damit dieses Feld funktioniert!');
$GLOBALS['TL_LANG']['tl_module']['gcs_linkTarget'] = array('Ergebnis Link Ziel', 'Hier können Sie auswählen wie die Links im Ergebnis sich verhalten');
$GLOBALS['TL_LANG']['tl_module']['gcs_newWindow'] = array('Neues Fenster', 'Soll die Suchergebnis Seite in einem neuen Fenster geöffnet werden?');
$GLOBALS['TL_LANG']['tl_module']['gcs_as_sitesearch'] = array('Ergebnis auf Seite einschränken', 'Geben Sie hier eine Unterseite an um die Ergebnisse darauf zu beschränken z.b.: /blog/* - nur ergebnisse anzeigen welche unter http://example.com/blog/* sind');

/**
 * References
 */
$GLOBALS['TL_LANG']['tl_module']['gcs']['search'] = 'Normale Suche';
$GLOBALS['TL_LANG']['tl_module']['gcs']['searchbox'] = 'Sucheingabe';
$GLOBALS['TL_LANG']['tl_module']['gcs']['searchresults'] = 'Suchergebnisse';
$GLOBALS['TL_LANG']['tl_module']['gcs']['_blank'] = 'Neue Seite';
$GLOBALS['TL_LANG']['tl_module']['gcs']['_parent'] = 'Selbe Seite';