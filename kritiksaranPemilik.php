<?php
require 'header.php';
require 'sidebar.php';
require 'bootstrap.html';

$response = requestListReports();
?>

<div class="content-container">
  <div class="container-fluid">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5 mt-3">
          <h2 class="heading-section">Kritik Saran</h2>
        </div>
      </div>

      <?php
      foreach ($response->result as $report) {
      ?>
        <div class="card" style=" border-top: 0; border-left: 0; border-right: 0; border-bottom: 3px solid grey;">
          <div class="card-body">
            <h5 class="card-title" style="color:#5C8E9E"><?= date("l, d F Y", strtotime($report->created_at)) ?></h5>
            <p class="card-text"><?= $report->caption ?></p>
          </div>
          <?php if (!empty($report->image)) : ?>
            <img src="<?= $baseUrl . '/' . $report->image ?>" alt="komplain" style="width:280; height:180;">
          <?php endif; ?>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>
<style>
  .content-container {
    padding-top: 50px;
    padding-left: 220px;
  }
</style>