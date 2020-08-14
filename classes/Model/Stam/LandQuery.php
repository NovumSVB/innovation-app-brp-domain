<?php

namespace Model\Custom\NovumBrp\Stam;

use Model\Custom\NovumBrp\Stam\Base\LandQuery as BaseLandQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'land' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class LandQuery extends BaseLandQuery
{

    function getRandom():Land
    {
        $this->addAscendingOrderByColumn('rand()');
        return $this->findOne();
    }
}
