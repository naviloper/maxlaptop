<h1>Devices List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Type</th>
      <th>Name</th>
      <th>Info</th>
      <th>Rating</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Devices as $Device): ?>
    <tr>
      <td><a href="<?php echo url_for('device/edit?id='.$Device->getId()) ?>"><?php echo $Device->getId() ?></a></td>
      <td><?php echo $Device->getTypeId() ?></td>
      <td><?php echo $Device->getName() ?></td>
      <td><?php echo $Device->getInfo() ?></td>
      <td><?php echo $Device->getRating() ?></td>
      <td><?php echo $Device->getCreatedAt() ?></td>
      <td><?php echo $Device->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('device/new') ?>">New</a>
