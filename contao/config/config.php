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
 * Register frontend modules
 */
$GLOBALS['FE_MOD']['google-custom-search'] = array(
    'gcs_searchEngine' => 'MrTool\Google\CustomSearch\Frontend\Module\SearchEngine',
);


/**
 * Global values
 */
$GLOBALS['GCS']['jsAdded'] = false;