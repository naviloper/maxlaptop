<h1>ConfigFieldCategorys List</h1>

<table>
  <thead>
    <tr>
      <th>Edit</th>
      <th>Name</th>
      <th>Weight</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ConfigFieldCategorys as $ConfigFieldCategory): ?>
    <tr>
      <td><a href="<?php echo url_for('configfieldcategory/edit?id='.$ConfigFieldCategory->getId()) ?>">Edit</a></td>
      <td><?php echo $ConfigFieldCategory->getName() ?></td>
      <td><?php echo $ConfigFieldCategory->getWeight() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('configfieldcategory/new') ?>">New</a>
