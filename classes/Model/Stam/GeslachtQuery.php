<?php

namespace Model\Custom\NovumBrp\Stam;

use Model\Custom\NovumBrp\Stam\Base\GeslachtQuery as BaseGeslachtQuery;
use Propel\Runtime\ActiveQuery\Criteria;

/**
 * Skeleton subclass for performing query and update operations on the 'geslacht' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class GeslachtQuery extends BaseGeslachtQuery
{
    /**
     * @return Geslacht
     */
    function getRandom():Geslacht
    {
        $this->addAscendingOrderByColumn('rand()');
        $this->filterByNaamKort(['M', 'V'], Criteria::IN);
        return $this->findOne();
    }

}
