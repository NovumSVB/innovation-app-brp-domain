<?php
namespace Crud\Custom\NovumBrp\Persoon\Field;

use Crud\Custom\NovumBrp\Persoon\Field\Base\Vader as BaseVader;

/**
 * Skeleton subclass for representing vader_id field from the persoon table .
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
final class Vader extends BaseVader
{
    public function getLookups($mSelectedItem = null)
    {
        // @todo make this something like a google suggest
        $aAllRows = \Model\Custom\NovumBrp\Persoonsgegevens\PersoonQuery::create()->orderByBsn()->limit(1000)->find();
        $aOptions = \Core\Utils::makeSelectOptions($aAllRows, "getBsn", $mSelectedItem, "getId");
        return $aOptions;
    }

}
