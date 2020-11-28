<?php
// contao/dca/tl_content.php
/*
 * This file is part of xippogmbh/maps-bundle.
 *
 * (c) Aurelio Gisler (Xippo GmbH)
 *
 * @author     Aurelio Gisler
 * @package    XippoGmbHMaps
 * @license    MIT
 * @see        https://github.com/xippoGmbH/contao-maps-bundle
 *
 */

//$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_xippo_maps_marker';
$GLOBALS['TL_DCA']['tl_content']['fields']['content_maps'] = [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['content_maps'],
			'inputType' => 'select',
			'foreignKey' => 'tl_xippo_maps.title',
			'sql' => ['type' => 'integer', 'unsigned' => true, 'notnull' => true, 'default' => 0],
			'eval' => [
				'mandatory' => true,
				'includeBlankOption' => true
			]
		];
$GLOBALS['TL_DCA']['tl_content']['palettes']['xippo_maps'] = '{type_legend},type,headline;{maps_legend},content_maps;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space;';
