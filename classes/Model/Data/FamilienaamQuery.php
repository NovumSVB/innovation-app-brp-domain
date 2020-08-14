<?php

namespace Model\Custom\NovumBrp\Data;

use Model\Custom\NovumBrp\Data\Base\FamilienaamQuery as BaseFamilienaamQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'data_familienaam' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class FamilienaamQuery extends BaseFamilienaamQuery
{
    /**
     * @return Familienaam
     */
    function getRandom():Familienaam
    {
        $this->addAscendingOrderByColumn('rand()');
        $this->filterByInTop(1);
        return $this->findOne();
    }
}
