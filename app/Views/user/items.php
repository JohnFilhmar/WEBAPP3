<div class="fashion_section">
   <div id="main_slider" class="carousel slide" data-ride="carousel">
      <br><h4 class="fashion_taital"><u>Featured Items</u></h4>
         <?php foreach($category as $c): ?>
         <div class="carousel-inner">
            <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital"><?= $c['catname'];?></h1>
                     <div class="fashion_section_2">
                        <div class="row">
                              <?php $instance = 0; ?>
                              <?php foreach($products as $p): ?>
                              <?php if($p['category'] == $c['id'] && $instance < 3): ?>
                              <div class="col-lg-4 col-sm-4">
                                 <div class="box_main">
                                    <h4 class="shirt_text"><?= $p['name']; ?></h4>
                                    <p class="price_text">Price  <span style="color: #262626;">$ <?= $p['price']; ?></span></p>
                                    <div class="tshirt_img"><img src="<?= base_url(); ?>/products/images/<?= $p['image']; ?>.png"></div>
                                    <p><?= $p['description']; ?></p>
                                    <div class="btn_main">
                                       <form method="post" action="/buyitem">
                                          <input type="hidden" name="product_id" value="<?= $p['id']; ?>">
                                          <div class="btn buy_bt"><button type="submit" class="btn btn-warning btn-block">Buy Now</button></div>
                                       </form>
                                       <div class="seemore_bt"><a href="#">See More</a></div>
                                    </div>
                                 </div>
                              </div>
                            <?php $instance += 1; ?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                     </div>
                  </div>
               </div>
         </div><br>
         <?php endforeach;?>
   </div><br><br>
</div>