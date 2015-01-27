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
 * Palette definition
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['gcs_searchEngine'] = '{title_legend},name,gcs_type,type;{gcs_legend},gcs_engineID,gcs_queryParameterName,gcs_gname,gcs_newWindow,gcs_resultsUrl;{gcs_result_legend},gcs_linkTarget,gcs_as_sitesearch;{template_legend},gcs_modTemplate;{expert_legend:hide},cssID';

/**
 * Field definition
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['gcs_type'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['gcs_type'],
    'inputType' => 'select',
    'options' => array('search', 'searchbox', 'searchresults'),
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['gcs'],
    'eval' => array('mandatory' => true, 'tl_class' => 'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gcs_engineID'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['gcs_engineID'],
    'inputType' => 'text',
    'eval' => array('mandatory' => true, 'tl_class' => 'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gcs_queryParameterName'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['gcs_queryParameterName'],
    'inputType' => 'text',
    'eval' => array('mandatory' => true, 'tl_class' => 'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gcs_newWindow'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['gcs_newWindow'],
    'inputType' => 'checkbox',
    'eval' => array('tl_class' => 'clr'),
    'sql' => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gcs_modTemplate'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['gcs_modTemplate'],
    'inputType' => 'select',
    'options_callback' => array('MrTool\Google\CustomSearch\Helper\BackendHelper', 'getModTemplates'),
    'eval' => array('tl_class' => 'clr'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gcs_gname'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['gcs_gname'],
    'inputType' => 'text',
    'eval' => array('tl_class' => 'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gcs_linkTarget'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['gcs_linkTarget'],
    'inputType' => 'select',
    'options' => array('_blank', '_parent'),
    'reference' => &$GLOBALS['TL_LANG']['tl_module']['gcs'],
    'eval' => array('tl_class' => 'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gcs_resultsUrl'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['gcs_resultsUrl'],
    'inputType' => 'pageTree',
    'foreignKey' => 'tl_page.title',
    'eval' => array('fieldType' => 'radio'),
    'sql' => "int(10) unsigned NOT NULL default '0'",
    'relation' => array('type' => 'hasOne', 'load' => 'eager')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['gcs_as_sitesearch'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_module']['gcs_as_sitesearch'],
    'inputType' => 'text',
    'eval' => array('tl_class' => 'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);