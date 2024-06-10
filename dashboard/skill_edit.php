<?php
// include header
include('./extends/header.php');
// db connect
include('../config/db.php');
// select all skills from database
$id = $_GET['edit_id'];
$select_query = "SELECT * FROM skills WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);
$skill = mysqli_fetch_assoc($connect);

?>
<!-- insert ur skill -->
<div class="container">
<div class="row">
  <div class="col">
    <div class="page-description">
      <h1 class="fw-bold fs-1 text-primary">Skill_Edit<span class="text-warning">(✍🏻)</span></h1>
    </div>
  </div>
</div>
</div>


<!-- skills edit -->

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <form action="skill_post.php" method="POST">
          <!-- title -->
          <label for="form-control">Title</label>
          <textarea name="title" class="form-control"><?= $skill['title'] ?></textarea>
          <!-- Year -->
          <label for="form-control">Year</label>
          <textarea name="year" class="form-control"><?= $skill['year'] ?></textarea>
          <input type="hidden" value="<?= $skill['id'] ?>" name="edit_id">
          <!-- Skill_percentage  -->
          <label for="form-control">Skills_Percentage</label>
          <select  name="skill_percentage" class="form-control">
          <?php for($i=1; $i<= 100; $i++) : ?>
            <option value="<?= $i ?>">
              Skill: <?= $i ?>%
            </option>
          <?php endfor; ?>
          </select>
           <!-- button area -->
            <button type="submit" class="btn btn-success mt-2" name="update_btn">Update</button>
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