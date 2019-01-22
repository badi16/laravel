<!-- app/views/kota/index.blade.php -->
<<<<<<< HEAD
<?php //telah terjadi perubahan // ?>
=======
>>>>>>> 9fc8cde2c191769af53db972c197638a575abf18
@extends('theme.default')
@section('content')

<div class="">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Tabel Kota <a href="{{route('kota.create')}}" class="btn btn-primary"></i> Tambah </a>
<a href="{{route('kota.index')}}" class="btn btn-primary"></i> Tabel Kota </a>
</h2>

<div class="clearfix"></div>
</div>
<div class="x_content">
				
<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Propinsi </th>
            <th>Nama Kota</th>
            <th>Aksi</th>
			
        </tr>
    </thead>
    <tbody>
    @foreach($kota as $key => $value)
     <tr>
        <td>{{ $value->id }}</td>
		<td>{{ $value->propinsi->nama_propinsi }}</td>
        <td>{{ $value->nama_kota }}</td>
        
        <!-- we will also add show, edit, and delete buttons -->
        <td>
		 
		  <a href="{{ route('kota.edit', ['id' => $value->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
		  <a href="{{ route('kota.destroy',['id'=>$value->id]) }}" class="btn btn-danger btn-xs" data-method="delete" rel="nofollow" 
		          data-confirm="Are you sure you want to delete this?">
		  <i class="fa fa-trash-o" title="Delete"></i> </a>
       
	      
		  </td>
    </tr>
    @endforeach
    </tbody>
</table>
<?php echo str_replace('/?', '?', $kota->render()); ?>

</div>
</div>
</div>
</div>
@endsection

<script>
function deleteKota(id) {
    if (confirm('Delete this Kota?')) {
        $.ajax({
            type: "DELETE",
            url: 'kota/' + id, //resource
            success: function(affectedRows) {
                //if something was deleted, we redirect the user to the users page, and automatically the user that he deleted will disappear
                if (affectedRows > 0) window.location = 'kota';
            }
        });
    }
}
</script>

