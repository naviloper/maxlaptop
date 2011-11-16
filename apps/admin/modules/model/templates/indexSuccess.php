<h1>Models List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Model name</th>
      <th>Model info</th>
      <th>Series</th>
      <th>Review</th>
      <th>Score</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Models as $Model): ?>
    <tr>
      <td><a href="<?php echo url_for('model/edit?id='.$Model->getId()) ?>"><?php echo $Model->getId() ?></a></td>
      <td><?php echo $Model->getModelName() ?></td>
      <td><?php echo $Model->getModelInfo() ?></td>
      <td><?php echo $Model->getSeries()->getSeriesName() ?></td>
      <td><?php echo $Model->getReviewId() ?></td>
      <td><?php echo $Model->getScoreId() ?></td>
      <td><?php echo $Model->getCreatedAt() ?></td>
      <td><?php echo $Model->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('model/new') ?>">New</a>
