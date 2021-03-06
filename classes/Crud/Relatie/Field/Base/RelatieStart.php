<?php
namespace Crud\Custom\NovumBrp\Relatie\Field\Base;

use Crud\Generic\Field\GenericDate;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IRequiredField;

/**
 * Base class that represents the 'relatie_start' crud field from the 'relatie' table.
 * This class is auto generated and should not be modified.
 */
abstract class RelatieStart extends GenericDate implements IFilterableField, IEditableField, IRequiredField
{
	protected $sFieldName = 'relatie_start';

	protected $sFieldLabel = 'Start relatie';

	protected $sIcon = 'calendar';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getRelatieStart';

	protected $sFqModelClassname = '\Model\Custom\NovumBrp\Persoonsgegevens\Relatie';


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


		if(!isset($aPostedData['relatie_start']))
		{
		     $mResponse = [];
		     $mResponse[] = 'Het veld "Start relatie" verplicht maar nog niet ingevuld.';
		}
		if(!empty($mParentResponse)){
		     $mResponse = array_merge($mResponse, $mParentResponse);
		}
		return $mResponse;
	}
}
