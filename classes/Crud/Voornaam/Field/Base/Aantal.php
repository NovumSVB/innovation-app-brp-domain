<?php
namespace Crud\Custom\NovumBrp\Voornaam\Field\Base;

use Crud\Generic\Field\GenericInteger;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'aantal' crud field from the 'data_voornaam' table.
 * This class is auto generated and should not be modified.
 */
abstract class Aantal extends GenericInteger implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'aantal';

	protected $sFieldLabel = 'Aantal';

	protected $sIcon = 'tag';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getAantal';

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


		if(!isset($aPostedData['aantal']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Aantal" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
