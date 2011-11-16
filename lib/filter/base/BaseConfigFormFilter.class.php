<?php

/**
 * Config filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseConfigFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'model_id'    => new sfWidgetFormPropelChoice(array('model' => 'Model', 'add_empty' => true)),
      'config_name' => new sfWidgetFormFilterInput(),
      'weigth'      => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'model_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Model', 'column' => 'id')),
      'config_name' => new sfValidatorPass(array('required' => false)),
      'weigth'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('config_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Config';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'model_id'    => 'ForeignKey',
      'config_name' => 'Text',
      'weigth'      => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
