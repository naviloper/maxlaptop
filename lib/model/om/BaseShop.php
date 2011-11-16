<?php

/**
 * Base class that represents a row from the 'shop' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 10/06/11 12:37:23
 *
 * @package    lib.model.om
 */
abstract class BaseShop extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ShopPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        string
	 */
	protected $id;

	/**
	 * The value for the owner_id field.
	 * @var        string
	 */
	protected $owner_id;

	/**
	 * The value for the info field.
	 * @var        string
	 */
	protected $info;

	/**
	 * The value for the photo field.
	 * @var        string
	 */
	protected $photo;

	/**
	 * The value for the website field.
	 * @var        string
	 */
	protected $website;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the address field.
	 * @var        string
	 */
	protected $address;

	/**
	 * The value for the phone field.
	 * @var        string
	 */
	protected $phone;

	/**
	 * The value for the fax field.
	 * @var        string
	 */
	protected $fax;

	/**
	 * @var        sfGuardUser
	 */
	protected $asfGuardUser;

	/**
	 * @var        array ShopVitrin[] Collection to store aggregation of ShopVitrin objects.
	 */
	protected $collShopVitrins;

	/**
	 * @var        Criteria The criteria used to select the current contents of collShopVitrins.
	 */
	private $lastShopVitrinCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// symfony behavior
	
	const PEER = 'ShopPeer';

	/**
	 * Get the [id] column value.
	 * 
	 * @return     string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [owner_id] column value.
	 * 
	 * @return     string
	 */
	public function getOwnerId()
	{
		return $this->owner_id;
	}

	/**
	 * Get the [info] column value.
	 * 
	 * @return     string
	 */
	public function getInfo()
	{
		return $this->info;
	}

	/**
	 * Get the [photo] column value.
	 * 
	 * @return     string
	 */
	public function getPhoto()
	{
		return $this->photo;
	}

	/**
	 * Get the [website] column value.
	 * 
	 * @return     string
	 */
	public function getWebsite()
	{
		return $this->website;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [address] column value.
	 * 
	 * @return     string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Get the [phone] column value.
	 * 
	 * @return     string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Get the [fax] column value.
	 * 
	 * @return     string
	 */
	public function getFax()
	{
		return $this->fax;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      string $v new value
	 * @return     Shop The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ShopPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [owner_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Shop The current object (for fluent API support)
	 */
	public function setOwnerId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->owner_id !== $v) {
			$this->owner_id = $v;
			$this->modifiedColumns[] = ShopPeer::OWNER_ID;
		}

		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

		return $this;
	} // setOwnerId()

	/**
	 * Set the value of [info] column.
	 * 
	 * @param      string $v new value
	 * @return     Shop The current object (for fluent API support)
	 */
	public function setInfo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->info !== $v) {
			$this->info = $v;
			$this->modifiedColumns[] = ShopPeer::INFO;
		}

		return $this;
	} // setInfo()

	/**
	 * Set the value of [photo] column.
	 * 
	 * @param      string $v new value
	 * @return     Shop The current object (for fluent API support)
	 */
	public function setPhoto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->photo !== $v) {
			$this->photo = $v;
			$this->modifiedColumns[] = ShopPeer::PHOTO;
		}

		return $this;
	} // setPhoto()

	/**
	 * Set the value of [website] column.
	 * 
	 * @param      string $v new value
	 * @return     Shop The current object (for fluent API support)
	 */
	public function setWebsite($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->website !== $v) {
			$this->website = $v;
			$this->modifiedColumns[] = ShopPeer::WEBSITE;
		}

		return $this;
	} // setWebsite()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Shop The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ShopPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [address] column.
	 * 
	 * @param      string $v new value
	 * @return     Shop The current object (for fluent API support)
	 */
	public function setAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = ShopPeer::ADDRESS;
		}

		return $this;
	} // setAddress()

	/**
	 * Set the value of [phone] column.
	 * 
	 * @param      string $v new value
	 * @return     Shop The current object (for fluent API support)
	 */
	public function setPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = ShopPeer::PHONE;
		}

		return $this;
	} // setPhone()

	/**
	 * Set the value of [fax] column.
	 * 
	 * @param      string $v new value
	 * @return     Shop The current object (for fluent API support)
	 */
	public function setFax($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fax !== $v) {
			$this->fax = $v;
			$this->modifiedColumns[] = ShopPeer::FAX;
		}

		return $this;
	} // setFax()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
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
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->owner_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->info = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->photo = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->website = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->email = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->address = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->phone = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->fax = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 9; // 9 = ShopPeer::NUM_COLUMNS - ShopPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Shop object", $e);
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
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->asfGuardUser !== null && $this->owner_id !== $this->asfGuardUser->getId()) {
			$this->asfGuardUser = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ShopPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ShopPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->asfGuardUser = null;
			$this->collShopVitrins = null;
			$this->lastShopVitrinCriteria = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ShopPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseShop:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				ShopPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseShop:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ShopPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseShop:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			    $con->commit();
			
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseShop:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ShopPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->asfGuardUser !== null) {
				if ($this->asfGuardUser->isModified() || $this->asfGuardUser->isNew()) {
					$affectedRows += $this->asfGuardUser->save($con);
				}
				$this->setsfGuardUser($this->asfGuardUser);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ShopPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ShopPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ShopPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collShopVitrins !== null) {
				foreach ($this->collShopVitrins as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}


			if (($retval = ShopPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collShopVitrins !== null) {
					foreach ($this->collShopVitrins as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ShopPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getOwnerId();
				break;
			case 2:
				return $this->getInfo();
				break;
			case 3:
				return $this->getPhoto();
				break;
			case 4:
				return $this->getWebsite();
				break;
			case 5:
				return $this->getEmail();
				break;
			case 6:
				return $this->getAddress();
				break;
			case 7:
				return $this->getPhone();
				break;
			case 8:
				return $this->getFax();
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
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ShopPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getOwnerId(),
			$keys[2] => $this->getInfo(),
			$keys[3] => $this->getPhoto(),
			$keys[4] => $this->getWebsite(),
			$keys[5] => $this->getEmail(),
			$keys[6] => $this->getAddress(),
			$keys[7] => $this->getPhone(),
			$keys[8] => $this->getFax(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ShopPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setOwnerId($value);
				break;
			case 2:
				$this->setInfo($value);
				break;
			case 3:
				$this->setPhoto($value);
				break;
			case 4:
				$this->setWebsite($value);
				break;
			case 5:
				$this->setEmail($value);
				break;
			case 6:
				$this->setAddress($value);
				break;
			case 7:
				$this->setPhone($value);
				break;
			case 8:
				$this->setFax($value);
				break;
		} // switch()
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
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ShopPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOwnerId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setInfo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPhoto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setWebsite($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmail($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAddress($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPhone($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFax($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ShopPeer::DATABASE_NAME);

		if ($this->isColumnModified(ShopPeer::ID)) $criteria->add(ShopPeer::ID, $this->id);
		if ($this->isColumnModified(ShopPeer::OWNER_ID)) $criteria->add(ShopPeer::OWNER_ID, $this->owner_id);
		if ($this->isColumnModified(ShopPeer::INFO)) $criteria->add(ShopPeer::INFO, $this->info);
		if ($this->isColumnModified(ShopPeer::PHOTO)) $criteria->add(ShopPeer::PHOTO, $this->photo);
		if ($this->isColumnModified(ShopPeer::WEBSITE)) $criteria->add(ShopPeer::WEBSITE, $this->website);
		if ($this->isColumnModified(ShopPeer::EMAIL)) $criteria->add(ShopPeer::EMAIL, $this->email);
		if ($this->isColumnModified(ShopPeer::ADDRESS)) $criteria->add(ShopPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(ShopPeer::PHONE)) $criteria->add(ShopPeer::PHONE, $this->phone);
		if ($this->isColumnModified(ShopPeer::FAX)) $criteria->add(ShopPeer::FAX, $this->fax);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ShopPeer::DATABASE_NAME);

		$criteria->add(ShopPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      string $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Shop (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setOwnerId($this->owner_id);

		$copyObj->setInfo($this->info);

		$copyObj->setPhoto($this->photo);

		$copyObj->setWebsite($this->website);

		$copyObj->setEmail($this->email);

		$copyObj->setAddress($this->address);

		$copyObj->setPhone($this->phone);

		$copyObj->setFax($this->fax);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getShopVitrins() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShopVitrin($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Shop Clone of current object.
	 * @throws     PropelException
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
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     ShopPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ShopPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a sfGuardUser object.
	 *
	 * @param      sfGuardUser $v
	 * @return     Shop The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setsfGuardUser(sfGuardUser $v = null)
	{
		if ($v === null) {
			$this->setOwnerId(NULL);
		} else {
			$this->setOwnerId($v->getId());
		}

		$this->asfGuardUser = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the sfGuardUser object, it will not be re-added.
		if ($v !== null) {
			$v->addShop($this);
		}

		return $this;
	}


	/**
	 * Get the associated sfGuardUser object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     sfGuardUser The associated sfGuardUser object.
	 * @throws     PropelException
	 */
	public function getsfGuardUser(PropelPDO $con = null)
	{
		if ($this->asfGuardUser === null && (($this->owner_id !== "" && $this->owner_id !== null))) {
			$this->asfGuardUser = sfGuardUserPeer::retrieveByPk($this->owner_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->asfGuardUser->addShops($this);
			 */
		}
		return $this->asfGuardUser;
	}

	/**
	 * Clears out the collShopVitrins collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addShopVitrins()
	 */
	public function clearShopVitrins()
	{
		$this->collShopVitrins = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collShopVitrins collection (array).
	 *
	 * By default this just sets the collShopVitrins collection to an empty array (like clearcollShopVitrins());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initShopVitrins()
	{
		$this->collShopVitrins = array();
	}

	/**
	 * Gets an array of ShopVitrin objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Shop has previously been saved, it will retrieve
	 * related ShopVitrins from storage. If this Shop is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ShopVitrin[]
	 * @throws     PropelException
	 */
	public function getShopVitrins($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ShopPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShopVitrins === null) {
			if ($this->isNew()) {
			   $this->collShopVitrins = array();
			} else {

				$criteria->add(ShopVitrinPeer::SHOP_ID, $this->id);

				ShopVitrinPeer::addSelectColumns($criteria);
				$this->collShopVitrins = ShopVitrinPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ShopVitrinPeer::SHOP_ID, $this->id);

				ShopVitrinPeer::addSelectColumns($criteria);
				if (!isset($this->lastShopVitrinCriteria) || !$this->lastShopVitrinCriteria->equals($criteria)) {
					$this->collShopVitrins = ShopVitrinPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastShopVitrinCriteria = $criteria;
		return $this->collShopVitrins;
	}

	/**
	 * Returns the number of related ShopVitrin objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ShopVitrin objects.
	 * @throws     PropelException
	 */
	public function countShopVitrins(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ShopPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collShopVitrins === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ShopVitrinPeer::SHOP_ID, $this->id);

				$count = ShopVitrinPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ShopVitrinPeer::SHOP_ID, $this->id);

				if (!isset($this->lastShopVitrinCriteria) || !$this->lastShopVitrinCriteria->equals($criteria)) {
					$count = ShopVitrinPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collShopVitrins);
				}
			} else {
				$count = count($this->collShopVitrins);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ShopVitrin object to this object
	 * through the ShopVitrin foreign key attribute.
	 *
	 * @param      ShopVitrin $l ShopVitrin
	 * @return     void
	 * @throws     PropelException
	 */
	public function addShopVitrin(ShopVitrin $l)
	{
		if ($this->collShopVitrins === null) {
			$this->initShopVitrins();
		}
		if (!in_array($l, $this->collShopVitrins, true)) { // only add it if the **same** object is not already associated
			array_push($this->collShopVitrins, $l);
			$l->setShop($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Shop is new, it will return
	 * an empty collection; or if this Shop has previously
	 * been saved, it will retrieve related ShopVitrins from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Shop.
	 */
	public function getShopVitrinsJoinConfig($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ShopPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShopVitrins === null) {
			if ($this->isNew()) {
				$this->collShopVitrins = array();
			} else {

				$criteria->add(ShopVitrinPeer::SHOP_ID, $this->id);

				$this->collShopVitrins = ShopVitrinPeer::doSelectJoinConfig($criteria, $con, $join_behavior);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(ShopVitrinPeer::SHOP_ID, $this->id);

			if (!isset($this->lastShopVitrinCriteria) || !$this->lastShopVitrinCriteria->equals($criteria)) {
				$this->collShopVitrins = ShopVitrinPeer::doSelectJoinConfig($criteria, $con, $join_behavior);
			}
		}
		$this->lastShopVitrinCriteria = $criteria;

		return $this->collShopVitrins;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collShopVitrins) {
				foreach ((array) $this->collShopVitrins as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collShopVitrins = null;
			$this->asfGuardUser = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseShop:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseShop::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseShop
