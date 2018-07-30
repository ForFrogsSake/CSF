<?php if(count($logerrors) > 0): ?>
    <div class="error">
        <?php foreach ($logerrors as $lerror) : ?>
          <p><?php echo $lerror; ?></p>
        <?php endforeach ?>
    </div>
<?php  endif ?>