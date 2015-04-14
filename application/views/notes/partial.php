<? if($notes){ ?>
   <? foreach($notes as $note){ ?>
      <div class="note">
        <h4><?= $note['title']; ?></h4>
        <form class='deleteForm pull-right' action="/notes/delete" method='post'>
          <input type="hidden" name='id' value="<?= $note['id']; ?>">
          <input class='btn btn-link' type="submit" value='delete'>
        </form>
        <form class='updateForm' action="/notes/update" method='post'>
          <input type="hidden" name='id' value='<?= $note['id']; ?>'>
          <textarea name="content" cols="30" rows="10"><?= $note['content']; ?></textarea><br>
          <!-- <input class='btn btn-success' type="submit" value='update'> -->
        </form>
      </div>
   <? } ?>
<? } ?>