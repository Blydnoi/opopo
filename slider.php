<? 
require_once '../connect.php';
$edit_query = mysqli_query($link, "SELECT * FROM slider");
?>

<div class="sl_main">
    <div class="sl">
      <?
foreach ($edit_query as $edit_query) {
 ?>
      <div class="sl_slide">
          <a href="#"><img src="<?php echo $tmp_dir; ?><?= $edit_query['img_1']; ?>">
            <div class="sl_text_container">
                <div class="sl_text">
                  <h3>Assassin’s Creed Odyssey</h3>
                </div>
                <div class="sl_price">
                  <h3>399 ₽</h3>
                </div>
            </div>
          </a>
      </div>
    <? }; ?>
          <div class="sl_slide">
          <a href="#"><img src="<?php echo $tmp_dir; ?>images/slide-1.jpg">
            <div class="sl_text_container">
                <div class="sl_text">
                  <h3>Assassin’s Creed Odyssey</h3>
                </div>
                <div class="sl_price">
                  <h3>399 ₽</h3>
                </div>
            </div>
          </a>
      </div>
      <div class="sl_slide">
        <a href="#"><img src="<?php echo $tmp_dir; ?>images/slide-2.jpg">
            <div class="sl_text_container">
                <div class="sl_text">
                  <h3>Grand Thief Auto </h3>
                </div>
                <div class="sl_price">
                  <h3>399 ₽</h3>
                </div>
            </div>
        </a>
      </div>
      <div class="sl_slide">
        <a href="#"><img src="<?php echo $tmp_dir; ?>images/slide-3.jpg">
          <div class="sl_text_container">
                <div class="sl_text">
                  <h3>Playerunknown's battlegrounds</h3>
                </div>
                <div class="sl_price">
                  <h3>399 ₽</h3>
                </div>
            </div>
        </a>
      </div>
    </div>
  </div>