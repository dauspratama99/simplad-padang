<!-- Modal search -->
<div class="modal" tabindex="-1" id="searchPegawai">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($pegawai as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?></td>
                                <td> <?= $row['pegawaiNip']; ?></td>
                                <td> <?= $row['pegawaiNama']; ?></td>
                                <td> <?= $row['pegawaiJabatan']; ?></td>
                                <td style="text-align: center;">
                                    <a class="btn-sm btn-info btn-choose" data-nip="<?= $row['pegawaiNip']; ?>" data-nama="<?= $row['pegawaiNama']; ?>"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btn-choose').on('click', function() {
        const nip = $(this).data('nip');
        const nama = $(this).data('nama');
        $('.nip').val(nip);
        $('.nama').val(nama);
        $('#searchPegawai').modal('hide');
    });
</script>