<?php

namespace Model\Custom\NovumBrp\Stam;

use Model\Custom\NovumBrp\Stam\Base\GemeenteQuery as BaseGemeenteQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'gemeente' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class GemeenteQuery extends BaseGemeenteQuery
{
    /**
     * @return array|null
     * @throws \Propel\Runtime\Exception\PropelException
     */
    function getRandom():Gemeente
    {
        $this->addAscendingOrderByColumn('rand()');
        return $this->findOne();
    }

}
