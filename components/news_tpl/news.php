<?php

?>

  <div class="card">
    <div class="card-header" id="heading<?= $onenews['id']?>">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $onenews['id']?>" aria-expanded="true" aria-controls="collapse<?= $onenews['id']?>">
    <?= $onenews['title']?>
</button>
      </h5>
    </div>

    <div id="collapse<?= $onenews['id']?>" class="collapse <?php if($onenews['id'] == 1) { echo "show"; }?>" aria-labelledby="heading<?= $onenews['id']?>" data-parent="#accordionExample">
      <div class="card-body">
          <?= $onenews['date'] ?>
          <hr>
          <?= $onenews['content'] ?>
      </div>
    </div>
  </div>

