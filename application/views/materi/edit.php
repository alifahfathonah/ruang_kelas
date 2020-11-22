<!-- Header -->
     <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
        </div> 
      </div>
    </div>
    <!-- Page content -->

<div class="container-fluid mt--6">
      <!-- Table --> 
      <div class="row"> 
        <div class="col">
          <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <a href="<?php echo base_url().$this->uri->segment(1); ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-angle-double-left"></i> Back</button></a>
              </div>
              <!-- Card body -->  
              <div class="card-body">
                <form id="form" method="post" action="<?php echo base_url('materi/update/').$this->uri->segment(3)?>">
                  <div class="form-group">
                    <input <?= ($this->session->userdata('level') < 3)?'':'readonly=""' ?> required="" placeholder="Tulis Judul" class="form-control" type="text" name="materi_judul" value="<?php echo $data['materi_judul'] ?>">
                  </div>

                  <div class="form-group">
                    <select name="materi_mapel" required="" class="form-control">
                      <option value="<?php echo $data['materi_mapel'] ?>" hidden=""><?php echo $data['mapel_nama'] ?></option>
                      <?php foreach ($mapel_data as $key): ?>
                        <option value="<?php echo $key['mapel_id'] ?>"><?php echo $key['mapel_nama'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <select name="materi_kelas" required="" class="form-control">
                      <option value="<?php echo $data['materi_kelas'] ?>" hidden=""><?php echo $data['kelas_nama'] ?></option>
                      <?php foreach ($kelas_data as $key): ?>
                        <option value="<?php echo $key['kelas_id'] ?>"><?php echo $key['kelas_nama'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group">

                    <textarea name="materi_isi" <?= ($this->session->userdata('level') < 3)?'id="editor1"':'' ?> rows="10" cols="80"><?php echo $data['materi_isi'] ?></textarea>
                  </div>

                <?php if($this->session->userdata('level') < 3): ?>
                <br/>
                  <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Simpan</button>
                <?php endif ?>

                </form>
              </div>
            </div>