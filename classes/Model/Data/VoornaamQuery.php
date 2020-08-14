<?php

namespace Model\Custom\NovumBrp\Data;

use Model\Custom\NovumBrp\Data\Base\VoornaamQuery as BaseVoornaamQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'data_voornaam' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class VoornaamQuery extends BaseVoornaamQuery
{
    /**
     * @return Voornaam
     */
    function getRandom():Voornaam
    {
        $this->addAscendingOrderByColumn('rand()');
        return $this->findOne();
    }
}
