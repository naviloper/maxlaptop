<?php

/**
 * Score filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseScoreFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'model_id'    => new sfWidgetFormPropelChoice(array('model' => 'Model', 'add_empty' => true)),
      'overall'     => new sfWidgetFormFilterInput(),
      'design'      => new sfWidgetFormFilterInput(),
      'features'    => new sfWidgetFormFilterInput(),
      'performance' => new sfWidgetFormFilterInput(),
      'battery'     => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'model_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Model', 'column' => 'id')),
      'overall'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'design'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'features'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'performance' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'battery'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('score_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Score';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'user_id'     => 'ForeignKey',
      'model_id'    => 'ForeignKey',
      'overall'     => 'Number',
      'design'      => 'Number',
      'features'    => 'Number',
      'performance' => 'Number',
      'battery'     => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
