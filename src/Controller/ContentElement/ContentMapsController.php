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
declare(strict_types=1);

namespace XippoGmbH\ContaoMapsBundle\Controller\ContentElement;

use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\ContentModel;
use Contao\FilesModel;
use Contao\Frontend;
use Contao\Image;
use Contao\Model;
use Contao\Template;
use XippoGmbH\ContaoMapsBundle\Model\MapsModel;
use XippoGmbH\ContaoMapsBundle\Model\MapsMarkerModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement(category="xippo_elements")
 */
class ContentMapsController extends AbstractContentElementController
{
	public function __construct(ContaoFramework $framework)
    {
        $this->framework = $framework;
    }
	
    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
		$maps = MapsModel::findBy('id', $model->maps_id);
		
		if (!$maps instanceof MapsModel) {
            return $template->getResponse();
        }
		
		\System::log('Maps gefunden, die ID ist: ' . $maps->id, __METHOD__, TL_GENERAL);
		
		$options = [
			'order' => 'sorting ASC'
		];
		$tempMapsMarkers = MapsMarkerModel::findBy('pid', $maps->id, $options);
		
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
				
				if($tempMapsMarker->singleSRC != '')
				{
					$fileModel = FilesModel::findByUuid($tempMapsMarker->singleSRC);
				
					$file = new \File($fileModel->path);
					$img = new Image($file);

					$imgSize = $file->imageSize;
					// TODO: implement image size

					$tempMapsMarker->image = $img;
				}
				
				$mapsMarkers[] = $tempMapsMarker;
			}
		}
		
		$template->mapsMarkers = $mapsMarkers;
		
        return $template->getResponse();
    }
}