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
declare(strict_types=1);

namespace XippoGmbH\MapsBundle\Controller;

use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\ContentModel;
use Contao\FilesModel;
use Contao\Frontend;
use Contao\Image;
use Contao\Model;
use Contao\Template;
use XippoGmbH\MapsBundle\Model\MapsModel;
use XippoGmbH\MapsBundle\Model\MapsMarkerModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MapsController extends AbstractContentElementController
{
	public function __construct(ContaoFramework $framework)
    {
        $this->framework = $framework;
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
		$maps = MapsModel::findBy('id', $model->content_maps);

		if (!$maps instanceof MapsModel) {
            return $template->getResponse();
        }

		\System::log('Maps gefunden, die ID ist: ' . $maps->id, __METHOD__, TL_GENERAL);

		$tempMapsMarkers = MapsMarkerModel::findBy('pid', $maps->id);

		$maps->mapsMarkerCount = count($tempMapsMarkers);
		$maps->mapHeight = \StringUtil::deserialize($maps->height);
		$maps->mapWidth = \StringUtil::deserialize($maps->width);

		$template->maps = $maps;
        $mapsMarkers = [];

		if($tempMapsMarkers->count() > 0)
		{
			foreach($tempMapsMarkers as $tempMapsMarker)
			{
				\System::log('Maps Item ID: ' . $tempMapsMarker->id, __METHOD__, TL_GENERAL);

                $elements = [];

				$content = ContentModel::findPublishedByPidAndTable($tempMapsMarker->id, 'tl_xippo_maps_marker');

				if (null !== $content) {
					$count = 0;
					$last = $content->count() - 1;

					while ($content->next()) {
						$css = [];

						/** @var ContentModel $objRow */
						$row = $content->current();

						if (0 === $count) {
							$css[] = 'first';
						}

						if ($count === $last) {
							$css[] = 'last';
						}

						$row->classes = $css;
						$elements[] = Frontend::getContentElement($row, $model->strColumn);
						++$count;
					}
				}

				$tempMapsMarker->content = $elements;

				$mapsMarkers[] = $tempMapsMarker;
			}
		}

		$template->mapsMarkers = $mapsMarkers;

        return $template->getResponse();
    }
}
