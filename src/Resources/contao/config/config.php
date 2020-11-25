<?php
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
// Backend modules
$GLOBALS['BE_MOD']['content']['xippo_maps'] = ['tables' => ['tl_xippo_maps','tl_xippo_maps_marker','tl_content'],];

// Models
$GLOBALS['TL_MODELS']['tl_xippo_maps'] = \XippoGmbH\MapsBundle\Model\MapsModel::class;
$GLOBALS['TL_MODELS']['tl_xippo_maps_marker'] = \XippoGmbH\MapsBundle\Model\MapsMarkerModel::class;