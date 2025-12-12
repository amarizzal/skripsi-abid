<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('img/logo.png')}}">
  <title>
    E-Schedule
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
        E-Schedule Kabupaten Malang
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <div class="mx-auto ps-lg-5 ps-xl-5 ps-md-4 ps-0">
          <ul class="navbar-nav flex-row justify-content-center align-items-center">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('landingPage')}}">
                <i class="fa fa-chart-pie opacity-6 me-1"></i>
                Agenda
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-2" href="{{ route('login')}}">
                <i class="fas fa-key opacity-6 me-1"></i>
                Sign In
              </a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav ms-auto d-lg-block d-none">
          <li class="nav-item">
            <a href="{{ route('login') }}" class="btn btn-sm mb-0 me-1 btn-primary bg-gradient-light">Sign in</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('{{asset('img/bg-primary.jpg')}}'); background-position: bottom;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">E-Schedule</h1>
            <p class="text-lead text-white">Gunakan halaman ini untuk melihat agenda Pemerintah Kabupaten Malang</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="row mt-4">
          <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card ">
              <div class="card-header pb-0 p-3">
                {{-- search --}}
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Cari agenda..." onkeyup="searchTable()">
                  </div>
                  <script>
                    function searchTable() {
                      var input, filter, table, tr, td, i, txtValue;
                      input = document.getElementById("searchInput");
                      filter = input.value.toUpperCase();
                      table = document.querySelector(".table");
                      tr = table.getElementsByTagName("tr");
                      for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td");
                        let rowContainsFilter = false;
                        for (let j = 0; j < td.length; j++) {
                          if (td[j]) {
                            txtValue = td[j].textContent || td[j].innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                              rowContainsFilter = true;
                              break;
                            }
                          }
                        }
                        if (rowContainsFilter) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";
                        }
                      }
                    }
                  </script>
              </div>
              <div class="card-header pb-0 p-3">
                  <div class="d-flex justify-content-between">
                    <h6 class="mb-2">Hari ini</h6>
                    <p class="text-sm"><span class="text-danger">{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}</span></p>
                  </div>
              </div>
              @if ($schedules->isEmpty())
                <div class="text-center">
                  <i class="ni ni-fat-remove ni-2x text-danger mb-1"></i>
                  <p class="text-sm text-secondary">Belum ada agenda untuk hari ini.</p>
                </div>
              @else
                <div class="table-responsive">
                  <table class="table align-items-center ">
                    <tbody>
                      @foreach ($schedules as $schedule)
                      <tr>
                        <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Time:</p>
                            <h6 class="text-sm text-danger mb-0">{{ \Carbon\Carbon::parse($schedule->date)->format('H:i') }}</h6>
                          </div>
                        </td>
                        <td class="w-30">
                          <div class="d-flex align-items-center">
                            <div class="ms-4">
                              <p class="text-xs font-weight-bold mb-0">Agenda:</p>
                              <h6 class=" mb-0 text-primary">{{ $schedule->content }}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Dresscode:</p>
                            <h6 class="text-sm mb-0">{{ $schedule->dresscode }}</h6>
                          </div>
                        </td>
                        <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Place:</p>
                            <h6 class="text-sm mb-0">{{ $schedule->place }}</h6>
                          </div>
                        </td>
                        <td class="align-middle text-sm">
                          <div class="col text-center">
                            <p class="text-xs font-weight-bold mb-0">Audience:</p>
                            <h6 class="text-sm mb-0">{{ $schedule->audience }}</h6>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
                
              @endif

                <hr class="horizontal my-3" style="border-top: 2px solid #3e57e4;">
              <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                  <h6 class="mb-2">Satu bulan kedepan</h6>
                </div>
              </div>
              @if ($schedulesNextMonth->isEmpty())
                <div class="text-center">
                  <i class="ni ni-fat-remove ni-2x text-danger mb-1"></i>
                  <p class="text-sm text-secondary">Belum ada agenda untuk satu bulan kedepan.</p>
                </div>
              @else
                <div class="table-responsive">
                  <table class="table align-items-start ">
                    <tbody>
                      <tr>
                        <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Waktu:</p>
                          </div>
                        </td>
                        <td class="w-30">
                          <div class="d-flex align-items-center">
                            <div class="ms-4">
                              <p class="text-xs font-weight-bold mb-0">Agenda:</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Dresscode:</p>
                          </div>
                        </td>
                        <td>
                          <div class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Tempat:</p>
                          </div>
                        </td>
                        <td class="align-middle text-sm">
                          <div class="col text-center">
                            <p class="text-xs font-weight-bold mb-0">Peserta:</p>
                          </div>
                        </td>
                      </tr>
                      @foreach ($schedulesNextMonth as $schedule)
                      <tr>
                        <td>
                          <div class="text-center">
                            <h6 class="text-sm text-danger mb-0">{{ \Carbon\Carbon::parse($schedule->date)->format('H:i') }}  {{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</h6>
                            <h6 class="text-sm text-danger mb-0"></h6>
                          </div>
                        </td>
                        <td class="w-30">
                          <div class="d-flex align-items-center">
                            <div class="ms-4">
                              <h6 class=" mb-0 text-primary">{{ $schedule->content }}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="text-center">
                            <h6 class="text-sm mb-0">{{ $schedule->dresscode }}</h6>
                          </div>
                        </td>
                        <td>
                          <div class="text-center">
                            <h6 class="text-sm mb-0">{{ $schedule->place }}</h6>
                          </div>
                        </td>
                        <td class="align-middle text-sm">
                          <div class="col text-center">
                            <h6 class="text-sm mb-0">{{ $schedule->audience }}</h6>
                          </div>
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
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer mt-3 py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          {{-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Agenda
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Sign in
          </a> --}}
          <h6 class="mb-2">Kontak</h6>

          @foreach ($contacts as $contact)
          <div class="text-center">
            <a href="tel:{{ $contact->phone }}" class="text-secondary mx-auto mb-sm-0 mb-2">
              <i class="fas fa-phone"></i>{{ $contact->name }}: {{ $contact->phone }}
            </a>

          </div>
          @endforeach

        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-3">
          <div class="mt-3">
            <img src="{{ asset('img/logo.png') }}" alt="Logo 1" style="height:40px; margin-right:10px;">
            <img src="{{ asset('img/logo2.png') }}" alt="Logo 2" style="height:40px;">
          </div>
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> 
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>