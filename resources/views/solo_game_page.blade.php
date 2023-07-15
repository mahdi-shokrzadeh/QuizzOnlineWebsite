<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/gamepage.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
     integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
    
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>



</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light py-0 mb-4">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="../images/logo50.png" alt="" id="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="نمایش فهرست"  >
                <Span class="navbar-toggler-icon"></Span>
            </button>
            <div class="collapse navbar-collapse" id="mainmenu">

                <ul class="navbar-nav right-side mr-auto " >
                    <li class="navbar-item active icon" >
                        <i class="fas fa-house-user"></i>
                        <a href="{{route('dashboard')}}" class="nav-link" href="index.html">خانه</a>
                    </li>
                    <li class="navbar-item icon ">
                        <i class="fas fa-trophy"></i>
                        <a href="{{route('categories')}}" class="nav-link" href="index.html">مسابقات</a>
                    </li>

                    <li class="navbar-item icon">
                        <i class="fas fa-medal"></i>
                        <a href="{{route('standings')}}" class="nav-link" href="index.html">نفرات برتر</a>
                    </li>

                    <li class="navbar-item ">
                        <a href="#" class="nav-link" href="index.html">ایجاد کوئیز</a>
                    </li>
                    
                    
                    <li class="navbar-item icon ">
                        <i class="fas fa-blog"></i>
                        <a href="#" class="nav-link" href="index.html">وبلاگ</a>
                    </li>

                </ul>

                <ul class="navbar-nav profile">
                    
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                            <i class="fas fa-user"></i>
                        </a>

                        <div class="dropdown-menu text-center">
                            <span>mahdi shokrzadeh</span>

                            <div class="dropdown-divider"></div>
                            
                            
                            <a href="profile.html" class="dropdown-item text-right icon text-center">
                                <i class="fa fa-user-circle-o"></i> پروفایل عمومی
                            </a>
                            
                            <a href="#" class="dropdown-item text-right icon text-center">
                                <i class="fa fa-cog"></i> تنظیمات
                            </a>

                            <a href="#" class="dropdown-item text-right icon text-center">
                                <i class="fa fa-sign-out-alt"></i> خروج
                            </a>

                        </div>

                    </li>

                </ul>
            
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="container">
            <div class="main-part">
                <div class="row">
                    <div class="col-lg-5 side-bar">
                        <div class="first-part border">
                            <div class="container">
                                <div class="row top-bar">
                                    
                                    <div class="col-6 d-flex justify-content-center text-center">
                                        <div class="users-profile">
                                            <img src="https://secure.gravatar.com/avatar/d54efb622ee21b88bf34bb09217bba4e.jpg?s=55&d=retro&r=g" alt="" class="rounded-circle">
                                            
                                            <a href="{{route('profile' , [ 'url' => $user->profile_url ] )}}" class="badge badge-primary badge-pill">{{$user->name}}</a>
                                            
                                            <div class="score">
                                                <span class="count badge">{{$score}}</span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-6 d-flex justify-content-center text-center">
                                        <div class="container mt-4 text_center ">

                                            <span class="badge badge-info mr-4 ml-4 mb-2">اطلاعات عمومی</span>

                                            <div class="result align-items-center justify-content-center d-flex mt-1">
                                                @foreach ($score_board as $s)
                                                    @if($s == 't')
                                                        <i class="fa fa-circle fa-2x" style="color: green;"></i>
                                                    @elseif($s == 'f')
                                                        <i class="fa fa-circle fa-2x" style="color: red;"></i>
                                                    @else 
                                                    <i class="fa fa-circle fa-2x" style="color: black;"></i>
                                                    @endif

                                                @endforeach
                                                
                                            </div>
                                            

                                        </div>
                                    </div>


                                </div>
                                <div class="second-part text-center mt-4 d-flex align-items-center justify-content-center border-top">
                                    <div class="control-buttons">

                                        <div class="mt-4">
                                            <a href="javascript:window.location.href=window.location.href+'/'+'progress' " class="btn btn-outline-success">ادامه ی بازی<i class="fa fa-arrow-left ml-2"></i></a>
                                        </div>

                                        
                                        <div class="mt-3 mb-3 text-center">
                                            <button class="btn btn-outline-danger" disabled="disabled">انصراف</button>
                                        </div>

                                        <div class="mt-3 mb-3 text-center">
                                            <a class="btn btn-outline-info" href="{{route('dashboard')}}" >بازگشت</a>
                                        </div>
                                    
                                    </div>  
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="row second-part">
                            <div class="col-12">
                                <ul class="nav nav-tabs" role="tablist">
        
                                    <li class="nav-item" role="tab">
                                        <a href="#tab1" class="nav-link" role="tab" data-toggle="tab">سوالات</a>
                                    </li>

                                    
                                </ul>
            
            
                                <div class="tab-content">


                                    <div role="tabpanel" class="tab-pane  p-1" id="tab1">
                                        
                                        @foreach ($questions as $q)
                                            
                                            <div id="question_part" class="border text-center mt-4" >
                                                <div id="question">
                                                    سوال : {{$q['question']}}
                                                </div>
                                                <div id="answer">
                                                    پاسخ : {{$q['correct_answer']}}
                                                </div>
                                            </div>
                                            
                                            

                                        @endforeach
                                        
                                    </div>
                                    
                                </div>
        
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>



    <footer class="bg-light text-center text-black mt-4">
        <div class="container p-4">
        <section class="mb-4">
            <a class="btn btn-outline-primary btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
            ></a>
    
            <a class="btn btn-outline-primary btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
            ></a>
    
            <a class="btn btn-outline-primary btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-telegram"></i
            ></a>
    
            <a class="btn btn-outline-primary btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
            ></a>

            <a class="btn btn-outline-primary btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
            ></a>

        </section>
    
        <section class="mt-2">
            <form action="">
            <!--Grid row-->
            <div class="row d-flex justify-content-center">
                <!--Grid column-->
                <div class="col-auto">
                <p class="pt-2">
                    <strong>عضویت در خبرنامه</strong>
                </p>
                </div>
    
                <div class="col-md-5 col-12">
                <!-- Email input -->
                <div class="form-outline form-white mb-4">
                    <input type="email" class="form-control" placeholder="آدرس ایمیل" />
                </div>
                </div>
                <!--Grid column-->
    
                <!--Grid column-->
                <div class="col-auto">
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-dark mb-4">
                    عضویت
                </button>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->
    
        <!-- Section: Text -->
        <section class="mb-4">
            <p class="text-justify text-center">
                سرگرمی به همراه یادگیری !
            </p>
        </section>

            <section class="">
                <!--Grid row-->
                <div class="row">
                <!--Grid column-->
                <div class="col-md-4  mb-4 mb-md-0">
                    <h5>دسترسی سریع</h5>
        
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{route('dashboard')}}" class="text-black">خانه</a>
                        </li>
                        <li>
                            <a href="{{route('categories')}}" class="text-black">مسابقات</a>
                        </li>
                        <li>
                            <a href="{{route('standings')}}" class="text-black">نفرات برتر</a>
                        </li>
                        <li>
                            <a href="" class="text-black disabled">ساخت کوئیز</a>
                        </li>
                        <li>
                            <a href="" class="text-black disabled">وبلاگ</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
        
        
                <!--Grid column-->
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>همراه شوید</h5>
        
                    <ul class="list-unstyled mb-0">
                    <li>
                        <a href="" class="text-black">درباره ما</a>
                    </li>
                    <li>
                        <a href="" class="text-black">ارتباط با ما</a>
                    </li>
                    <li>
                        <a href="" class="text-black">سوالات رایج</a>
                    </li>
                        <a href="" class="text-black">همکاری در تولید محتوا</a>
                    </ul>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>دسته بندی</h5>
        
                    <ul class="list-unstyled mb-0">
                    <li>
                        <a href="{{route('categories')}}" class="text-black">بازی انفرادی</a>
                    </li>
                    <li>
                        <a href="{{route('categories')}}" class="text-black">بازی با رقیب شانسی</a>
                    </li>
                    <li>
                        <a href="" class="text-black disabled">بازی گروهی</a>
                    </li>
                    
                    </ul>
                </div>
                
                </div>
            </section>
        </div>
  
    <!-- Copyright -->
        <div class="text-center p-3"  style="font-size: 14px;">
         All rights reserved 1399 -1400 © 
        </div>
    </footer>

    <script>

        $(document).ready(function () {
    
          $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
              Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                  $(this).text(Math.ceil(now))
                }
              });
          });
    
        });
        
    </script>
</body>
</html>