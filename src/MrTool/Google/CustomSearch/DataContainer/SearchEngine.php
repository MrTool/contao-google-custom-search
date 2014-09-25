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


namespace MrTool\Google\CustomSearch\DataContainer;

use Contao\Model;

class SearchEngine extends \Controller
{

    /**
     * @var array data
     */
    protected $arrData;

    /**
     * @var string prefix of data fields
     */
    protected $strDataPrefix = 'gcs_';

    /**
     * @var array of fields who are not data attributes
     */
    protected $arrOwnAttributes = array('gcs_type', 'gcs_engineID', 'gcs_modTemplate');

    /**
     * @var array contains all dataAttributes
     */
    protected $arrDataAttributes;

    /**
     * @var array of special attribute parsing
     */
    protected $specialAttributes = array('gcs_resultsUrl', 'gcs_newWindow', 'gcs_gname');

    /**
     * Create an SearchEngine DataContainer
     * @param array $arrData
     */
    public function __construct(array $arrData = array())
    {
        if (!empty($arrData)) {
            $this->arrData = $arrData;
            $this->parseGivenData();
        }
    }

    /**
     * Set the DataContainer data with an object of type Model
     * @param Model $objModel
     */
    public function setDataFromModel(Model $objModel)
    {

        $arrData = $objModel->row();

        foreach ($arrData AS $key => $value) {
            if (strpos($key, $this->strDataPrefix) !== false) {
                $this->arrData[$key] = $value;
            }
        }

        $this->parseGivenData();
    }

    /**
     * magic getter
     * @param string $strField
     * @return mixed|null|string
     */
    public function __get($strField)
    {

        switch($strField){
            case 'class':
                    return 'gcse-'.$this->arrData['gcs_type'];
                break;
        }

        if (isset($this->arrData[$strField])) {
            return $this->arrData[$strField];
        }

        return null;
    }

    /**
     * magic setter
     * @param $strField
     * @param $mixedValue
     * @return mixed $mixedValue
     */
    public function __set($strField, $mixedValue)
    {
        return $this->arrData[$strField] = $mixedValue;
    }

    /**
     * Getter for attributes
     * @param $strField
     * @return mixed|null|string
     */
    public function getAttribute($strField)
    {

        if (isset($this->arrDataAttributes[$strField])) {
            return $this->arrDataAttributes[$strField];
        }

        return null;

    }

    /**
     * Setter for attributes
     * @param $strField
     * @param $mixedValue
     * @return mixed $mixedValue
     */
    public function setAttribute($strField, $mixedValue)
    {
        return $this->arrDataAttributes[$strField] = $mixedValue;
    }

    /**
     * Get all data attributes in parsed html form
     * @return string
     */
    public function getParsedDataAttributes()
    {
        $strResult = '';
        foreach ($this->arrDataAttributes AS $key => $value) {
            $strResult .= ' data-' . str_replace($this->strDataPrefix, '', $key) . '="' . $value . '"';
        }
        return $strResult;
    }

    /**
     * Parse the given data in to use able form
     */
    protected function parseGivenData()
    {

        foreach ($this->arrData AS $key => $value) {
            if (!in_array($key, $this->arrOwnAttributes)) {
                if (in_array($key, $this->specialAttributes)) {
                    $value = $this->parseSpecialAttribute($key, $value);
                }

                if (!empty($value) AND !is_null($value)) {
                    $this->arrDataAttributes[$key] = $value;
                }
                unset($this->arrData[$key]);
            }
        }
    }

    /**
     * Parse special attributes defined in the $this->specialAttributes
     * @param string $key
     * @param mixed $value
     * @return null|string|mixed
     */
    protected function parseSpecialAttribute($key, $value)
    {

        switch ($key) {

            /**
             * Parse the resultsUrl and set correct type if search input
             * is not on the result Url
             */
            case 'gcs_resultsUrl':
                if(!$value) { return null; }
                global $objPage;
                if($objPage->id == $value){
                    return null;
                }else{
                    $this->arrData['gcs_type'] = $this->arrData['gcs_type'].'-only';
                }
                $objJumpToPage = \PageModel::findByPk($value);
                $value = $this->generateFrontendUrl($objJumpToPage->row());
                break;

            /**
             * Set correct value for checkboxes
             */
            case 'gcs_newWindow':
                $value = $value ? 'true' : null;
                break;
        }

        return $value;
    }

} 