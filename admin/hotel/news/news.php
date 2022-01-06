<?php

require('header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">News</h1>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#show-item" role="tab" aria-controls="home" aria-selected="true">Show Item</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#add-item" role="tab" aria-controls="profile" aria-selected="false">Add Item</a>
    </li>

  </ul>
  <div class="tab-content" id="myTabContent">

    <?php include "./tables_diskon.php" ?>
    <?php include "./add_diskon.php" ?>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<?php

require('footer.php')
?>