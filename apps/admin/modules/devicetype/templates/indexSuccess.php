<h1>DeviceTypes List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Info</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($DeviceTypes as $DeviceType): ?>
    <tr>
      <td><a href="<?php echo url_for('devicetype/edit?id='.$DeviceType->getId()) ?>"><?php echo $DeviceType->getId() ?></a></td>
      <td><?php echo $DeviceType->getName() ?></td>
      <td><?php echo $DeviceType->getInfo() ?></td>
      <td><?php echo $DeviceType->getCreatedAt() ?></td>
      <td><?php echo $DeviceType->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('devicetype/new') ?>">New</a>
