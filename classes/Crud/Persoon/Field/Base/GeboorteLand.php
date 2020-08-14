<?php
namespace Crud\Custom\NovumBrp\Persoon\Field\Base;

use Core\Utils;
use Crud\Generic\Field\GenericLookup;
use Crud\IEditableField;
use Crud\IFilterableField;
use Crud\IFilterableLookupField;
use Model\Custom\NovumBrp\Stam\LandQuery;

/**
 * Base class that represents the 'geboorte_land_id' crud field from the 'persoon' table.
 * This class is auto generated and should not be modified.
 */
abstract class GeboorteLand extends GenericLookup implements IFilterableField, IEditableField, IFilterableLookupField
{
	protected $sFieldName = 'geboorte_land_id';

	protected $sFieldLabel = 'Geboorteland';

	protected $sIcon = 'map-marker';

	protected $sPlaceHolder = '';

	protected $sGetter = 'getGeboorteLand';

	protected $sFqModelClassname = '\Model\Custom\NovumBrp\Persoonsgegevens\Persoon';


	public function isUniqueKey(): bool
	{
		return false;
	}


	public function getLookups($mSelectedItem = null)
	{
		$aAllRows = \Model\Custom\NovumBrp\Stam\LandQuery::create()->orderByNaam()->find();
		$aOptions = \Core\Utils::makeSelectOptions($aAllRows, "getNaam", $mSelectedItem, "getId");
		return $aOptions;
	}


	public function getVisibleValue($iItemId = null)
	{
		if($iItemId){
		    return \Model\Custom\NovumBrp\Stam\LandQuery::create()->findOneById($iItemId)->getNaam();
		}
		return null;
	}


	public function getDataType(): string
	{
		return 'lookup';
	}
}
