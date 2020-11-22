// contao/dca/tl_content.php
$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_xippo_maps_marker';
$GLOBALS['TL_DCA']['tl_content']['config']['ctable'] = ['tl_xippo_maps'];
$GLOBALS['TL_DCA']['tl_content']['fields']['xippo_maps'] = [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['xippo_maps'],
			'inputType' => 'select',
			'foreignKey' => 'tl_xippo_maps.title',
			'sql' => ['type' => 'integer', 'unsigned' => true, 'notnull' => true, 'default' => 0],
			'eval' => [
				'mandatory' => true,
				'includeBlankOption' => true
			]
		];
$GLOBALS['TL_DCA']['tl_content']['palettes']['xippo_maps'] = '{type_legend},type,headline;{maps_legend},xippo_maps;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';