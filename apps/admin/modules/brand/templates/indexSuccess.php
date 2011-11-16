<h1>Brands List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Brand name</th>
      <th>Brand info</th>
      <th>Brand country</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Brands as $Brand): ?>
    <tr>
      <td><a href="<?php echo url_for('brand/edit?id='.$Brand->getId()) ?>"><?php echo $Brand->getId() ?></a></td>
      <td><?php echo $Brand->getBrandName() ?></td>
      <td><?php echo $Brand->getBrandInfo() ?></td>
      <td><?php echo $Brand->getBrandCountry() ?></td>
      <td><?php echo $Brand->getCreatedAt() ?></td>
      <td><?php echo $Brand->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('brand/new') ?>">New</a>
