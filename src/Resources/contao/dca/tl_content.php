// contao/dca/tl_content.php
$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_xippo_maps_marker';
$GLOBALS['TL_DCA']['tl_content']['fields']['mapsId'] = [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['mapsId'],
			'inputType' => 'select',
			'foreignKey' => 'tl_xippo_maps.title',
			'sql' => ['type' => 'integer', 'unsigned' => true, 'notnull' => true, 'default' => 0],
			'eval' => [
				'mandatory' => true,
				'includeBlankOption' => true
			]
		];
$GLOBALS['TL_DCA']['tl_content']['palettes']['mapsId'] = '{type_legend},type,headline;{maps_legend},mapsId;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';