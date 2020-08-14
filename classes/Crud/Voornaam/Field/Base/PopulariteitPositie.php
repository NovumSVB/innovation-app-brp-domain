<?php
namespace Crud\Custom\NovumBrp\Voornaam\Field\Base;

use Crud\Generic\Field\GenericInteger;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'populariteit_positie' crud field from the 'data_voornaam' table.
 * This class is auto generated and should not be modified.
 */
abstract class PopulariteitPositie extends GenericInteger implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'populariteit_positie';

	protected $sFieldLabel = 'Populariteit positie';

	protected $sIcon = 'tag';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getPopulariteitPositie';

	protected $sFqModelClassname = '\Model\Custom\NovumBrp\Data\Voornaam';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function hasValidations()
	{
		return true;
	}


	public function validate($aPostedData)
	{
		$mResponse = false;
		$mParentResponse = parent::validate($aPostedData);


		if(!isset($aPostedData['populariteit_positie']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Populariteit positie" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
