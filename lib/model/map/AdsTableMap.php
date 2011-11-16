<?php


/**
 * This class defines the structure of the 'ads' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 10/06/11 12:37:19
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class AdsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AdsTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('ads');
		$this->setPhpName('Ads');
		$this->setClassname('Ads');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, 20, null);
		$this->addForeignKey('USER_ID', 'UserId', 'BIGINT', 'sf_guard_user', 'ID', false, 20, null);
		$this->addForeignKey('CONFIG_ID', 'ConfigId', 'BIGINT', 'config', 'ID', false, 20, null);
		$this->addColumn('INFO', 'Info', 'LONGVARCHAR', false, null, null);
		$this->addColumn('PRICE', 'Price', 'BIGINT', false, 20, null);
		$this->addColumn('RATING', 'Rating', 'BIGINT', false, 20, null);
		$this->addColumn('WEIGTH', 'Weight', 'INTEGER', false, null, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Config', 'Config', RelationMap::MANY_TO_ONE, array('config_id' => 'id', ), 'RESTRICT', 'RESTRICT');
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
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // AdsTableMap
