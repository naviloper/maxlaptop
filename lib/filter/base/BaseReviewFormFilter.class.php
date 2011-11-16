<?php

/**
 * Review filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseReviewFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'  => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'model_id'   => new sfWidgetFormPropelChoice(array('model' => 'Model', 'add_empty' => true)),
      'cons'       => new sfWidgetFormFilterInput(),
      'pros'       => new sfWidgetFormFilterInput(),
      'rtext'      => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'author_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'model_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Model', 'column' => 'id')),
      'cons'       => new sfValidatorPass(array('required' => false)),
      'pros'       => new sfValidatorPass(array('required' => false)),
      'rtext'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('review_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Review';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'author_id'  => 'ForeignKey',
      'model_id'   => 'ForeignKey',
      'cons'       => 'Text',
      'pros'       => 'Text',
      'rtext'      => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
