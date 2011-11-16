<h1>ConfigFields List</h1>

<table>
  <thead>
    <tr>
      <th>Edit</th>
      <th>Category</th>
      <th>Name</th>
      <th>Html comment</th>
      <th>Info</th>
      <th>Weight</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ConfigFields as $ConfigField): ?>
    <tr>
      <td><a href="<?php echo url_for('configfield/edit?id='.$ConfigField->getId()) ?>">Edit</a></td>
      <td><?php echo $ConfigField->getConfigFieldCategory()->getName() ?></td>
      <td><?php echo $ConfigField->getName() ?></td>
      <td><?php echo $ConfigField->getHtmlComment() ?></td>
      <td><?php echo $ConfigField->getInfo() ?></td>
      <td><?php echo $ConfigField->getWeight() ?></td>
      <td><?php echo $ConfigField->getCreatedAt() ?></td>
      <td><?php echo $ConfigField->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('configfield/new') ?>">New</a>
