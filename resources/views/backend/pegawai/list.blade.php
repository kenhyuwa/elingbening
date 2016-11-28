<table id="product-table" class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th width="10px">No</th>
      <th>Kode Pegawai</th>
      <th>Nama</th>
      <th>Gender</th>
      <th>Phone</th>
      <th>Level</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $no =1; ?>
    @foreach ($pegawais as $pegawai)
    <tr data-id="{{ $pegawai->kode_pegawai }}">
      <td>{{ $no++ }}</td>
      <td>{{ $pegawai->kode_pegawai }}</td>
      <td>{{ ucwords($pegawai->name) }}</td>
      <td>{{ ucwords($pegawai->gender) }}</td>
      <td>{{ $pegawai->phone }}</td>
      <td>
        <center>
          @if($pegawai->level == 'administrator')
          <label class="label label-success"><i class="fa fa-circle"></i> Administrator</label>
          @else
          <span class="label label-success"><i class="fa fa-check-circle"></i> Casier</span>
          @endif
        </center>
      </td>
      <td>
        <center>
          <a href="{{ URL('pegawai/detail/'.base64_encode($pegawai->kode_pegawai)) }}" class="btn btn-xs btn-flat btn-info"><i class="fa fa-eye"></i></a>
          <a type="button" onclick="deletes('{{ base64_encode($pegawai->kode_pegawai) }}')" class="btn btn-xs btn-flat btn-danger"><i class="fa fa-trash-o"></i></a>
        </center>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>