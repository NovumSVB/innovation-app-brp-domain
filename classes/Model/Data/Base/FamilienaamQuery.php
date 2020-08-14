<?php

namespace Model\Custom\NovumBrp\Data\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumBrp\Data\Familienaam as ChildFamilienaam;
use Model\Custom\NovumBrp\Data\FamilienaamQuery as ChildFamilienaamQuery;
use Model\Custom\NovumBrp\Data\Map\FamilienaamTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'data_familienaam' table.
 *
 *
 *
 * @method     ChildFamilienaamQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildFamilienaamQuery orderByPrefix($order = Criteria::ASC) Order by the prefix column
 * @method     ChildFamilienaamQuery orderByNaam($order = Criteria::ASC) Order by the naam column
 * @method     ChildFamilienaamQuery orderByInTop($order = Criteria::ASC) Order by the in_top column
 * @method     ChildFamilienaamQuery orderByRang($order = Criteria::ASC) Order by the rang column
 * @method     ChildFamilienaamQuery orderByAantal2007($order = Criteria::ASC) Order by the aantal_2007 column
 * @method     ChildFamilienaamQuery orderByAantal1947($order = Criteria::ASC) Order by the aantal_1947 column
 * @method     ChildFamilienaamQuery orderByCalcAantalHuidigJaar($order = Criteria::ASC) Order by the calc_aantal_huidig_jaar column
 * @method     ChildFamilienaamQuery orderByCalcPpm($order = Criteria::ASC) Order by the calc_ppm column
 * @method     ChildFamilienaamQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildFamilienaamQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildFamilienaamQuery groupById() Group by the id column
 * @method     ChildFamilienaamQuery groupByPrefix() Group by the prefix column
 * @method     ChildFamilienaamQuery groupByNaam() Group by the naam column
 * @method     ChildFamilienaamQuery groupByInTop() Group by the in_top column
 * @method     ChildFamilienaamQuery groupByRang() Group by the rang column
 * @method     ChildFamilienaamQuery groupByAantal2007() Group by the aantal_2007 column
 * @method     ChildFamilienaamQuery groupByAantal1947() Group by the aantal_1947 column
 * @method     ChildFamilienaamQuery groupByCalcAantalHuidigJaar() Group by the calc_aantal_huidig_jaar column
 * @method     ChildFamilienaamQuery groupByCalcPpm() Group by the calc_ppm column
 * @method     ChildFamilienaamQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildFamilienaamQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildFamilienaamQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFamilienaamQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFamilienaamQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFamilienaamQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFamilienaamQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFamilienaamQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFamilienaam findOne(ConnectionInterface $con = null) Return the first ChildFamilienaam matching the query
 * @method     ChildFamilienaam findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFamilienaam matching the query, or a new ChildFamilienaam object populated from the query conditions when no match is found
 *
 * @method     ChildFamilienaam findOneById(int $id) Return the first ChildFamilienaam filtered by the id column
 * @method     ChildFamilienaam findOneByPrefix(string $prefix) Return the first ChildFamilienaam filtered by the prefix column
 * @method     ChildFamilienaam findOneByNaam(string $naam) Return the first ChildFamilienaam filtered by the naam column
 * @method     ChildFamilienaam findOneByInTop(boolean $in_top) Return the first ChildFamilienaam filtered by the in_top column
 * @method     ChildFamilienaam findOneByRang(int $rang) Return the first ChildFamilienaam filtered by the rang column
 * @method     ChildFamilienaam findOneByAantal2007(int $aantal_2007) Return the first ChildFamilienaam filtered by the aantal_2007 column
 * @method     ChildFamilienaam findOneByAantal1947(int $aantal_1947) Return the first ChildFamilienaam filtered by the aantal_1947 column
 * @method     ChildFamilienaam findOneByCalcAantalHuidigJaar(int $calc_aantal_huidig_jaar) Return the first ChildFamilienaam filtered by the calc_aantal_huidig_jaar column
 * @method     ChildFamilienaam findOneByCalcPpm(int $calc_ppm) Return the first ChildFamilienaam filtered by the calc_ppm column
 * @method     ChildFamilienaam findOneByCreatedAt(string $created_at) Return the first ChildFamilienaam filtered by the created_at column
 * @method     ChildFamilienaam findOneByUpdatedAt(string $updated_at) Return the first ChildFamilienaam filtered by the updated_at column *

 * @method     ChildFamilienaam requirePk($key, ConnectionInterface $con = null) Return the ChildFamilienaam by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOne(ConnectionInterface $con = null) Return the first ChildFamilienaam matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFamilienaam requireOneById(int $id) Return the first ChildFamilienaam filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOneByPrefix(string $prefix) Return the first ChildFamilienaam filtered by the prefix column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOneByNaam(string $naam) Return the first ChildFamilienaam filtered by the naam column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOneByInTop(boolean $in_top) Return the first ChildFamilienaam filtered by the in_top column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOneByRang(int $rang) Return the first ChildFamilienaam filtered by the rang column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOneByAantal2007(int $aantal_2007) Return the first ChildFamilienaam filtered by the aantal_2007 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOneByAantal1947(int $aantal_1947) Return the first ChildFamilienaam filtered by the aantal_1947 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOneByCalcAantalHuidigJaar(int $calc_aantal_huidig_jaar) Return the first ChildFamilienaam filtered by the calc_aantal_huidig_jaar column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOneByCalcPpm(int $calc_ppm) Return the first ChildFamilienaam filtered by the calc_ppm column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOneByCreatedAt(string $created_at) Return the first ChildFamilienaam filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFamilienaam requireOneByUpdatedAt(string $updated_at) Return the first ChildFamilienaam filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFamilienaam[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFamilienaam objects based on current ModelCriteria
 * @method     ChildFamilienaam[]|ObjectCollection findById(int $id) Return ChildFamilienaam objects filtered by the id column
 * @method     ChildFamilienaam[]|ObjectCollection findByPrefix(string $prefix) Return ChildFamilienaam objects filtered by the prefix column
 * @method     ChildFamilienaam[]|ObjectCollection findByNaam(string $naam) Return ChildFamilienaam objects filtered by the naam column
 * @method     ChildFamilienaam[]|ObjectCollection findByInTop(boolean $in_top) Return ChildFamilienaam objects filtered by the in_top column
 * @method     ChildFamilienaam[]|ObjectCollection findByRang(int $rang) Return ChildFamilienaam objects filtered by the rang column
 * @method     ChildFamilienaam[]|ObjectCollection findByAantal2007(int $aantal_2007) Return ChildFamilienaam objects filtered by the aantal_2007 column
 * @method     ChildFamilienaam[]|ObjectCollection findByAantal1947(int $aantal_1947) Return ChildFamilienaam objects filtered by the aantal_1947 column
 * @method     ChildFamilienaam[]|ObjectCollection findByCalcAantalHuidigJaar(int $calc_aantal_huidig_jaar) Return ChildFamilienaam objects filtered by the calc_aantal_huidig_jaar column
 * @method     ChildFamilienaam[]|ObjectCollection findByCalcPpm(int $calc_ppm) Return ChildFamilienaam objects filtered by the calc_ppm column
 * @method     ChildFamilienaam[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildFamilienaam objects filtered by the created_at column
 * @method     ChildFamilienaam[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildFamilienaam objects filtered by the updated_at column
 * @method     ChildFamilienaam[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FamilienaamQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumBrp\Data\Base\FamilienaamQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumBrp\\Data\\Familienaam', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFamilienaamQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFamilienaamQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFamilienaamQuery) {
            return $criteria;
        }
        $query = new ChildFamilienaamQuery();
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
     * @return ChildFamilienaam|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FamilienaamTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FamilienaamTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildFamilienaam A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, prefix, naam, in_top, rang, aantal_2007, aantal_1947, calc_aantal_huidig_jaar, calc_ppm, created_at, updated_at FROM data_familienaam WHERE id = :p0';
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
            /** @var ChildFamilienaam $obj */
            $obj = new ChildFamilienaam();
            $obj->hydrate($row);
            FamilienaamTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildFamilienaam|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FamilienaamTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FamilienaamTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the prefix column
     *
     * Example usage:
     * <code>
     * $query->filterByPrefix('fooValue');   // WHERE prefix = 'fooValue'
     * $query->filterByPrefix('%fooValue%', Criteria::LIKE); // WHERE prefix LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prefix The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByPrefix($prefix = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prefix)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_PREFIX, $prefix, $comparison);
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
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByNaam($naam = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($naam)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_NAAM, $naam, $comparison);
    }

    /**
     * Filter the query on the in_top column
     *
     * Example usage:
     * <code>
     * $query->filterByInTop(true); // WHERE in_top = true
     * $query->filterByInTop('yes'); // WHERE in_top = true
     * </code>
     *
     * @param     boolean|string $inTop The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByInTop($inTop = null, $comparison = null)
    {
        if (is_string($inTop)) {
            $inTop = in_array(strtolower($inTop), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_IN_TOP, $inTop, $comparison);
    }

    /**
     * Filter the query on the rang column
     *
     * Example usage:
     * <code>
     * $query->filterByRang(1234); // WHERE rang = 1234
     * $query->filterByRang(array(12, 34)); // WHERE rang IN (12, 34)
     * $query->filterByRang(array('min' => 12)); // WHERE rang > 12
     * </code>
     *
     * @param     mixed $rang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByRang($rang = null, $comparison = null)
    {
        if (is_array($rang)) {
            $useMinMax = false;
            if (isset($rang['min'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_RANG, $rang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rang['max'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_RANG, $rang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_RANG, $rang, $comparison);
    }

    /**
     * Filter the query on the aantal_2007 column
     *
     * Example usage:
     * <code>
     * $query->filterByAantal2007(1234); // WHERE aantal_2007 = 1234
     * $query->filterByAantal2007(array(12, 34)); // WHERE aantal_2007 IN (12, 34)
     * $query->filterByAantal2007(array('min' => 12)); // WHERE aantal_2007 > 12
     * </code>
     *
     * @param     mixed $aantal2007 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByAantal2007($aantal2007 = null, $comparison = null)
    {
        if (is_array($aantal2007)) {
            $useMinMax = false;
            if (isset($aantal2007['min'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_AANTAL_2007, $aantal2007['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aantal2007['max'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_AANTAL_2007, $aantal2007['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_AANTAL_2007, $aantal2007, $comparison);
    }

    /**
     * Filter the query on the aantal_1947 column
     *
     * Example usage:
     * <code>
     * $query->filterByAantal1947(1234); // WHERE aantal_1947 = 1234
     * $query->filterByAantal1947(array(12, 34)); // WHERE aantal_1947 IN (12, 34)
     * $query->filterByAantal1947(array('min' => 12)); // WHERE aantal_1947 > 12
     * </code>
     *
     * @param     mixed $aantal1947 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByAantal1947($aantal1947 = null, $comparison = null)
    {
        if (is_array($aantal1947)) {
            $useMinMax = false;
            if (isset($aantal1947['min'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_AANTAL_1947, $aantal1947['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aantal1947['max'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_AANTAL_1947, $aantal1947['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_AANTAL_1947, $aantal1947, $comparison);
    }

    /**
     * Filter the query on the calc_aantal_huidig_jaar column
     *
     * Example usage:
     * <code>
     * $query->filterByCalcAantalHuidigJaar(1234); // WHERE calc_aantal_huidig_jaar = 1234
     * $query->filterByCalcAantalHuidigJaar(array(12, 34)); // WHERE calc_aantal_huidig_jaar IN (12, 34)
     * $query->filterByCalcAantalHuidigJaar(array('min' => 12)); // WHERE calc_aantal_huidig_jaar > 12
     * </code>
     *
     * @param     mixed $calcAantalHuidigJaar The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByCalcAantalHuidigJaar($calcAantalHuidigJaar = null, $comparison = null)
    {
        if (is_array($calcAantalHuidigJaar)) {
            $useMinMax = false;
            if (isset($calcAantalHuidigJaar['min'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_CALC_AANTAL_HUIDIG_JAAR, $calcAantalHuidigJaar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calcAantalHuidigJaar['max'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_CALC_AANTAL_HUIDIG_JAAR, $calcAantalHuidigJaar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_CALC_AANTAL_HUIDIG_JAAR, $calcAantalHuidigJaar, $comparison);
    }

    /**
     * Filter the query on the calc_ppm column
     *
     * Example usage:
     * <code>
     * $query->filterByCalcPpm(1234); // WHERE calc_ppm = 1234
     * $query->filterByCalcPpm(array(12, 34)); // WHERE calc_ppm IN (12, 34)
     * $query->filterByCalcPpm(array('min' => 12)); // WHERE calc_ppm > 12
     * </code>
     *
     * @param     mixed $calcPpm The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByCalcPpm($calcPpm = null, $comparison = null)
    {
        if (is_array($calcPpm)) {
            $useMinMax = false;
            if (isset($calcPpm['min'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_CALC_PPM, $calcPpm['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calcPpm['max'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_CALC_PPM, $calcPpm['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_CALC_PPM, $calcPpm, $comparison);
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
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(FamilienaamTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FamilienaamTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFamilienaam $familienaam Object to remove from the list of results
     *
     * @return $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function prune($familienaam = null)
    {
        if ($familienaam) {
            $this->addUsingAlias(FamilienaamTableMap::COL_ID, $familienaam->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the data_familienaam table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FamilienaamTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FamilienaamTableMap::clearInstancePool();
            FamilienaamTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FamilienaamTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FamilienaamTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FamilienaamTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FamilienaamTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(FamilienaamTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(FamilienaamTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(FamilienaamTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(FamilienaamTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(FamilienaamTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildFamilienaamQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(FamilienaamTableMap::COL_CREATED_AT);
    }

} // FamilienaamQuery
