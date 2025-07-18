@extends('layouts.layout')


@section('content')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Notulen</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Notulen</h6>
        </nav>
        
      </div>
    </nav>
    <!-- End Navbar -->


    <div class="container-fluid py-4">
      {{-- SCHEDULE --}}
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-2">
              
              @if(session('success'))
                <div class="alert alert-success text-white" role="alert">
                  <strong>Success!</strong> {{ session('success') }}
                </div>
              @endif
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                  <h6>Daftar Notulen</h6>
                </div>
                
                <div class="col-md-6 col-12 text-end">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp" class="btn btn-success mb-0"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Notulen Baru</button>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              @if ($notulens->isEmpty())
                <div class="text-center">
                  <i class="ni ni-fat-remove ni-2x text-danger mb-1"></i>
                    <p class="text-sm text-secondary">Belum ada notulen.</p>
                </div>
              @else
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="table">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Dibuat</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Agenda, Waktu, Tempat</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konten</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Download PDF</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($notulens as $notulen)
                      <tr>
                        <td class="align-middle text-center">
                          <div class="d-flex flex-column justify-content-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($notulen->date)->format('H:i') }}</span>
                            <p class="text-xs text-secondary mb-0">{{ \Carbon\Carbon::parse($notulen->date)->format('d/m/Y') }}</p>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-3 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm text-primary">{{ $notulen->schedule->content }} - {{ \Carbon\Carbon::parse($notulen->schedule->date)->format('d/m/Y H:i') }} - {{ $notulen->schedule->place }}</h6>
                            </div>
                          </div>
                        

                      <td class="align-middle text-center my-auto">
                        {{-- Link-style show button --}}
                        @if($notulen->content)
                          <a href="" class="btn btn-primary my-auto" title="Show Description" data-bs-toggle="modal" data-bs-target="#descriptionModal{{ $notulen->id }}">
                            <i class="ni ni-zoom-split-in"></i>
                          </a>
                        @else
                          <span class="text-muted">-</span>
                        @endif
                      </td>

                      <td class="align-middle text-center my-auto">
                        {{-- Link-style download button --}}
                        @if($notulen->file)
                          <a href="{{ route('notulens.downloadPDF', $notulen) }}" class="btn btn-primary my-auto" title="Download File">
                            <i class="ni ni-single-copy-04"></i>
                          </a>
                        @else
                          <span class="text-muted">-</span>
                        @endif
                      </td>

                        <td class="align-middle">

                          <!-- Link-style delete using a tag -->
                          <a href="#" class="text-danger ms-3 font-weight-bold text-xs"
                              onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this notulen?')) { document.getElementById('delete-form{{$notulen->id}}').submit(); }">
                              Hapus
                          </a>

                          <form id="delete-form{{$notulen->id}}" action="{{ route('notulens.destroy', $notulen) }}" method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      {{-- FOOTER --}}
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
                 
              </div>
            </div>
            
          </div>
        </div>
      </footer>

      {{-- MODAL ADD --}}
      <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                    <h5 class="font-weight-bolder text-primary text-gradient">Tambah Notulen Baru</h5>
                    <p class="mb-0">Masukkan notulen</p>
                </div>
                <div class="card-body pb-3">
                  <form action="{{ route('notulens.store') }}" method="POST" role="form text-left" enctype="multipart/form-data">
                    @csrf
                    
                    <label>Agenda</label>
                    <div class="input-group mb-3">
                      <select name="schedule_id" id="schedule_id" class="form-control" required>
                        <option value="" selected disabled>Pilih agenda hari ini</option>
                        @foreach($schedules as $schedule)
                          <option value="{{ $schedule->id }}">{{ $schedule->content }} - {{ \Carbon\Carbon::parse($schedule->date)->format('H:i') }}</option>
                        @endforeach
                      </select>
                    </div>

                    <label>Notulen</label>
                    <div class="input-group mb-3">
                      <textarea name="content" class="form-control" placeholder="Notulen" aria-label="Notulen" aria-describedby="email-addon" required></textarea>
                    </div>


                    <label>File</label>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
                      <label class="custom-control-label" for="customRadio1">Dengan File</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
                      <label class="custom-control-label" for="customRadio2">Tanpa File</label>
                    </div>
                    
                    <div class="input-group mb-3" id="fileInputGroup">
                      <input name="file" class="form-control" type="file" id="fileInput">
                    </div>
                    
                    <div class="text-center mb-3">
                      @if($schedules->count() > 0)
                        <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Tambah</button>
                      @else
                        <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0" disabled>Tambah</button>
                        <p class="text-muted">Tidak ada agenda hari ini</p>
                      @endif
                    </div>
                  </form>
                </div>
                {{-- <div class="card-footer text-center pt-0 px-sm-4 px-1">
                  <p class="mb-4 mx-auto">
                    Already have an account?
                    <a href="javascrpt:;" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- MODAL DESCRIPTION --}}
      @foreach($notulens as $notulen)
      <div class="modal fade" id="descriptionModal{{ $notulen->id }}" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel{{ $notulen->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="descriptionModalLabel{{ $notulen->id }}">Notulen: {{ $notulen->schedule->content }} - {{ \Carbon\Carbon::parse($notulen->schedule->date)->format('H:i') }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>{{ $notulen->content }}</p> 

            </div>
          </div>
        </div>
      </div>
      @endforeach
  </main>
  
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
      const radioWithFile = document.getElementById('customRadio1');
      const radioWithoutFile = document.getElementById('customRadio2');
      const fileInputGroup = document.getElementById('fileInputGroup');
      const fileInput = document.getElementById('fileInput');
      const table = document.getElementById('table');

      // Function to toggle file input visibility
      function toggleFileInput() {
        if (radioWithFile.checked) {
          fileInputGroup.style.display = 'flex';
          fileInput.required = true;
        } else {
          fileInputGroup.style.display = 'none';
          fileInput.required = false;
        }
      }

      // Initial check on page load
      toggleFileInput();

      // Add event listeners
      radioWithFile.addEventListener('change', toggleFileInput);
      radioWithoutFile.addEventListener('change', toggleFileInput);

    });
</script>
@endsection