<?php


/**
 * This class defines the structure of the 'model' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 11/24/11 11:02:20
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ModelTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ModelTableMap';

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
		$this->setName('model');
		$this->setPhpName('Model');
		$this->setClassname('Model');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, 20, null);
		$this->addColumn('MODEL_NAME', 'ModelName', 'VARCHAR', true, 255, null);
		$this->addColumn('MODEL_INFO', 'ModelInfo', 'LONGVARCHAR', false, null, null);
		$this->addForeignKey('SERIES_ID', 'SeriesId', 'BIGINT', 'series', 'ID', true, 20, null);
		$this->addForeignKey('REVIEW_ID', 'ReviewId', 'BIGINT', 'review', 'ID', false, 20, null);
		$this->addForeignKey('SCORE_ID', 'ScoreId', 'BIGINT', 'score', 'ID', false, 20, null);
		$this->addColumn('WEIGHT', 'Weight', 'INTEGER', false, 11, 0);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', true, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Series', 'Series', RelationMap::MANY_TO_ONE, array('series_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Review', 'Review', RelationMap::MANY_TO_ONE, array('review_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Score', 'Score', RelationMap::MANY_TO_ONE, array('score_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Config', 'Config', RelationMap::ONE_TO_MANY, array('id' => 'model_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Review', 'Review', RelationMap::ONE_TO_MANY, array('id' => 'model_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Score', 'Score', RelationMap::ONE_TO_MANY, array('id' => 'model_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('UserMeta', 'UserMeta', RelationMap::ONE_TO_MANY, array('id' => 'model_id', ), 'RESTRICT', 'RESTRICT');
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

} // ModelTableMap
