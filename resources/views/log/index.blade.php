@extends('layouts.main')

@section('container')

{{-- Start Container --}}
<div class="container">

{{-- Start Table Content --}}
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width: 33%">Nama</th>
      <th scope="col" style="width: 33%">NIM</th>
      <th scope="col" style="width: 33%">Waktu</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($logs as $log) : ?>
    <tr>
      <td><?= $log->nama ?></td>
      <td><?= $log->nim ?></td>
      <td><?= $log->waktu ?></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>

{{-- Start Link Paginate --}}
<div class="d-flex justify-content-end">
  {{$logs->links()}}
</div>
{{-- End Link Paginate --}}

{{-- Start Script --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
{{-- End Scirt --}}

@endsection