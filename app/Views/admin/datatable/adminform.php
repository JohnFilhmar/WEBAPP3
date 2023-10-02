
<?php if(!isset($toedit['id'])): ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Forms</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= !isset($toedit['category'])? "Add an Item to the Database" : "Edit Product" ?></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body modal-body">
        <form action="/submitform<?= (isset($toedit['id']))? "/" . $toedit['id'] : ""?>" method="post" enctype="multipart/form-data" id="adminform">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Item Name :</label>
                        <input type="text" name="name" placeholder="Item Name" class="form-control" required value="<?= isset($toedit['name'])? $toedit['name'] : '' ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Item Category :</label>
                        <select name="category" class="custom-select">
                            <?php foreach($category as $c): ?>
                                <option value="<?= $c['catname']; ?>" <?= isset($toedit['category']) && $toedit['category'] == $c['id'] ? 'selected' : '' ?>>
                                <?= $c['catname']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="description">Item Description :</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter Item Description. . . ." required><?= isset($toedit['description'])? $toedit['description'] : '' ?></textarea>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="price">Price :</label>
                        <input type="number" class="form-control" name="price" placeholder="Enter Price of Item(1-99)" required value="<?= isset($toedit['price'])? $toedit['price'] : '' ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="quantity">Quantity :</label>
                        <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity of Item(1-99)" required value="<?= isset($toedit['quantity'])? $toedit['quantity'] : '' ?>">
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputFile">Upload an Image :</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile" accept=".png">
                    <label class="custom-file-label" for="exampleInputFile"><?= isset($toedit['image'])? $toedit['image'] . ".png" : "Choose a .png file" ?></label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><?= (!isset($toedit['id']))? "Submit" : "Update" ?></button>
        </form>
    </div>
</div>
<?php endif ?>
<?php if(isset($toedit['id'])): ?>
<div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Forms</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalButton">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= !isset($toedit['category'])? "Add an Item to the Database" : "Edit Product" ?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body modal-body">
                        <form action="/submitform<?= (isset($toedit['id']))? "/" . $toedit['id'] : ""?>" method="post" enctype="multipart/form-data" id="adminform">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Item Name :</label>
                                        <input type="text" name="name" placeholder="Item Name" class="form-control" required value="<?= isset($toedit['name'])? $toedit['name'] : '' ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0">Item Category :</label>
                                        <select name="category" class="custom-select">
                                            <?php foreach($category as $c): ?>
                                                <option value="<?= $c['catname']; ?>" <?= isset($toedit['category']) && $toedit['category'] == $c['id'] ? 'selected' : '' ?>>
                                                <?= $c['catname']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Item Description :</label>
                                        <textarea name="description" class="form-control" rows="3" placeholder="Enter Item Description. . . ." required><?= isset($toedit['description'])? $toedit['description'] : '' ?></textarea>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="price">Price :</label>
                                        <input type="number" class="form-control" name="price" placeholder="Enter Price of Item(1-99)" required value="<?= isset($toedit['price'])? $toedit['price'] : '' ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="quantity">Quantity :</label>
                                        <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity of Item(1-99)" required value="<?= isset($toedit['quantity'])? $toedit['quantity'] : '' ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputFile">Upload an Image :</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile" accept=".png">
                                    <label class="custom-file-label" for="exampleInputFile"><?= isset($toedit['image'])? $toedit['image'] . ".png" : "Choose a .png file" ?></label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><?= (!isset($toedit['id']))? "Submit" : "Update" ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>