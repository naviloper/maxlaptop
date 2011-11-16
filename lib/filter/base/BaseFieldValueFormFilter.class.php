<?php

/**
 * FieldValue filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseFieldValueFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'field_id'   => new sfWidgetFormPropelChoice(array('model' => 'ConfigField', 'add_empty' => true)),
      'config_id'  => new sfWidgetFormPropelChoice(array('model' => 'Config', 'add_empty' => true)),
      'value'      => new sfWidgetFormFilterInput(),
      'rating'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'field_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ConfigField', 'column' => 'id')),
      'config_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Config', 'column' => 'id')),
      'value'      => new sfValidatorPass(array('required' => false)),
      'rating'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('field_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FieldValue';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'field_id'   => 'ForeignKey',
      'config_id'  => 'ForeignKey',
      'value'      => 'Text',
      'rating'     => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
