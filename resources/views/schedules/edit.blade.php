@extends('layouts.layout')


@section('content')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('schedules.index')}}">Agenda</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Ubah</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Ubah</h6>
        </nav>
        
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Ubah Agenda</h6>
            </div>
            <div class="card-body pt-0 pb-2 ">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form method="POST" action="{{ route('schedules.update', $schedule->id) }}">
                @csrf @method('PUT')
                <label>Tanggal</label>
                <div class="input-group mb-3">
                <input name="date" class="form-control" type="date" value="{{ \Carbon\Carbon::parse($schedule->date)->format('Y-m-d') }}" id="example-date-input">
                </div>

                <label>Jam</label>
                <div class="input-group mb-3">
                  <input name="time" class="form-control" type="time" value="{{ \Carbon\Carbon::parse($schedule->date)->format('H:i') }}" id="example-date-input">
                </div>
                
                <label>Agenda</label>
                <div class="input-group mb-3">
                  <input name="content" type="text" class="form-control" placeholder="Nama agenda" aria-label="Name" aria-describedby="name-addon" value="{{ $schedule->content }}">
                </div>

                <label>Tempat</label>
                <div class="input-group mb-3">
                  <input name="place" type="text" class="form-control" placeholder="Nama tempat" aria-label="Place" aria-describedby="email-addon" value="{{ $schedule->place }}">
                </div>

                <label>Dresscode</label>
                <div class="input-group mb-3">
                  <input name="dresscode" type="text" class="form-control" placeholder="Dresscode" aria-label="Dresscode" aria-describedby="email-addon" value="{{ $schedule->dresscode }}">
                </div>

                <label>Disposition</label>
                <div class="input-group mb-3">
                    <select name="disposition" id="role" class="form-control" required>
                      <option value="" selected disabled>Select disposition</option>
                      <option value="MENUNGGU DIKONFIRMASI" {{ $schedule->disposition == 'MENUNGGU DIKONFIRMASI' ? 'selected' : '' }}>Menunggu Dikonfirmasi</option>
                      <option value="AGENDAKAN" {{ $schedule->disposition == 'AGENDAKAN' ? 'selected' : '' }}>Agendakan</option>
                      <option value="DIWAKILI" {{ $schedule->disposition == 'DIWAKILI' ? 'selected' : '' }}>Diwakili</option>
                      <option value="DITUNDA" {{ $schedule->disposition == 'DITUNDA' ? 'selected' : '' }}>Ditunda</option>
                      <option value="DIBATALKAN" {{ $schedule->disposition == 'DIBATALKAN' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                </div>

                <label>Level Akses</label>
                <div class="input-group mb-3">
                    <select name="access_level" id="role" class="form-control" required>
                      <option value="" selected disabled>Pilih Level Akses</option>
                      <option value="PUBLIK" {{ $schedule->access_level == 'PUBLIK' ? 'selected' : '' }}>Publik</option>
                      <option value="RAHASIA" {{ $schedule->access_level == 'RAHASIA' ? 'selected' : '' }}>Rahasia</option>
                    </select>
                </div>

                <label>Pesserta</label>
                <div class="input-group mb-3">
                    <select name="audience" id="role" class="form-control" required>
                      <option value="" selected disabled>Pilih peserta</option>
                      <option value="INTERNAL" {{ $schedule->audience == 'INTERNAL' ? 'selected' : '' }}>Internal</option>
                      <option value="EKSTERNAL" {{ $schedule->audience == 'EKSTERNAL' ? 'selected' : '' }}>Eksternal</option>
                    </select>
                </div>

                <label>File</label>
                <div class="form-group mb-3">
                  <input name="file" class="form-control" type="file">
                  @if($schedule->file)
                      <span id="emailHelp" class="text-danger"><a class="text-danger text-sm" href="{{ asset('storage/' . $schedule->file) }}" target="_blank">Lihat file saat ini.</a></span>
                  @endif
                </div>
                <button type="submit" class="btn bg-gradient-primary mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with  <i class="fa fa-heart"></i>
                 
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  
@endsection