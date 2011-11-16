<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('model/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('model/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'model/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['model_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['model_name']->renderError() ?>
          <?php echo $form['model_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['model_info']->renderLabel() ?></th>
        <td>
          <?php echo $form['model_info']->renderError() ?>
          <?php echo $form['model_info'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['series_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['series_id']->renderError() ?>
          <?php echo $form['series_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['review_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['review_id']->renderError() ?>
          <?php echo $form['review_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['score_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['score_id']->renderError() ?>
          <?php echo $form['score_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>