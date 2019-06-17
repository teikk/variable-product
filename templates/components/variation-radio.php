<?php foreach($options as $key => $option): ?>
  <div class="variation-radio">
    <input type="radio" id="<?php echo $id.'-'.$key;?>" name="<?= $name;?>" value="<?= $option;?>" <?php checked($args['selected'],$option);?>>
    <label for="<?php echo $id.'-'.$key;?>"><?= $option;?></label>
  </div>
<?php endforeach;?>
<script>
  (function($){
    $(document).on('change', '.variation-radio input', function() {
      $('select[name="'+$(this).attr('name')+'"]').val($(this).val()).trigger('change');
    });
  })(jQuery);
</script>