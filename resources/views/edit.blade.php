<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD</title>
  </head>
  <body>
      <br><br>
      <h1 class="text-center" mb-4>Edit Data Pegawai</h1>
      <div class="container">
        <div class="row justify-content-center mt-5">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="text" value="{{ $data->nama }}">
                  </div>
                  <div class="mb-3">
                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                      <option selected>{{ $data->jeniskelamin}}</option>
                      <option value="cowo">Laki Laki</option>
                      <option value="cewe">Perempuan</option>
                      
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="nomorhp" class="form-label">Nomor Telepon</label>
                    <input type="number" name="nomorhp" class="form-control" id="nomorhp" aria-describedby="text" value="{{ $data->nomorhp }}">
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div> 
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>