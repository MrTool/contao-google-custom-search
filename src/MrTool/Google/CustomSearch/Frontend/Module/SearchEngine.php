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


namespace MrTool\Google\CustomSearch\Frontend\Module;


use Contao\FrontendTemplate;
use MrTool\Google\CustomSearch\DataContainer\SearchEngine AS DCSearchEngine;

class SearchEngine extends \Module {

    /**
     * @var string templateName
     */
    protected $strTemplate = 'mod_gcs_searchEngine';

    /**
     * Display a wildcard in the back end
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            $objTemplate = new \BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### Google Custom Search - '.strtoupper($this->gcs_type).' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $objTemplate->parse();
        }

        return parent::generate();
    }

    /**
     * Compile the current element
     */
    protected function compile()
    {

        /**
         * Check if module template should be overwritten
         */
        if($this->gcs_modTemplate != $this->strTemplate && !empty($this->gcs_modTemplate)){
            $this->Template = new \FrontendTemplate($this->gcs_modTemplate);
        }


        /**
         * Check if javascript is already included
         * **There is no possibility to use 2 JS custom searches at once**
         */
        if(!$GLOBALS['gcs']['jsAdded']){
            $GLOBALS['gcs']['jsAdded'] = true;
            $objJSTemplate = new FrontendTemplate('js_gcs_searchEngine');
            $objJSTemplate->gcs_engineID = $this->gcs_engineID;
            $this->Template->gcs_js = $objJSTemplate->parse();
        }else{
            $this->Template->gcs_js = null;
        }

        /**
         * Create an SearchEngine DataContainer
         * and feed it with the ModuleModel
         */
        $objSearchEngine = new DCSearchEngine();
        $objSearchEngine->setDataFromModel($this->objModel);

        // assign the SearchEngine to the Template
        $this->Template->GSE = $objSearchEngine;

    }

} 