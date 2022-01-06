<?php

require('header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">News</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="tables_diskon.php" role="tab" aria-controls="home" aria-selected="true">Show News</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#add-diskon" role="tab" aria-controls="profile" aria-selected="false">Add Diskon</a>
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