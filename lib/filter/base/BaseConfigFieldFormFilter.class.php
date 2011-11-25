<?php

/**
 * ConfigField filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseConfigFieldFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'  => new sfWidgetFormPropelChoice(array('model' => 'ConfigFieldCategory', 'add_empty' => true)),
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'html_comment' => new sfWidgetFormFilterInput(),
      'info'         => new sfWidgetFormFilterInput(),
      'weight'       => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'category_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ConfigFieldCategory', 'column' => 'id')),
      'name'         => new sfValidatorPass(array('required' => false)),
      'html_comment' => new sfValidatorPass(array('required' => false)),
      'info'         => new sfValidatorPass(array('required' => false)),
      'weight'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('config_field_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfigField';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'category_id'  => 'ForeignKey',
      'name'         => 'Text',
      'html_comment' => 'Text',
      'info'         => 'Text',
      'weight'       => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
