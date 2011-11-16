<?php

/**
 * Model filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseModelFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'model_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'model_info' => new sfWidgetFormFilterInput(),
      'series_id'  => new sfWidgetFormPropelChoice(array('model' => 'Series', 'add_empty' => true)),
      'review_id'  => new sfWidgetFormPropelChoice(array('model' => 'Review', 'add_empty' => true)),
      'score_id'   => new sfWidgetFormPropelChoice(array('model' => 'Score', 'add_empty' => true)),
      'weigth'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'model_name' => new sfValidatorPass(array('required' => false)),
      'model_info' => new sfValidatorPass(array('required' => false)),
      'series_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Series', 'column' => 'id')),
      'review_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Review', 'column' => 'id')),
      'score_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Score', 'column' => 'id')),
      'weigth'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('model_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Model';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'model_name' => 'Text',
      'model_info' => 'Text',
      'series_id'  => 'ForeignKey',
      'review_id'  => 'ForeignKey',
      'score_id'   => 'ForeignKey',
      'weigth'     => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
