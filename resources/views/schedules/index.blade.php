@extends('layouts.layout')


@section('content')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agenda</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Agenda</h6>
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
              @if (session('error') )
                  <div class="alert alert-danger">
                      <ul>
                        <strong>Error!</strong> {{ session('error') }}
                      </ul>
                  </div>
              @endif

              <div class="row justify-content-center align-items-center">
                <div class="col-auto">
                  <h6>Daftar Agenda</h6>
                </div>
                <div class="col-md-4 col-12 d-flex align-items-center mx-auto">
                  <select name="filter" id="filter" class="form-control d-inline-block ml-3">
                    <option value="" selected disabled>Pilih disposisi</option>
                    <option value="all">Semua</option>
                    <option value="MENUNGGU DIKONFIRMASI">Menunggu Dikonfirmasi</option>
                    <option value="AGENDAKAN">Agendakan</option>
                    <option value="DIWAKILI">Diwakili</option>
                    <option value="DITUNDA">Ditunda</option>
                    <option value="DIBATALKAN">Dibatalkan</option> 
                  </select>
                </div>
                <div class="col-md-6 col-12 text-end">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp" class="btn btn-success mb-0"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Agenda Baru</button>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              @if ($schedules->isEmpty())
                <div class="text-center">
                  <i class="ni ni-fat-remove ni-2x text-danger mb-1"></i>
                    <p class="text-sm text-secondary">Belum ada agenda.</p>
                </div>
              @else
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="table">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal & Waktu</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Agenda</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tempat & Dresscode</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Disposisi</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ubah Disposisi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level Akses & Peserta</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">File</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($schedules as $schedule)
                      <tr>
                        <td class="align-middle text-center">
                          <div class="d-flex flex-column justify-content-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($schedule->date)->format('H:i') }}</span>
                            <p class="text-xs text-secondary mb-0">{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</p>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-3 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm text-primary">{{ $schedule->content }}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-0 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $schedule->place }}</h6>
                              <p class="text-xs text-secondary mb-0">{{ $schedule->dresscode }}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          
                          <span class="text-xs font-weight-bold mb-0 disposition-text
                          @if ($schedule->disposition == 'MENUNGGU DIKONFIRMASI')
                            text-primary
                          @elseif ($schedule->disposition == 'AGENDAKAN')
                            text-success
                          @elseif ($schedule->disposition == 'DIWAKILI')
                            text-warning
                          @elseif ($schedule->disposition == 'DITUNDA' || $schedule->disposition == 'DIBATALKAN')
                            text-danger
                          @endif
                          ">{{ $schedule->disposition }}</span>
                          {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                        </td>
                        <td>
                          <a href="" class="btn btn-warning my-auto" title="Show Description" data-bs-toggle="modal" data-bs-target="#dispositionModal{{ $schedule->id }}">
                            <i class="ni ni-settings"></i>
                          </a>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm 
                          @if($schedule->access_level == 'PUBLIK')
                            bg-gradient-success
                          @elseif($schedule->access_level == 'RAHASIA')
                            bg-gradient-danger
                          @endif
                          ">{{ $schedule->access_level }}</span>
                          <span class="badge badge-sm bg-gradient-success">{{ $schedule->audience }}</span>
                        </td>

                      <td class="align-middle text-center my-auto">
                        {{-- Link-style show button --}}
                        @if($schedule->description)
                          <a href="" class="btn btn-primary my-auto" title="Show Description" data-bs-toggle="modal" data-bs-target="#descriptionModal{{ $schedule->id }}">
                            <i class="ni ni-zoom-split-in"></i>
                          </a>
                        @else
                          <span class="text-muted">-</span>
                        @endif
                      </td>

                      <td class="align-middle text-center my-auto">
                        {{-- Link-style download button --}}
                        @if($schedule->file)
                          <a href="{{ asset('storage/' . $schedule->file) }}" class="btn btn-primary my-auto" download title="Download File">
                            <i class="ni ni-single-copy-04"></i>
                          </a>
                        @else
                          <span class="text-muted">-</span>
                        @endif
                      </td>

                        <td class="align-middle">
                          <a href="{{ route('schedules.edit', $schedule) }}" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Ubah
                          </a>

                          <!-- Link-style delete using a tag -->
                          <a href="#" class="text-danger ms-3 font-weight-bold text-xs"
                              onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this schedule?')) { document.getElementById('delete-form{{$schedule->id}}').submit(); }">
                              Hapus
                          </a>

                          <form id="delete-form{{$schedule->id}}" action="{{ route('schedules.destroy', $schedule) }}" method="POST" style="display: none;">
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
                    <h5 class="font-weight-bolder text-primary text-gradient">Tambah Agenda Baru</h5>
                    <p class="mb-0">Masukkan keterangan agenda</p>
                </div>
                <div class="card-body pb-3">
                  <form action="{{ route('schedules.store') }}" method="POST" role="form text-left" enctype="multipart/form-data" lang="id">
                    @csrf

                    <label>Tanggal</label>
                    <div class="input-group mb-3">
                      <input name="date" class="form-control" type="date" value="" id="example-date-input" required>
                    </div>

                    <label>Jam</label>
                    <div class="input-group mb-3">
                      <input name="time" class="form-control" type="time" value="" id="example-date-input" required>
                    </div>
                    
                    <label>Agenda</label>
                    <div class="input-group mb-3">
                      <input name="content" type="text" class="form-control" placeholder="Nama agenda" aria-label="Name" aria-describedby="name-addon" required>
                    </div>

                    <label>Tempat</label>
                    <div class="input-group mb-3">
                      <input name="place" type="text" class="form-control" placeholder="Nama tempat" aria-label="Place" aria-describedby="email-addon" required>
                    </div>

                    <label>Dresscode</label>
                    <div class="input-group mb-3">
                      <input name="dresscode" type="text" class="form-control" placeholder="Dresscode" aria-label="Dresscode" aria-describedby="email-addon" required>
                    </div>

                    <label>Keterangan</label>
                    <div class="input-group mb-3">
                      <textarea name="description" class="form-control" placeholder="Keterangan" aria-label="Keterangan" aria-describedby="email-addon" required></textarea>
                    </div>

                    <label>Level Akses</label>
                    <div class="input-group mb-3">
                        <select name="access_level" id="role" class="form-control" required>
                          <option value="" selected disabled>Pilih Level Akses</option>
                          <option value="PUBLIK">Publik</option>
                          <option value="RAHASIA">Rahasia</option>
                        </select>
                    </div>

                    <label>Peserta</label>
                    <div class="input-group mb-3">
                        <select name="audience" id="role" class="form-control" required>
                          <option value="" selected disabled>Pilih peserta</option>
                          <option value="INTERNAL">Internal</option>
                          <option value="EKSTERNAL">Eksternal</option>
                        </select>
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
                      <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Tambah</button>
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
      @foreach($schedules as $schedule)
      <div class="modal fade" id="descriptionModal{{ $schedule->id }}" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel{{ $schedule->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="descriptionModalLabel{{ $schedule->id }}">{{ $schedule->content }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>{{ $schedule->description }}</p> 

            </div>
          </div>
        </div>
      </div>
      @endforeach

      {{-- MODAL DISPOSITION --}}
      @foreach($schedules as $schedule)
      <div class="modal fade" id="dispositionModal{{ $schedule->id }}" tabindex="-1" role="dialog" aria-labelledby="dispositionModalLabel{{ $schedule->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                    <h5 class="font-weight-bolder text-primary text-gradient">Ubah Disposisi</h5>
                    <p class="mb-0">Ubah disposisi agenda</p>
                </div>
                <div class="card-body pb-3">
                  <form method="POST" action="{{ route('schedules.updateDisposition', $schedule->id) }}"  lang="id">
                    @csrf @method('PUT')
                   
    
                    <label>Disposisi</label>
                    <div class="input-group mb-3">
                        <select name="disposition" id="role" class="form-control" required>
                          <option value="" selected disabled>Pilih disposisi</option>
                          <option value="MENUNGGU DIKONFIRMASI" {{ $schedule->disposition == 'MENUNGGU DIKONFIRMASI' ? 'selected' : '' }}>Menunggu Dikonfirmasi</option>
                          <option value="AGENDAKAN" {{ $schedule->disposition == 'AGENDAKAN' ? 'selected' : '' }}>Agendakan</option>
                          <option value="DIWAKILI" {{ $schedule->disposition == 'DIWAKILI' ? 'selected' : '' }}>Diwakili</option>
                          <option value="DITUNDA" {{ $schedule->disposition == 'DITUNDA' ? 'selected' : '' }}>Ditunda</option>
                          <option value="DIBATALKAN" {{ $schedule->disposition == 'DIBATALKAN' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
    
                    <button type="submit" class="btn bg-gradient-primary mt-3">Submit</button>
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
      const dispositionText = document.querySelectorAll('.disposition-text');

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

      // Filter table
      const filter = document.getElementById('filter');
      filter.addEventListener('change', function() {
        const value = filter.value;
        table.querySelectorAll('tbody tr').forEach(tr => {
          const dispositionCell = tr.querySelector('.disposition-text');
          if (!dispositionCell) return;
          const text = dispositionCell.textContent.trim();

          if (value === 'all') {
            tr.style.display = 'table-row';
          } else if (text === value) {
            tr.style.display = 'table-row';
          } else {
            tr.style.display = 'none';
          }
        });
      });
    });
</script>
@endsection