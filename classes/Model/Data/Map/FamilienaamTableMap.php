<?php

namespace Model\Custom\NovumBrp\Data\Map;

use Model\Custom\NovumBrp\Data\Familienaam;
use Model\Custom\NovumBrp\Data\FamilienaamQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'data_familienaam' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FamilienaamTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Custom.NovumBrp.Data.Map.FamilienaamTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'hurah';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'data_familienaam';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Custom\\NovumBrp\\Data\\Familienaam';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Custom.NovumBrp.Data.Familienaam';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'data_familienaam.id';

    /**
     * the column name for the prefix field
     */
    const COL_PREFIX = 'data_familienaam.prefix';

    /**
     * the column name for the naam field
     */
    const COL_NAAM = 'data_familienaam.naam';

    /**
     * the column name for the in_top field
     */
    const COL_IN_TOP = 'data_familienaam.in_top';

    /**
     * the column name for the rang field
     */
    const COL_RANG = 'data_familienaam.rang';

    /**
     * the column name for the aantal_2007 field
     */
    const COL_AANTAL_2007 = 'data_familienaam.aantal_2007';

    /**
     * the column name for the aantal_1947 field
     */
    const COL_AANTAL_1947 = 'data_familienaam.aantal_1947';

    /**
     * the column name for the calc_aantal_huidig_jaar field
     */
    const COL_CALC_AANTAL_HUIDIG_JAAR = 'data_familienaam.calc_aantal_huidig_jaar';

    /**
     * the column name for the calc_ppm field
     */
    const COL_CALC_PPM = 'data_familienaam.calc_ppm';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'data_familienaam.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'data_familienaam.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Prefix', 'Naam', 'InTop', 'Rang', 'Aantal2007', 'Aantal1947', 'CalcAantalHuidigJaar', 'CalcPpm', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'prefix', 'naam', 'inTop', 'rang', 'aantal2007', 'aantal1947', 'calcAantalHuidigJaar', 'calcPpm', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(FamilienaamTableMap::COL_ID, FamilienaamTableMap::COL_PREFIX, FamilienaamTableMap::COL_NAAM, FamilienaamTableMap::COL_IN_TOP, FamilienaamTableMap::COL_RANG, FamilienaamTableMap::COL_AANTAL_2007, FamilienaamTableMap::COL_AANTAL_1947, FamilienaamTableMap::COL_CALC_AANTAL_HUIDIG_JAAR, FamilienaamTableMap::COL_CALC_PPM, FamilienaamTableMap::COL_CREATED_AT, FamilienaamTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'prefix', 'naam', 'in_top', 'rang', 'aantal_2007', 'aantal_1947', 'calc_aantal_huidig_jaar', 'calc_ppm', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Prefix' => 1, 'Naam' => 2, 'InTop' => 3, 'Rang' => 4, 'Aantal2007' => 5, 'Aantal1947' => 6, 'CalcAantalHuidigJaar' => 7, 'CalcPpm' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'prefix' => 1, 'naam' => 2, 'inTop' => 3, 'rang' => 4, 'aantal2007' => 5, 'aantal1947' => 6, 'calcAantalHuidigJaar' => 7, 'calcPpm' => 8, 'createdAt' => 9, 'updatedAt' => 10, ),
        self::TYPE_COLNAME       => array(FamilienaamTableMap::COL_ID => 0, FamilienaamTableMap::COL_PREFIX => 1, FamilienaamTableMap::COL_NAAM => 2, FamilienaamTableMap::COL_IN_TOP => 3, FamilienaamTableMap::COL_RANG => 4, FamilienaamTableMap::COL_AANTAL_2007 => 5, FamilienaamTableMap::COL_AANTAL_1947 => 6, FamilienaamTableMap::COL_CALC_AANTAL_HUIDIG_JAAR => 7, FamilienaamTableMap::COL_CALC_PPM => 8, FamilienaamTableMap::COL_CREATED_AT => 9, FamilienaamTableMap::COL_UPDATED_AT => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'prefix' => 1, 'naam' => 2, 'in_top' => 3, 'rang' => 4, 'aantal_2007' => 5, 'aantal_1947' => 6, 'calc_aantal_huidig_jaar' => 7, 'calc_ppm' => 8, 'created_at' => 9, 'updated_at' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('data_familienaam');
        $this->setPhpName('Familienaam');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Custom\\NovumBrp\\Data\\Familienaam');
        $this->setPackage('Model.Custom.NovumBrp.Data');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('prefix', 'Prefix', 'VARCHAR', false, 255, null);
        $this->addColumn('naam', 'Naam', 'VARCHAR', true, 255, null);
        $this->addColumn('in_top', 'InTop', 'BOOLEAN', false, 1, false);
        $this->addColumn('rang', 'Rang', 'INTEGER', false, null, 0);
        $this->addColumn('aantal_2007', 'Aantal2007', 'INTEGER', false, null, null);
        $this->addColumn('aantal_1947', 'Aantal1947', 'INTEGER', false, null, null);
        $this->addColumn('calc_aantal_huidig_jaar', 'CalcAantalHuidigJaar', 'INTEGER', false, null, null);
        $this->addColumn('calc_ppm', 'CalcPpm', 'INTEGER', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? FamilienaamTableMap::CLASS_DEFAULT : FamilienaamTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Familienaam object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FamilienaamTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FamilienaamTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FamilienaamTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FamilienaamTableMap::OM_CLASS;
            /** @var Familienaam $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FamilienaamTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = FamilienaamTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FamilienaamTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Familienaam $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FamilienaamTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(FamilienaamTableMap::COL_ID);
            $criteria->addSelectColumn(FamilienaamTableMap::COL_PREFIX);
            $criteria->addSelectColumn(FamilienaamTableMap::COL_NAAM);
            $criteria->addSelectColumn(FamilienaamTableMap::COL_IN_TOP);
            $criteria->addSelectColumn(FamilienaamTableMap::COL_RANG);
            $criteria->addSelectColumn(FamilienaamTableMap::COL_AANTAL_2007);
            $criteria->addSelectColumn(FamilienaamTableMap::COL_AANTAL_1947);
            $criteria->addSelectColumn(FamilienaamTableMap::COL_CALC_AANTAL_HUIDIG_JAAR);
            $criteria->addSelectColumn(FamilienaamTableMap::COL_CALC_PPM);
            $criteria->addSelectColumn(FamilienaamTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(FamilienaamTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.prefix');
            $criteria->addSelectColumn($alias . '.naam');
            $criteria->addSelectColumn($alias . '.in_top');
            $criteria->addSelectColumn($alias . '.rang');
            $criteria->addSelectColumn($alias . '.aantal_2007');
            $criteria->addSelectColumn($alias . '.aantal_1947');
            $criteria->addSelectColumn($alias . '.calc_aantal_huidig_jaar');
            $criteria->addSelectColumn($alias . '.calc_ppm');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(FamilienaamTableMap::DATABASE_NAME)->getTable(FamilienaamTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FamilienaamTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FamilienaamTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FamilienaamTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Familienaam or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Familienaam object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FamilienaamTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Custom\NovumBrp\Data\Familienaam) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FamilienaamTableMap::DATABASE_NAME);
            $criteria->add(FamilienaamTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = FamilienaamQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FamilienaamTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FamilienaamTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the data_familienaam table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FamilienaamQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Familienaam or Criteria object.
     *
     * @param mixed               $criteria Criteria or Familienaam object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FamilienaamTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Familienaam object
        }

        if ($criteria->containsKey(FamilienaamTableMap::COL_ID) && $criteria->keyContainsValue(FamilienaamTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FamilienaamTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = FamilienaamQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FamilienaamTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FamilienaamTableMap::buildTableMap();
