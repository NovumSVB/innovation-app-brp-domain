<?php

namespace Model\Custom\NovumBrp\Data\Base;

use \DateTime;
use \Exception;
use \PDO;
use Model\Custom\NovumBrp\Data\Familienaam as ChildFamilienaam;
use Model\Custom\NovumBrp\Data\FamilienaamQuery as ChildFamilienaamQuery;
use Model\Custom\NovumBrp\Data\Map\FamilienaamTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'data_familienaam' table.
 *
 *
 *
 * @package    propel.generator.Model.Custom.NovumBrp.Data.Base
 */
abstract class Familienaam implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Model\\Custom\\NovumBrp\\Data\\Map\\FamilienaamTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the prefix field.
     *
     * @var        string
     */
    protected $prefix;

    /**
     * The value for the naam field.
     *
     * @var        string
     */
    protected $naam;

    /**
     * The value for the in_top field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $in_top;

    /**
     * The value for the rang field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $rang;

    /**
     * The value for the aantal_2007 field.
     *
     * @var        int
     */
    protected $aantal_2007;

    /**
     * The value for the aantal_1947 field.
     *
     * @var        int
     */
    protected $aantal_1947;

    /**
     * The value for the calc_aantal_huidig_jaar field.
     *
     * @var        int
     */
    protected $calc_aantal_huidig_jaar;

    /**
     * The value for the calc_ppm field.
     *
     * @var        int
     */
    protected $calc_ppm;

    /**
     * The value for the created_at field.
     *
     * @var        DateTime
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     *
     * @var        DateTime
     */
    protected $updated_at;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->in_top = false;
        $this->rang = 0;
    }

    /**
     * Initializes internal state of Model\Custom\NovumBrp\Data\Base\Familienaam object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Familienaam</code> instance.  If
     * <code>obj</code> is an instance of <code>Familienaam</code>, delegates to
     * <code>equals(Familienaam)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Familienaam The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [prefix] column value.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Get the [naam] column value.
     *
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Get the [in_top] column value.
     *
     * @return boolean
     */
    public function getInTop()
    {
        return $this->in_top;
    }

    /**
     * Get the [in_top] column value.
     *
     * @return boolean
     */
    public function isInTop()
    {
        return $this->getInTop();
    }

    /**
     * Get the [rang] column value.
     *
     * @return int
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Get the [aantal_2007] column value.
     *
     * @return int
     */
    public function getAantal2007()
    {
        return $this->aantal_2007;
    }

    /**
     * Get the [aantal_1947] column value.
     *
     * @return int
     */
    public function getAantal1947()
    {
        return $this->aantal_1947;
    }

    /**
     * Get the [calc_aantal_huidig_jaar] column value.
     *
     * @return int
     */
    public function getCalcAantalHuidigJaar()
    {
        return $this->calc_aantal_huidig_jaar;
    }

    /**
     * Get the [calc_ppm] column value.
     *
     * @return int
     */
    public function getCalcPpm()
    {
        return $this->calc_ppm;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTimeInterface ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->updated_at;
        } else {
            return $this->updated_at instanceof \DateTimeInterface ? $this->updated_at->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[FamilienaamTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [prefix] column.
     *
     * @param string $v new value
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setPrefix($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->prefix !== $v) {
            $this->prefix = $v;
            $this->modifiedColumns[FamilienaamTableMap::COL_PREFIX] = true;
        }

        return $this;
    } // setPrefix()

    /**
     * Set the value of [naam] column.
     *
     * @param string $v new value
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setNaam($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->naam !== $v) {
            $this->naam = $v;
            $this->modifiedColumns[FamilienaamTableMap::COL_NAAM] = true;
        }

        return $this;
    } // setNaam()

    /**
     * Sets the value of the [in_top] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setInTop($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->in_top !== $v) {
            $this->in_top = $v;
            $this->modifiedColumns[FamilienaamTableMap::COL_IN_TOP] = true;
        }

        return $this;
    } // setInTop()

    /**
     * Set the value of [rang] column.
     *
     * @param int $v new value
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setRang($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rang !== $v) {
            $this->rang = $v;
            $this->modifiedColumns[FamilienaamTableMap::COL_RANG] = true;
        }

        return $this;
    } // setRang()

    /**
     * Set the value of [aantal_2007] column.
     *
     * @param int $v new value
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setAantal2007($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->aantal_2007 !== $v) {
            $this->aantal_2007 = $v;
            $this->modifiedColumns[FamilienaamTableMap::COL_AANTAL_2007] = true;
        }

        return $this;
    } // setAantal2007()

    /**
     * Set the value of [aantal_1947] column.
     *
     * @param int $v new value
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setAantal1947($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->aantal_1947 !== $v) {
            $this->aantal_1947 = $v;
            $this->modifiedColumns[FamilienaamTableMap::COL_AANTAL_1947] = true;
        }

        return $this;
    } // setAantal1947()

    /**
     * Set the value of [calc_aantal_huidig_jaar] column.
     *
     * @param int $v new value
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setCalcAantalHuidigJaar($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->calc_aantal_huidig_jaar !== $v) {
            $this->calc_aantal_huidig_jaar = $v;
            $this->modifiedColumns[FamilienaamTableMap::COL_CALC_AANTAL_HUIDIG_JAAR] = true;
        }

        return $this;
    } // setCalcAantalHuidigJaar()

    /**
     * Set the value of [calc_ppm] column.
     *
     * @param int $v new value
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setCalcPpm($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->calc_ppm !== $v) {
            $this->calc_ppm = $v;
            $this->modifiedColumns[FamilienaamTableMap::COL_CALC_PPM] = true;
        }

        return $this;
    } // setCalcPpm()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($this->created_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_at->format("Y-m-d H:i:s.u")) {
                $this->created_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[FamilienaamTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($this->updated_at === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->updated_at->format("Y-m-d H:i:s.u")) {
                $this->updated_at = $dt === null ? null : clone $dt;
                $this->modifiedColumns[FamilienaamTableMap::COL_UPDATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdatedAt()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->in_top !== false) {
                return false;
            }

            if ($this->rang !== 0) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : FamilienaamTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : FamilienaamTableMap::translateFieldName('Prefix', TableMap::TYPE_PHPNAME, $indexType)];
            $this->prefix = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : FamilienaamTableMap::translateFieldName('Naam', TableMap::TYPE_PHPNAME, $indexType)];
            $this->naam = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : FamilienaamTableMap::translateFieldName('InTop', TableMap::TYPE_PHPNAME, $indexType)];
            $this->in_top = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : FamilienaamTableMap::translateFieldName('Rang', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rang = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : FamilienaamTableMap::translateFieldName('Aantal2007', TableMap::TYPE_PHPNAME, $indexType)];
            $this->aantal_2007 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : FamilienaamTableMap::translateFieldName('Aantal1947', TableMap::TYPE_PHPNAME, $indexType)];
            $this->aantal_1947 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : FamilienaamTableMap::translateFieldName('CalcAantalHuidigJaar', TableMap::TYPE_PHPNAME, $indexType)];
            $this->calc_aantal_huidig_jaar = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : FamilienaamTableMap::translateFieldName('CalcPpm', TableMap::TYPE_PHPNAME, $indexType)];
            $this->calc_ppm = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : FamilienaamTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : FamilienaamTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 11; // 11 = FamilienaamTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Model\\Custom\\NovumBrp\\Data\\Familienaam'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FamilienaamTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildFamilienaamQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Familienaam::setDeleted()
     * @see Familienaam::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(FamilienaamTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildFamilienaamQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(FamilienaamTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                $time = time();
                $highPrecision = \Propel\Runtime\Util\PropelDateTime::createHighPrecision();
                if (!$this->isColumnModified(FamilienaamTableMap::COL_CREATED_AT)) {
                    $this->setCreatedAt($highPrecision);
                }
                if (!$this->isColumnModified(FamilienaamTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt($highPrecision);
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(FamilienaamTableMap::COL_UPDATED_AT)) {
                    $this->setUpdatedAt(\Propel\Runtime\Util\PropelDateTime::createHighPrecision());
                }
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                FamilienaamTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[FamilienaamTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . FamilienaamTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(FamilienaamTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_PREFIX)) {
            $modifiedColumns[':p' . $index++]  = 'prefix';
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_NAAM)) {
            $modifiedColumns[':p' . $index++]  = 'naam';
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_IN_TOP)) {
            $modifiedColumns[':p' . $index++]  = 'in_top';
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_RANG)) {
            $modifiedColumns[':p' . $index++]  = 'rang';
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_AANTAL_2007)) {
            $modifiedColumns[':p' . $index++]  = 'aantal_2007';
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_AANTAL_1947)) {
            $modifiedColumns[':p' . $index++]  = 'aantal_1947';
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_CALC_AANTAL_HUIDIG_JAAR)) {
            $modifiedColumns[':p' . $index++]  = 'calc_aantal_huidig_jaar';
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_CALC_PPM)) {
            $modifiedColumns[':p' . $index++]  = 'calc_ppm';
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }

        $sql = sprintf(
            'INSERT INTO data_familienaam (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'prefix':
                        $stmt->bindValue($identifier, $this->prefix, PDO::PARAM_STR);
                        break;
                    case 'naam':
                        $stmt->bindValue($identifier, $this->naam, PDO::PARAM_STR);
                        break;
                    case 'in_top':
                        $stmt->bindValue($identifier, (int) $this->in_top, PDO::PARAM_INT);
                        break;
                    case 'rang':
                        $stmt->bindValue($identifier, $this->rang, PDO::PARAM_INT);
                        break;
                    case 'aantal_2007':
                        $stmt->bindValue($identifier, $this->aantal_2007, PDO::PARAM_INT);
                        break;
                    case 'aantal_1947':
                        $stmt->bindValue($identifier, $this->aantal_1947, PDO::PARAM_INT);
                        break;
                    case 'calc_aantal_huidig_jaar':
                        $stmt->bindValue($identifier, $this->calc_aantal_huidig_jaar, PDO::PARAM_INT);
                        break;
                    case 'calc_ppm':
                        $stmt->bindValue($identifier, $this->calc_ppm, PDO::PARAM_INT);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = FamilienaamTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getPrefix();
                break;
            case 2:
                return $this->getNaam();
                break;
            case 3:
                return $this->getInTop();
                break;
            case 4:
                return $this->getRang();
                break;
            case 5:
                return $this->getAantal2007();
                break;
            case 6:
                return $this->getAantal1947();
                break;
            case 7:
                return $this->getCalcAantalHuidigJaar();
                break;
            case 8:
                return $this->getCalcPpm();
                break;
            case 9:
                return $this->getCreatedAt();
                break;
            case 10:
                return $this->getUpdatedAt();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Familienaam'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Familienaam'][$this->hashCode()] = true;
        $keys = FamilienaamTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getPrefix(),
            $keys[2] => $this->getNaam(),
            $keys[3] => $this->getInTop(),
            $keys[4] => $this->getRang(),
            $keys[5] => $this->getAantal2007(),
            $keys[6] => $this->getAantal1947(),
            $keys[7] => $this->getCalcAantalHuidigJaar(),
            $keys[8] => $this->getCalcPpm(),
            $keys[9] => $this->getCreatedAt(),
            $keys[10] => $this->getUpdatedAt(),
        );
        if ($result[$keys[9]] instanceof \DateTimeInterface) {
            $result[$keys[9]] = $result[$keys[9]]->format('c');
        }

        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = FamilienaamTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setPrefix($value);
                break;
            case 2:
                $this->setNaam($value);
                break;
            case 3:
                $this->setInTop($value);
                break;
            case 4:
                $this->setRang($value);
                break;
            case 5:
                $this->setAantal2007($value);
                break;
            case 6:
                $this->setAantal1947($value);
                break;
            case 7:
                $this->setCalcAantalHuidigJaar($value);
                break;
            case 8:
                $this->setCalcPpm($value);
                break;
            case 9:
                $this->setCreatedAt($value);
                break;
            case 10:
                $this->setUpdatedAt($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = FamilienaamTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setPrefix($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setNaam($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setInTop($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setRang($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setAantal2007($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setAantal1947($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCalcAantalHuidigJaar($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCalcPpm($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCreatedAt($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setUpdatedAt($arr[$keys[10]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Model\Custom\NovumBrp\Data\Familienaam The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(FamilienaamTableMap::DATABASE_NAME);

        if ($this->isColumnModified(FamilienaamTableMap::COL_ID)) {
            $criteria->add(FamilienaamTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_PREFIX)) {
            $criteria->add(FamilienaamTableMap::COL_PREFIX, $this->prefix);
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_NAAM)) {
            $criteria->add(FamilienaamTableMap::COL_NAAM, $this->naam);
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_IN_TOP)) {
            $criteria->add(FamilienaamTableMap::COL_IN_TOP, $this->in_top);
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_RANG)) {
            $criteria->add(FamilienaamTableMap::COL_RANG, $this->rang);
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_AANTAL_2007)) {
            $criteria->add(FamilienaamTableMap::COL_AANTAL_2007, $this->aantal_2007);
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_AANTAL_1947)) {
            $criteria->add(FamilienaamTableMap::COL_AANTAL_1947, $this->aantal_1947);
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_CALC_AANTAL_HUIDIG_JAAR)) {
            $criteria->add(FamilienaamTableMap::COL_CALC_AANTAL_HUIDIG_JAAR, $this->calc_aantal_huidig_jaar);
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_CALC_PPM)) {
            $criteria->add(FamilienaamTableMap::COL_CALC_PPM, $this->calc_ppm);
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_CREATED_AT)) {
            $criteria->add(FamilienaamTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(FamilienaamTableMap::COL_UPDATED_AT)) {
            $criteria->add(FamilienaamTableMap::COL_UPDATED_AT, $this->updated_at);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildFamilienaamQuery::create();
        $criteria->add(FamilienaamTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Model\Custom\NovumBrp\Data\Familienaam (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPrefix($this->getPrefix());
        $copyObj->setNaam($this->getNaam());
        $copyObj->setInTop($this->getInTop());
        $copyObj->setRang($this->getRang());
        $copyObj->setAantal2007($this->getAantal2007());
        $copyObj->setAantal1947($this->getAantal1947());
        $copyObj->setCalcAantalHuidigJaar($this->getCalcAantalHuidigJaar());
        $copyObj->setCalcPpm($this->getCalcPpm());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Model\Custom\NovumBrp\Data\Familienaam Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->prefix = null;
        $this->naam = null;
        $this->in_top = null;
        $this->rang = null;
        $this->aantal_2007 = null;
        $this->aantal_1947 = null;
        $this->calc_aantal_huidig_jaar = null;
        $this->calc_ppm = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(FamilienaamTableMap::DEFAULT_STRING_FORMAT);
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     $this|ChildFamilienaam The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[FamilienaamTableMap::COL_UPDATED_AT] = true;

        return $this;
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
