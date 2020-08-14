<?php

namespace Model\Custom\NovumBrp\Data\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumBrp\Data\Voornaam as ChildVoornaam;
use Model\Custom\NovumBrp\Data\VoornaamQuery as ChildVoornaamQuery;
use Model\Custom\NovumBrp\Data\Map\VoornaamTableMap;
use Model\Custom\NovumBrp\Stam\Geslacht;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'data_voornaam' table.
 *
 *
 *
 * @method     ChildVoornaamQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildVoornaamQuery orderByNaam($order = Criteria::ASC) Order by the naam column
 * @method     ChildVoornaamQuery orderByGeslachtId($order = Criteria::ASC) Order by the geslacht_id column
 * @method     ChildVoornaamQuery orderByAantal($order = Criteria::ASC) Order by the aantal column
 * @method     ChildVoornaamQuery orderByPopulariteitPositie($order = Criteria::ASC) Order by the populariteit_positie column
 * @method     ChildVoornaamQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildVoornaamQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildVoornaamQuery groupById() Group by the id column
 * @method     ChildVoornaamQuery groupByNaam() Group by the naam column
 * @method     ChildVoornaamQuery groupByGeslachtId() Group by the geslacht_id column
 * @method     ChildVoornaamQuery groupByAantal() Group by the aantal column
 * @method     ChildVoornaamQuery groupByPopulariteitPositie() Group by the populariteit_positie column
 * @method     ChildVoornaamQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildVoornaamQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildVoornaamQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVoornaamQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVoornaamQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVoornaamQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVoornaamQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVoornaamQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVoornaamQuery leftJoinGeslacht($relationAlias = null) Adds a LEFT JOIN clause to the query using the Geslacht relation
 * @method     ChildVoornaamQuery rightJoinGeslacht($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Geslacht relation
 * @method     ChildVoornaamQuery innerJoinGeslacht($relationAlias = null) Adds a INNER JOIN clause to the query using the Geslacht relation
 *
 * @method     ChildVoornaamQuery joinWithGeslacht($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Geslacht relation
 *
 * @method     ChildVoornaamQuery leftJoinWithGeslacht() Adds a LEFT JOIN clause and with to the query using the Geslacht relation
 * @method     ChildVoornaamQuery rightJoinWithGeslacht() Adds a RIGHT JOIN clause and with to the query using the Geslacht relation
 * @method     ChildVoornaamQuery innerJoinWithGeslacht() Adds a INNER JOIN clause and with to the query using the Geslacht relation
 *
 * @method     \Model\Custom\NovumBrp\Stam\GeslachtQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildVoornaam findOne(ConnectionInterface $con = null) Return the first ChildVoornaam matching the query
 * @method     ChildVoornaam findOneOrCreate(ConnectionInterface $con = null) Return the first ChildVoornaam matching the query, or a new ChildVoornaam object populated from the query conditions when no match is found
 *
 * @method     ChildVoornaam findOneById(int $id) Return the first ChildVoornaam filtered by the id column
 * @method     ChildVoornaam findOneByNaam(string $naam) Return the first ChildVoornaam filtered by the naam column
 * @method     ChildVoornaam findOneByGeslachtId(int $geslacht_id) Return the first ChildVoornaam filtered by the geslacht_id column
 * @method     ChildVoornaam findOneByAantal(int $aantal) Return the first ChildVoornaam filtered by the aantal column
 * @method     ChildVoornaam findOneByPopulariteitPositie(int $populariteit_positie) Return the first ChildVoornaam filtered by the populariteit_positie column
 * @method     ChildVoornaam findOneByCreatedAt(string $created_at) Return the first ChildVoornaam filtered by the created_at column
 * @method     ChildVoornaam findOneByUpdatedAt(string $updated_at) Return the first ChildVoornaam filtered by the updated_at column *

 * @method     ChildVoornaam requirePk($key, ConnectionInterface $con = null) Return the ChildVoornaam by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoornaam requireOne(ConnectionInterface $con = null) Return the first ChildVoornaam matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVoornaam requireOneById(int $id) Return the first ChildVoornaam filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoornaam requireOneByNaam(string $naam) Return the first ChildVoornaam filtered by the naam column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoornaam requireOneByGeslachtId(int $geslacht_id) Return the first ChildVoornaam filtered by the geslacht_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoornaam requireOneByAantal(int $aantal) Return the first ChildVoornaam filtered by the aantal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoornaam requireOneByPopulariteitPositie(int $populariteit_positie) Return the first ChildVoornaam filtered by the populariteit_positie column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoornaam requireOneByCreatedAt(string $created_at) Return the first ChildVoornaam filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVoornaam requireOneByUpdatedAt(string $updated_at) Return the first ChildVoornaam filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVoornaam[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildVoornaam objects based on current ModelCriteria
 * @method     ChildVoornaam[]|ObjectCollection findById(int $id) Return ChildVoornaam objects filtered by the id column
 * @method     ChildVoornaam[]|ObjectCollection findByNaam(string $naam) Return ChildVoornaam objects filtered by the naam column
 * @method     ChildVoornaam[]|ObjectCollection findByGeslachtId(int $geslacht_id) Return ChildVoornaam objects filtered by the geslacht_id column
 * @method     ChildVoornaam[]|ObjectCollection findByAantal(int $aantal) Return ChildVoornaam objects filtered by the aantal column
 * @method     ChildVoornaam[]|ObjectCollection findByPopulariteitPositie(int $populariteit_positie) Return ChildVoornaam objects filtered by the populariteit_positie column
 * @method     ChildVoornaam[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildVoornaam objects filtered by the created_at column
 * @method     ChildVoornaam[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildVoornaam objects filtered by the updated_at column
 * @method     ChildVoornaam[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class VoornaamQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumBrp\Data\Base\VoornaamQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumBrp\\Data\\Voornaam', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVoornaamQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVoornaamQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildVoornaamQuery) {
            return $criteria;
        }
        $query = new ChildVoornaamQuery();
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
     * @return ChildVoornaam|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VoornaamTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = VoornaamTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildVoornaam A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, naam, geslacht_id, aantal, populariteit_positie, created_at, updated_at FROM data_voornaam WHERE id = :p0';
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
            /** @var ChildVoornaam $obj */
            $obj = new ChildVoornaam();
            $obj->hydrate($row);
            VoornaamTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildVoornaam|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VoornaamTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VoornaamTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VoornaamTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the naam column
     *
     * Example usage:
     * <code>
     * $query->filterByNaam('fooValue');   // WHERE naam = 'fooValue'
     * $query->filterByNaam('%fooValue%', Criteria::LIKE); // WHERE naam LIKE '%fooValue%'
     * </code>
     *
     * @param     string $naam The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function filterByNaam($naam = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($naam)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VoornaamTableMap::COL_NAAM, $naam, $comparison);
    }

    /**
     * Filter the query on the geslacht_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGeslachtId(1234); // WHERE geslacht_id = 1234
     * $query->filterByGeslachtId(array(12, 34)); // WHERE geslacht_id IN (12, 34)
     * $query->filterByGeslachtId(array('min' => 12)); // WHERE geslacht_id > 12
     * </code>
     *
     * @see       filterByGeslacht()
     *
     * @param     mixed $geslachtId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function filterByGeslachtId($geslachtId = null, $comparison = null)
    {
        if (is_array($geslachtId)) {
            $useMinMax = false;
            if (isset($geslachtId['min'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_GESLACHT_ID, $geslachtId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geslachtId['max'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_GESLACHT_ID, $geslachtId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VoornaamTableMap::COL_GESLACHT_ID, $geslachtId, $comparison);
    }

    /**
     * Filter the query on the aantal column
     *
     * Example usage:
     * <code>
     * $query->filterByAantal(1234); // WHERE aantal = 1234
     * $query->filterByAantal(array(12, 34)); // WHERE aantal IN (12, 34)
     * $query->filterByAantal(array('min' => 12)); // WHERE aantal > 12
     * </code>
     *
     * @param     mixed $aantal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function filterByAantal($aantal = null, $comparison = null)
    {
        if (is_array($aantal)) {
            $useMinMax = false;
            if (isset($aantal['min'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_AANTAL, $aantal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aantal['max'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_AANTAL, $aantal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VoornaamTableMap::COL_AANTAL, $aantal, $comparison);
    }

    /**
     * Filter the query on the populariteit_positie column
     *
     * Example usage:
     * <code>
     * $query->filterByPopulariteitPositie(1234); // WHERE populariteit_positie = 1234
     * $query->filterByPopulariteitPositie(array(12, 34)); // WHERE populariteit_positie IN (12, 34)
     * $query->filterByPopulariteitPositie(array('min' => 12)); // WHERE populariteit_positie > 12
     * </code>
     *
     * @param     mixed $populariteitPositie The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function filterByPopulariteitPositie($populariteitPositie = null, $comparison = null)
    {
        if (is_array($populariteitPositie)) {
            $useMinMax = false;
            if (isset($populariteitPositie['min'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_POPULARITEIT_POSITIE, $populariteitPositie['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($populariteitPositie['max'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_POPULARITEIT_POSITIE, $populariteitPositie['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VoornaamTableMap::COL_POPULARITEIT_POSITIE, $populariteitPositie, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VoornaamTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(VoornaamTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VoornaamTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumBrp\Stam\Geslacht object
     *
     * @param \Model\Custom\NovumBrp\Stam\Geslacht|ObjectCollection $geslacht The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildVoornaamQuery The current query, for fluid interface
     */
    public function filterByGeslacht($geslacht, $comparison = null)
    {
        if ($geslacht instanceof \Model\Custom\NovumBrp\Stam\Geslacht) {
            return $this
                ->addUsingAlias(VoornaamTableMap::COL_GESLACHT_ID, $geslacht->getId(), $comparison);
        } elseif ($geslacht instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VoornaamTableMap::COL_GESLACHT_ID, $geslacht->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByGeslacht() only accepts arguments of type \Model\Custom\NovumBrp\Stam\Geslacht or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Geslacht relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function joinGeslacht($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Geslacht');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Geslacht');
        }

        return $this;
    }

    /**
     * Use the Geslacht relation Geslacht object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumBrp\Stam\GeslachtQuery A secondary query class using the current class as primary query
     */
    public function useGeslachtQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGeslacht($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Geslacht', '\Model\Custom\NovumBrp\Stam\GeslachtQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildVoornaam $voornaam Object to remove from the list of results
     *
     * @return $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function prune($voornaam = null)
    {
        if ($voornaam) {
            $this->addUsingAlias(VoornaamTableMap::COL_ID, $voornaam->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the data_voornaam table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VoornaamTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VoornaamTableMap::clearInstancePool();
            VoornaamTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(VoornaamTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VoornaamTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VoornaamTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VoornaamTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(VoornaamTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(VoornaamTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(VoornaamTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(VoornaamTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(VoornaamTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildVoornaamQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(VoornaamTableMap::COL_CREATED_AT);
    }

} // VoornaamQuery
