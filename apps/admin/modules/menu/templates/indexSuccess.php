<h1>Menus List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Slot</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Menus as $Menu): ?>
    <tr>
      <td><a href="<?php echo url_for('menu/edit?id='.$Menu->getId()) ?>"><?php echo $Menu->getId() ?></a></td>
      <td><?php echo $Menu->getTitle() ?></td>
      <td><?php echo $Menu->getSlot() ?></td>
      <td><?php echo $Menu->getCreatedAt() ?></td>
      <td><?php echo $Menu->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('menu/new') ?>">New</a>
