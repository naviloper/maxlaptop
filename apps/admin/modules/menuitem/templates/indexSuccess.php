<h1>MenuItems List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Menu</th>
      <th>Type</th>
      <th>Ref</th>
      <th>List order</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($MenuItems as $MenuItem): ?>
    <tr>
      <td><a href="<?php echo url_for('menuitem/edit?id='.$MenuItem->getId()) ?>"><?php echo $MenuItem->getId() ?></a></td>
      <td><?php echo $MenuItem->getMenuId() ?></td>
      <td><?php echo $MenuItem->getType() ?></td>
      <td><?php echo $MenuItem->getRefId() ?></td>
      <td><?php echo $MenuItem->getListOrder() ?></td>
      <td><?php echo $MenuItem->getCreatedAt() ?></td>
      <td><?php echo $MenuItem->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('menuitem/new') ?>">New</a>
