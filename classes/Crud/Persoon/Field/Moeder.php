<?php
namespace Crud\Custom\NovumBrp\Persoon\Field;

use Crud\Custom\NovumBrp\Persoon\Field\Base\Moeder as BaseMoeder;

/**
 * Skeleton subclass for representing moeder_id field from the persoon table .
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
final class Moeder extends BaseMoeder
{
    public function getLookups($mSelectedItem = null)
    {
        $aAllRows = \Model\Custom\NovumBrp\Persoonsgegevens\PersoonQuery::create()->limit(1000)->orderByBsn()->find();
        $aOptions = \Core\Utils::makeSelectOptions($aAllRows, "getBsn", $mSelectedItem, "getId");
        return $aOptions;
    }
}
