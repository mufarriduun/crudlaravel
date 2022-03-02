<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CRUD</title>
  </head>
  <body>
      <br><br>
      <h1 class="text-center" mb-4>Data Pegawai</h1>
      <div class="container">
        <a href="{{ route('create') }}" class="btn btn-success mb-4">Tambah+</a>
        
        {{-- search form --}}
        <form action="/home" method="get">
          <div class="input-group mb-3 col-auto">
            <input type="search" class="form-control" name="search" placeholder="Search">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
          </div>
        </form>
        
         
          
        
          <div class="row">
              {{-- @if (session('status'))
              {{-- icon --}}
              {{-- <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
              </svg>
              <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  {{ session('status') }}
                </div>
              </div>
                  
              @endif --}} 
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Foto</th>
                    
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i =1 ?>
                    @foreach ($data as $index=> $item) 
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jeniskelamin }}</td>
                        <td>0{{ $item->nomorhp }}</td>
                        <td>{{ $item->created_at->diffforHumans() }}</td>
                        {{-- foto --}}
                        <td>
                            <img src="{{ asset('image/'.$item->foto) }}" alt="" width="60px">
                        </td>
                        
                        <td>
                            <a href="/edit/{{ $item->id }}" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}">Hapus</a>
                        </td>
                      </tr>
                    @endforeach
                  
                  
                </tbody>
              </table>
        
              {{ $data->links() }}
            
          </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>

  <script>
    $('.delete').click(function(){

      var id = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');
      swal({
                title: "Yakin akan menghapus "+nama+"?",
                text: "Jika sudah dihapus data tidak bisa di kembalikan.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location = "/delete/"+id+"";
                    swal("Data berhasil dihapus!", {
                      icon: "success",
                    });
                  } else {
                    swal("Data tidak jadi dihapus!");
                  }
                });
    });
  </script>

  <script>
    @if(Session::has('status'))
    toastr.success("{{ Session::get('status') }}")
    @endif
    
  </script>
</html>