<?php
// include header
include('./extends/header.php');

?>
<!-- insert ur skill -->
<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-warning">Skills_Insert<span class="text-warning">(✍🏻)</span></h1>
    </div>
  </div>
</div>
</div>


<!-- skills insert -->

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <form action="skill_post.php" method="POST">
          <!-- title -->
          <label for="form-control">Title</label>
          <textarea name="title" class="form-control"></textarea>
          <!-- Year -->
          <label for="form-control">Year</label>
          <textarea name="year" class="form-control"></textarea>
          <!-- Skill_percentage  -->
          <label for="form-control">Skills_Percentage</label>
          <select name="skill_percentage" class="form-control">
          <?php for($i=1; $i<= 100; $i++) : ?>
            <option value="<?= $i ?>">
              Skill: <?= $i ?>%
            </option>
          <?php endfor; ?>
          </select>
           <!-- button area -->
            <button type="submit" class="btn btn-primary mt-2" name="insert_btn">Insert</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- sweet alret -->








<?php
// include footer
include('./extends/footer.php');
?>