<?php
/**
 * This file is part of a Xippo GmbH Contao Maps Bundle.
 *
 * (c) Aurelio Gisler (Xippo GmbH)
 *
 * @author     Aurelio Gisler
 * @package    ContaoMaps
 * @license    MIT
 * @see        https://github.com/xippoGmbH/contao-maps-bundle
 *
 */
// Backend modules
$GLOBALS['BE_MOD']['content']['content_maps']['tables'][] = 'tl_content';
$GLOBALS['BE_MOD']['content']['content_maps']['tables'][] = 'tl_xippo_maps';
$GLOBALS['BE_MOD']['content']['content_maps']['tables'][] = 'tl_xippo_maps_marker';
// Models
$GLOBALS['TL_MODELS']['tl_xippo_maps'] = \XippoGmbH\ContaoMapsBundle\Model\MapsModel::class;
$GLOBALS['TL_MODELS']['tl_xippo_maps_marker'] = \XippoGmbH\ContaoMapsBundle\Model\MapsMarkerModel::class;