<?php
    require '../../db_conn.php';

    if (!$conn) {
      die("Connection failed:" . mysqli_connect_error());
      
    }

?>
<div class="tab-pane fade" id="add-diskon" role="tabpanel" aria-labelledby="home-tab">
  <div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namaDiskon">Nama Diskon</label>
                        <input type="text" class="form-control" id="namaDiskon" name="namaDiskon" placeholder="Masukkan Nama Diskon" required>
                    </div>
                    <select name="idKamar">                       
                    <option selected>tipe kamar</option>
                    <?php 
                    
                    $query=mysqli_query($conn, "SELECT * FROM kamar" );
                    while ($data=mysqli_fetch_array($query)){?>
		             <option value="<?=$data['idKamar'];?>"><?php echo $data['tipeKamar'];?></option>
                    <?php } ?>
                    </select>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Tulis diskripsi" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>