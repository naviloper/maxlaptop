<?php

/**
 * Series filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BaseSeriesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'series_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'series_info' => new sfWidgetFormFilterInput(),
      'brand_id'    => new sfWidgetFormPropelChoice(array('model' => 'Brand', 'add_empty' => true)),
      'weight'      => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'series_name' => new sfValidatorPass(array('required' => false)),
      'series_info' => new sfValidatorPass(array('required' => false)),
      'brand_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Brand', 'column' => 'id')),
      'weight'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('series_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Series';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'series_name' => 'Text',
      'series_info' => 'Text',
      'brand_id'    => 'ForeignKey',
      'weight'      => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
