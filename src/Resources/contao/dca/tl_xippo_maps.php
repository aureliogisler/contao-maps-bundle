<?php
// contao/dca/tl_xippo_maps.php
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
declare(strict_types=1);

$GLOBALS['TL_DCA']['tl_xippo_maps'] = [
    'config' => [
        'dataContainer' => 'Table',
        'ctable' => ['tl_xippo_maps_marker'],
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ],
        ], 
    ],
    'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => ['title'],
            'flag' => 1,
            'panelLayout' => 'search,limit'
        ],
        'label' => [
            'fields' => ['title'],
            'format' => '%s',
        ],
        'operations' => [
            'edit' => [
                'href' => 'table=tl_xippo_maps_marker',
                'icon' => 'edit.svg',
            ],
            'editheader' => [
                'href' => 'act=edit',
                'icon' => 'header.svg',
            ],
            'delete' => [
                'href' => 'act=delete',
                'icon' => 'delete.svg',
            ],
            'show' => [
                'href' => 'act=show',
                'icon' => 'show.svg'
            ],
        ],
    ],
    'fields' => [
        'id' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'autoincrement' => true],
        ],
        'tstamp' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0]
        ],
        'title' => [
            'label' => &$GLOBALS['TL_LANG']['tl_xippo_maps']['title'],
            'search' => true,
            'inputType' => 'text',
            'eval' => ['tl_class' => 'w50', 'maxlength' => 255, 'mandatory' => true],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => '']
        ],
		'width' => [
			'label' => &$GLOBALS['TL_LANG']['tl_xippo_maps']['width'],
			'exclude' => true,
			'inputType' => 'inputUnit',
			'options' => ['px', '%'],
			'eval' => [
				'rgxp'=>'digit_auto_inherit',
				'tl_class'=>'long',
				'includeBlankOption'=>true
			],
			'sql' => [ 'type' => 'string', 'length' => 64, 'notnull' => true, 'default' => '' ],
		],
        'height' => [
			'label' => &$GLOBALS['TL_LANG']['tl_xippo_maps']['height'],
			'exclude' => true,
			'inputType' => 'inputUnit',
			'options' => ['px', '%', 'vh'],
			'eval' => [
				'rgxp' => 'digit_auto_inherit',
				'tl_class' => 'long',
				'includeBlankOption' => true
			],
			'sql' => [ 'type' => 'string', 'length' => 64, 'notnull' => true, 'default' => '' ],
		],
		'center_geox' => [
			'label' => &$GLOBALS['TL_LANG']['tl_xippo_maps']['center_geox'],
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['maxlength' => 20, 'tl_class' => 'w50 wizard', 'require_input' => true],
			'sql' => [ 'type' => 'string', 'length' => 20, 'notnull' => true, 'default' => '' ],
		],
        'center_geoy' => [
			'label' => &$GLOBALS['TL_LANG']['tl_xippo_maps']['center_geoy'],
			'exclude' => true,
			'inputType' => 'text',
			'eval' => ['maxlength' => 20, 'tl_class' => 'w50 wizard', 'require_input' => true],
			'sql' => [ 'type' => 'string', 'length' => 20, 'notnull' => true, 'default' => '' ],
		],
		'zoom' => [
			'label' => &$GLOBALS['TL_LANG']['tl_xippo_maps']['zoom'],
			'exclude' => true,
			'inputType' => 'text',
			'default' => '10',
			'eval' => ['tl_class' => 'clr'],
			'sql' => [ 'type' => 'string', 'length' => 20, 'notnull' => true, 'default' => '10' ],
		],
        'cssID' => [
			'label' => &$GLOBALS['TL_LANG']['tl_xippo_maps']['cssID'],
            'exclude' => true,
            'inputType' => 'text',
            'eval' => [ 'multiple' => true, 'size' => 2, 'tl_class' => 'w50 clr', ],
            'sql' => [ 'type' => 'string', 'length' => 255, 'notnull' => true, 'default' => '' ],
        ],
    ],
    'palettes' => [
        'default' => '{maps_legend},title;{maps_detail_legend},width,height,center_geox,center_geoy,zoom;{expert_legend:hide},cssID;'
    ],
];
