<?php

/**
 * Page filter form base class.
 *
 * @package    Maxlaptop
 * @subpackage filter
 * @author     navid045@gmail.com
 */
abstract class BasePageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_id'    => new sfWidgetFormPropelChoice(array('model' => 'Page', 'add_empty' => true)),
      'title'        => new sfWidgetFormFilterInput(),
      'keywords'     => new sfWidgetFormFilterInput(),
      'metadata'     => new sfWidgetFormFilterInput(),
      'content'      => new sfWidgetFormFilterInput(),
      'is_published' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'p_order'      => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'parent_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Page', 'column' => 'id')),
      'title'        => new sfValidatorPass(array('required' => false)),
      'keywords'     => new sfValidatorPass(array('required' => false)),
      'metadata'     => new sfValidatorPass(array('required' => false)),
      'content'      => new sfValidatorPass(array('required' => false)),
      'is_published' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'p_order'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'parent_id'    => 'ForeignKey',
      'title'        => 'Text',
      'keywords'     => 'Text',
      'metadata'     => 'Text',
      'content'      => 'Text',
      'is_published' => 'Number',
      'p_order'      => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
