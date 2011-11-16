<h1>Seriess List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Series name</th>
      <th>Series info</th>
      <th>Brand</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Seriess as $Series): ?>
    <tr>
      <td><a href="<?php echo url_for('series/edit?id='.$Series->getId()) ?>"><?php echo $Series->getId() ?></a></td>
      <td><?php echo $Series->getSeriesName() ?></td>
      <td><?php echo $Series->getSeriesInfo() ?></td>
      <td><?php echo $Series->getBrandId() ?></td>
      <td><?php echo $Series->getCreatedAt() ?></td>
      <td><?php echo $Series->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('series/new') ?>">New</a>
