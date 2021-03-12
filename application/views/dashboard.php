<div class="container">
<div class="row">
<div class="col-md-2">
<ul class="list-group">
  <li class="list-group-item"><a href="company-profile">Profile</a></li>
  <li class="list-group-item"><a href="empoyee-register">Register</a></li>
</ul>
</div>
<div class="col-md-8">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Symbol</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  <?php $i= 1; foreach($quotes as $q) {  ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $q->symbol; ?></td>
      <td><?php echo $q->name; ?></td>
      <td><?php echo $q->price; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</div>
</div>