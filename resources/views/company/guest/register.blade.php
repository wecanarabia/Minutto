
<!DOCTYPE html>
<html @if (app()->getLocale()==='ar') lang="en" dir="rtl" @else lang="ar" dir="ltr" @endif>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/rtl/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Jun 2023 11:40:42 GMT -->
<head>
    <!-- Title -->
    <title>Sign-up Minutto</title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="لوحة الإدارة الخاصة بقسم ادارة الموارد البشرية للشركات التي تستخدم نظام مينيتو لإدارة الموارد البشرية "/>
    <meta name="author" content="مينيتو - minutto" />
    <meta name="keywords" content="لوحة ، الادارة ، قسم ، الموارد ، البشرية ، مينيتو ، برنامج ، ادارة، الموظفين، البصمة، الحضور، الغياب" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('dist/images/logos/favicon.png')}}" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <!-- Core Css -->
    <link rel="stylesheet" href="{{asset('dist/css/style.min.css')}}" />
  </head>
  <body>
    <!-- Preloader -->
    <div class="preloader">
      <img src="{{asset('dist/images/logos/favicon.png')}}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
          <div class="row">
            <div class="col-xl-7 col-xxl-8">

              <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                <img src="{{asset('dist/images/logos/company-login.png')}}" alt="" class="img-fluid" width="500">
              </div>
            </div>
            <div class="col-xl-5 col-xxl-4">
              <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                <div class="col-sm-8 col-md-6 col-xl-9">
                    <a href="#" class="text-nowrap logo-img d-block w-100 px-5">
                        @if (app()->getLocale()==='ar')
                        <img src="{{asset('dist/images/logos/logo.svg')}}" width="200" alt="">
                        @else
                        <img src="{{asset('dist/images/logos/logo-en.svg')}}" width="200" alt="">
                        @endif
                      </a>

                  <div class="position-relative text-center my-4">
                    <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">sign up</p>
                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                  </div>
                  @if (Session::has('error'))
                  <div class="toast show mb-2 align-items-center text-bg-info border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                      <div class="toast-body">
                        {{ Session::get('error') }}
                      </div>
                      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                  </div>
                  @endif
                  <form method="post" action="{{ route("front.register") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old("name") }}" class="form-control">
                        @error('name')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                          @enderror
                      </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" value="{{ old("email") }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('email')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Phone</label>
                      <input type="tel" name="phone" class="form-control" value="{{ old("phone") }}">
                      @error('phone')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                      <label class="form-label">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                          @error('image')
                          <div class="text-danger">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                    <input type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2" value="Sign Up">
                    <div class="d-flex align-items-center justify-content-center">
                      <p class="fs-4 mb-0 fw-medium">Already have an account?</p>
                      <a class="text-primary fw-medium ms-2" href="{{ route('front.login-page') }}">Sign In</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Import Js Files -->
    <script src="{{asset('dist/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('dist/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- core files -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <script src="{{asset('dist/js/app.init.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>

    <script src="{{asset('dist/js/custom.js')}}"></script>
    <!-- current page js files -->
    <script src="{{asset('dist/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
  </body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/rtl/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Jun 2023 11:40:42 GMT -->
</html>
