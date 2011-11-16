<?php

/**
 * Device filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseDeviceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_id'    => new sfWidgetFormPropelChoice(array('model' => 'DeviceType', 'add_empty' => true)),
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'info'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rating'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'type_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'DeviceType', 'column' => 'id')),
      'name'       => new sfValidatorPass(array('required' => false)),
      'info'       => new sfValidatorPass(array('required' => false)),
      'rating'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('device_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Device';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'type_id'    => 'ForeignKey',
      'name'       => 'Text',
      'info'       => 'Text',
      'rating'     => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
