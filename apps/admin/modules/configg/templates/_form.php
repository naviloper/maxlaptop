<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('config/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('config/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'config/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['model_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['model_id']->renderError() ?>
          <?php echo $form['model_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cpu']->renderLabel() ?></th>
        <td>
          <?php echo $form['cpu']->renderError() ?>
          <?php echo $form['cpu'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cache']->renderLabel() ?></th>
        <td>
          <?php echo $form['cache']->renderError() ?>
          <?php echo $form['cache'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hdd']->renderLabel() ?></th>
        <td>
          <?php echo $form['hdd']->renderError() ?>
          <?php echo $form['hdd'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ram']->renderLabel() ?></th>
        <td>
          <?php echo $form['ram']->renderError() ?>
          <?php echo $form['ram'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['graphic']->renderLabel() ?></th>
        <td>
          <?php echo $form['graphic']->renderError() ?>
          <?php echo $form['graphic'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['display']->renderLabel() ?></th>
        <td>
          <?php echo $form['display']->renderError() ?>
          <?php echo $form['display'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['weight']->renderLabel() ?></th>
        <td>
          <?php echo $form['weight']->renderError() ?>
          <?php echo $form['weight'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['optic']->renderLabel() ?></th>
        <td>
          <?php echo $form['optic']->renderError() ?>
          <?php echo $form['optic'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['network']->renderLabel() ?></th>
        <td>
          <?php echo $form['network']->renderError() ?>
          <?php echo $form['network'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['wifi']->renderLabel() ?></th>
        <td>
          <?php echo $form['wifi']->renderError() ?>
          <?php echo $form['wifi'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['wwan']->renderLabel() ?></th>
        <td>
          <?php echo $form['wwan']->renderError() ?>
          <?php echo $form['wwan'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['size']->renderLabel() ?></th>
        <td>
          <?php echo $form['size']->renderError() ?>
          <?php echo $form['size'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['battery']->renderLabel() ?></th>
        <td>
          <?php echo $form['battery']->renderError() ?>
          <?php echo $form['battery'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['os']->renderLabel() ?></th>
        <td>
          <?php echo $form['os']->renderError() ?>
          <?php echo $form['os'] ?>
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
