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
             <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary btn-sm">Tambah Soal</button>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr> 
                    <th style="width: 1px;">No</th>
                    <th>Judul</th>
                    <th>Mapel</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data as $key): ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td style="width: 100%;"><?php echo $key['evaluasi_judul'] ?></td>
                      <td><?php echo $key['mapel_nama'] ?></td>
                      <td><?php echo $key['evaluasi_jumlah'] ?></td>
                      <td><?php echo $key['evaluasi_tanggal'] ?></td>
                      <div style="width: 130px;">
                        <td>
                          <a href="<?php echo base_url('evaluasi/edit/').$key['evaluasi_id'].'/'.$key['evaluasi_uraian'] ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a>
                          <button type="button" onclick="del('<?php echo base_url('evaluasi/delete/').$key['evaluasi_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                      </div>
                    </tr>
                    
                  <?php $no++; ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">

            <form method="post" action="<?php echo base_url('evaluasi/set'); ?>">

              <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Soal</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Judul</label>
                          <input class="form-control" required="" name="evaluasi_judul" type="text" value="" id="example-text-input">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Jumlah Soal</label>
                        <input class="form-control" required="" name="evaluasi_jumlah" type="number" value="" id="example-text-input">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Mata Pelajaran</label>
                        <select id="mapel" class="form-control" required="" name="evaluasi_mapel">
                          <option value="" hidden="">-- Pilih --</option>
                          <?php foreach ($mapel_data as $key): ?>
                            <option value="<?php echo $key['mapel_id'] ?>"><?php echo $key['mapel_nama'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label form-control-label">Uraian</label>
                        <select id="uraian" class="form-control" name="evaluasi_uraian" required="">
                          
                        </select>
                        <small class="text-danger">* Jika nilai siswa kurang dari KKM</small>
                      </div>
                    </div>
                  </div>

              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-cog fa-spin"></i> Setup</button>
                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
              </div>

            </form>

          </div>
        </div>
      </div>
      
<script type="text/javascript">
  $(document).ready(function(){
    $("#mapel").change(function(){
      var idmapel = $(this).val();
      
      $.ajax({
        url : "<?php echo base_url('evaluasi/getMapel/') ?>"+idmapel,
        method : "POST",
        data : {idmapel: idmapel},
        async : false,
        dataType : 'json',
        success: function(data){

          $('#uraian').empty();
          $.each(data, function(index) {

            $('#uraian').append('<option value="'+data[index].uraian_id+'">'+data[index].uraian_judul+'</option>');

          });

        }
      });

    });
  });
</script>