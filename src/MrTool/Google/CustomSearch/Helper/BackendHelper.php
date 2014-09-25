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


namespace MrTool\Google\CustomSearch\Helper;


class BackendHelper extends \Backend {


    /**
     * Returns an array with all found templates prefixing "mod_gcs_"
     * @return array
     */
    public function getModTemplates()
    {
        return $this->getTemplateGroup('mod_gcs_');
    }

} 