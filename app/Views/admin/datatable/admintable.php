<div class="card">
    <div class="card-header">
        <h3 class="card-title">Items Datatable</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
    </div>
    <div class="card-body">
        <table id="example1"class="table table-bordered table-striped">            
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        </thead>
            <tbody>
                <?php foreach($products as $p): ?>
            <tr>
                <td><?= $p['name']; ?></td>
                <td><?= $p['description']; ?></td>
                <td>
                    <?php foreach($category as $c): ?>
                        <?php if($p['category'] == $c['id']){
                            echo $c['catname'];
                        } ?>
                    <?php endforeach; ?>
                </td>
                <td><?= $p['price']; ?></td>
                <td><?= $p['quantity']; ?></td>
                <td style="text-align: center;">
                    <a class="btn btn-danger col-sm-4" href="/deleteitem/<?= $p['id'] ?>"> Delete</a>
                    <a class="btn btn-success col-sm-4 open-modal" href="/edititem/<?= $p['id'] ?>">Edit</a>
                </td>
            </tr>
                <?php endforeach; ?>
            </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
    </div>
</div>