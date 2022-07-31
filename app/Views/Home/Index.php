<?php $this->start('head');?>

<?php $this->end();?>

<?php $this->start('body');?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
    <div class="col-xl">
        <?php
        if(isset($data['status'])){
            echo "
            <div class='alert alert-success alert-dismissible' role='alert'>
                {$data['table_name']} Uploaded Successfully
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            }
        ?>
        <?php
        if(isset($data['error'])){
            echo "
            <div class='alert alert-danger alert-dismissible' role='alert'>
                Wrong file format Selected
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            }
        ?>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
            
            <h5 class="mb-0">Upload csv</h5>
            </div>
            <div class="card-body">
            <form action="<?= PROOT?>home/upload" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Csv File</label>
                <input type="file" required name="csv_file" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                </div>
                <div class="mb-3">
                <label class="form-label" for="basic-default-company">choose table</label>
                <select name="csv_table" required id="basic-default-company" class="form-select form-select">
                    <option>Select</option>
                    <option value="1">Countries</option>
                    <option value="2">Currencies</option>
                    </select>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Send</button>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
<?php $this->end();?>