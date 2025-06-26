@extends('layouts.layout')


@section('content')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Kontak</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Kontak</h6>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              @if(session('success'))
                <div class="alert alert-success text-white" role="alert">
                  <strong>Success!</strong> {{ session('success') }}
                </div>
              @endif
              <div class="row justify-content-center align-items-center">
                <div class="col-6">
                  <h6>Daftar Kontak</h6>
                  
                </div>
                <div class="col-6 text-end">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp" class="btn btn-success mb-0"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Kontak Baru</button>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              @if ($contacts->isEmpty())
                <div class="text-center">
                  <i class="ni ni-fat-remove ni-2x text-danger mb-1"></i>
                    <p class="text-sm text-secondary">Belum ada kontak.</p>
                </div>
              @else
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. Handphone</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dibuat Pada</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($contacts as $contact)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              {{-- <div>
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                              </div> --}}
                              <div class="d-flex flex-column justify-content-center ms-2">
                                <h6 class="mb-0 text-sm">{{ $contact->name }}</h6>
                                {{-- <p class="text-xs text-secondary mb-0"></p> --}}
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $contact->phone }}</p>
                          </td>
                          {{-- <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">Online</span>
                          </td> --}}
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $contact->created_at }}</span>
                          </td>
                          <td class="align-middle">
                            <a href="{{ route('contact.edit', $contact->id) }}" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              Ubah
                            </a>

                            <!-- Link-style delete using a tag -->
                            <a href="#" class="text-danger ms-3 font-weight-bold text-xs"
                                onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this user?')) { document.getElementById('delete-form{{$contact->id}}').submit(); }">
                                Hapus
                            </a>

                            <form id="delete-form{{$contact->id}}" action="{{ route('contact.destroy', $contact) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                          </td>
                        </tr>
                      @endforeach
                      {{-- <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user2">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Alexa Liras</h6>
                              <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Programator</p>
                          <p class="text-xs text-secondary mb-0">Developer</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">11/01/19</span>
                        </td>
                        <td class="align-middle">
                          <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Laurent Perrier</h6>
                              <p class="text-xs text-secondary mb-0">laurent@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Executive</p>
                          <p class="text-xs text-secondary mb-0">Projects</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">Online</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">19/09/17</span>
                        </td>
                        <td class="align-middle">
                          <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user4">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Michael Levi</h6>
                              <p class="text-xs text-secondary mb-0">michael@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Programator</p>
                          <p class="text-xs text-secondary mb-0">Developer</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">Online</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">24/12/08</span>
                        </td>
                        <td class="align-middle">
                          <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user5">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Richard Gran</h6>
                              <p class="text-xs text-secondary mb-0">richard@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Manager</p>
                          <p class="text-xs text-secondary mb-0">Executive</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">04/10/21</span>
                        </td>
                        <td class="align-middle">
                          <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user6">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Miriam Eric</h6>
                              <p class="text-xs text-secondary mb-0">miriam@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Programtor</p>
                          <p class="text-xs text-secondary mb-0">Developer</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">14/09/20</span>
                        </td>
                        <td class="align-middle">
                          <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                      </tr> --}}
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      {{-- Modal --}}
      <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                    <h5 class="font-weight-bolder text-primary text-gradient">Tambah Kontak Baru</h5>
                    <p class="mb-0">Masukkan informasi kontak</p>
                </div>
                <div class="card-body pb-3">
                  <form action="{{ route('contact.store') }}" method="POST" role="form text-left" enctype="multipart/form-data">
                    @csrf

                    <label>Nama</label>
                    <div class="input-group mb-3">
                      <input required type="text" name="name" class="form-control" placeholder="Nama" aria-label="Name" aria-describedby="email-addon">
                    </div>

                    <label>No. Handphone</label>
                    <div class="input-group mb-3">
                      <input name="phone" type="text" class="form-control" placeholder="No. Handphone" aria-label="Phone" aria-describedby="email-addon">
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

      {{-- FOOTER --}}
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