<?php


/**
 * This class defines the structure of the 'config_field' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 11/24/11 11:02:18
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ConfigFieldTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ConfigFieldTableMap';

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
		$this->setName('config_field');
		$this->setPhpName('ConfigField');
		$this->setClassname('ConfigField');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, 20, null);
		$this->addForeignKey('CATEGORY_ID', 'CategoryId', 'BIGINT', 'config_field_category', 'ID', true, 20, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('HTML_COMMENT', 'HtmlComment', 'VARCHAR', false, 255, null);
		$this->addColumn('INFO', 'Info', 'LONGVARCHAR', false, null, null);
		$this->addColumn('WEIGHT', 'Weight', 'INTEGER', false, 11, 0);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ConfigFieldCategory', 'ConfigFieldCategory', RelationMap::MANY_TO_ONE, array('category_id' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('FieldValue', 'FieldValue', RelationMap::ONE_TO_MANY, array('id' => 'field_id', ), 'CASCADE', 'CASCADE');
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
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // ConfigFieldTableMap
