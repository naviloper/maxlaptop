<h1>Medias List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Parent</th>
      <th>Title</th>
      <th>Type</th>
      <th>Class name</th>
      <th>Ext</th>
      <th>Is main</th>
      <th>Path</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Medias as $Media): ?>
    <tr>
      <td><a href="<?php echo url_for('media/edit?id='.$Media->getId()) ?>"><?php echo $Media->getId() ?></a></td>
      <td><?php echo $Media->getParentId() ?></td>
      <td><?php echo $Media->getTitle() ?></td>
      <td><?php echo $Media->getType() ?></td>
      <td><?php echo $Media->getClassName() ?></td>
      <td><?php echo $Media->getExt() ?></td>
      <td><?php echo $Media->getIsMain() ?></td>
      <td><?php echo $Media->getPath() ?></td>
      <td><?php echo $Media->getCreatedAt() ?></td>
      <td><?php echo $Media->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('media/new') ?>">New</a>
