<?php

namespace Model\Custom\NovumBrp\Data\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumBrp\Data\Geboorte as ChildGeboorte;
use Model\Custom\NovumBrp\Data\GeboorteQuery as ChildGeboorteQuery;
use Model\Custom\NovumBrp\Data\Map\GeboorteTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'data_geboorte' table.
 *
 *
 *
 * @method     ChildGeboorteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildGeboorteQuery orderByDatum($order = Criteria::ASC) Order by the datum column
 * @method     ChildGeboorteQuery orderByJongensGeboren($order = Criteria::ASC) Order by the jongens_geboren column
 * @method     ChildGeboorteQuery orderByMeisjesGeboren($order = Criteria::ASC) Order by the meisjes_geboren column
 *
 * @method     ChildGeboorteQuery groupById() Group by the id column
 * @method     ChildGeboorteQuery groupByDatum() Group by the datum column
 * @method     ChildGeboorteQuery groupByJongensGeboren() Group by the jongens_geboren column
 * @method     ChildGeboorteQuery groupByMeisjesGeboren() Group by the meisjes_geboren column
 *
 * @method     ChildGeboorteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGeboorteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGeboorteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGeboorteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGeboorteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGeboorteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGeboorte findOne(ConnectionInterface $con = null) Return the first ChildGeboorte matching the query
 * @method     ChildGeboorte findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGeboorte matching the query, or a new ChildGeboorte object populated from the query conditions when no match is found
 *
 * @method     ChildGeboorte findOneById(int $id) Return the first ChildGeboorte filtered by the id column
 * @method     ChildGeboorte findOneByDatum(string $datum) Return the first ChildGeboorte filtered by the datum column
 * @method     ChildGeboorte findOneByJongensGeboren(int $jongens_geboren) Return the first ChildGeboorte filtered by the jongens_geboren column
 * @method     ChildGeboorte findOneByMeisjesGeboren(int $meisjes_geboren) Return the first ChildGeboorte filtered by the meisjes_geboren column *

 * @method     ChildGeboorte requirePk($key, ConnectionInterface $con = null) Return the ChildGeboorte by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeboorte requireOne(ConnectionInterface $con = null) Return the first ChildGeboorte matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGeboorte requireOneById(int $id) Return the first ChildGeboorte filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeboorte requireOneByDatum(string $datum) Return the first ChildGeboorte filtered by the datum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeboorte requireOneByJongensGeboren(int $jongens_geboren) Return the first ChildGeboorte filtered by the jongens_geboren column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeboorte requireOneByMeisjesGeboren(int $meisjes_geboren) Return the first ChildGeboorte filtered by the meisjes_geboren column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGeboorte[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGeboorte objects based on current ModelCriteria
 * @method     ChildGeboorte[]|ObjectCollection findById(int $id) Return ChildGeboorte objects filtered by the id column
 * @method     ChildGeboorte[]|ObjectCollection findByDatum(string $datum) Return ChildGeboorte objects filtered by the datum column
 * @method     ChildGeboorte[]|ObjectCollection findByJongensGeboren(int $jongens_geboren) Return ChildGeboorte objects filtered by the jongens_geboren column
 * @method     ChildGeboorte[]|ObjectCollection findByMeisjesGeboren(int $meisjes_geboren) Return ChildGeboorte objects filtered by the meisjes_geboren column
 * @method     ChildGeboorte[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GeboorteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumBrp\Data\Base\GeboorteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumBrp\\Data\\Geboorte', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGeboorteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGeboorteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGeboorteQuery) {
            return $criteria;
        }
        $query = new ChildGeboorteQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildGeboorte|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GeboorteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GeboorteTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGeboorte A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, datum, jongens_geboren, meisjes_geboren FROM data_geboorte WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildGeboorte $obj */
            $obj = new ChildGeboorte();
            $obj->hydrate($row);
            GeboorteTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildGeboorte|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildGeboorteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GeboorteTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGeboorteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GeboorteTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeboorteQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GeboorteTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GeboorteTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeboorteTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the datum column
     *
     * Example usage:
     * <code>
     * $query->filterByDatum('2011-03-14'); // WHERE datum = '2011-03-14'
     * $query->filterByDatum('now'); // WHERE datum = '2011-03-14'
     * $query->filterByDatum(array('max' => 'yesterday')); // WHERE datum > '2011-03-13'
     * </code>
     *
     * @param     mixed $datum The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeboorteQuery The current query, for fluid interface
     */
    public function filterByDatum($datum = null, $comparison = null)
    {
        if (is_array($datum)) {
            $useMinMax = false;
            if (isset($datum['min'])) {
                $this->addUsingAlias(GeboorteTableMap::COL_DATUM, $datum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datum['max'])) {
                $this->addUsingAlias(GeboorteTableMap::COL_DATUM, $datum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeboorteTableMap::COL_DATUM, $datum, $comparison);
    }

    /**
     * Filter the query on the jongens_geboren column
     *
     * Example usage:
     * <code>
     * $query->filterByJongensGeboren(1234); // WHERE jongens_geboren = 1234
     * $query->filterByJongensGeboren(array(12, 34)); // WHERE jongens_geboren IN (12, 34)
     * $query->filterByJongensGeboren(array('min' => 12)); // WHERE jongens_geboren > 12
     * </code>
     *
     * @param     mixed $jongensGeboren The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeboorteQuery The current query, for fluid interface
     */
    public function filterByJongensGeboren($jongensGeboren = null, $comparison = null)
    {
        if (is_array($jongensGeboren)) {
            $useMinMax = false;
            if (isset($jongensGeboren['min'])) {
                $this->addUsingAlias(GeboorteTableMap::COL_JONGENS_GEBOREN, $jongensGeboren['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jongensGeboren['max'])) {
                $this->addUsingAlias(GeboorteTableMap::COL_JONGENS_GEBOREN, $jongensGeboren['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeboorteTableMap::COL_JONGENS_GEBOREN, $jongensGeboren, $comparison);
    }

    /**
     * Filter the query on the meisjes_geboren column
     *
     * Example usage:
     * <code>
     * $query->filterByMeisjesGeboren(1234); // WHERE meisjes_geboren = 1234
     * $query->filterByMeisjesGeboren(array(12, 34)); // WHERE meisjes_geboren IN (12, 34)
     * $query->filterByMeisjesGeboren(array('min' => 12)); // WHERE meisjes_geboren > 12
     * </code>
     *
     * @param     mixed $meisjesGeboren The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeboorteQuery The current query, for fluid interface
     */
    public function filterByMeisjesGeboren($meisjesGeboren = null, $comparison = null)
    {
        if (is_array($meisjesGeboren)) {
            $useMinMax = false;
            if (isset($meisjesGeboren['min'])) {
                $this->addUsingAlias(GeboorteTableMap::COL_MEISJES_GEBOREN, $meisjesGeboren['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($meisjesGeboren['max'])) {
                $this->addUsingAlias(GeboorteTableMap::COL_MEISJES_GEBOREN, $meisjesGeboren['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeboorteTableMap::COL_MEISJES_GEBOREN, $meisjesGeboren, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGeboorte $geboorte Object to remove from the list of results
     *
     * @return $this|ChildGeboorteQuery The current query, for fluid interface
     */
    public function prune($geboorte = null)
    {
        if ($geboorte) {
            $this->addUsingAlias(GeboorteTableMap::COL_ID, $geboorte->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the data_geboorte table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GeboorteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GeboorteTableMap::clearInstancePool();
            GeboorteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GeboorteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GeboorteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GeboorteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GeboorteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GeboorteQuery
