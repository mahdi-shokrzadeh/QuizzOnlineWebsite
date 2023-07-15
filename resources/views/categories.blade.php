<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دسته بندی مسابقات</title>


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="css/categories.css">

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    
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
                <img src="images/logo50.png" alt="" id="logo">
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
                            <span>محمدمهدی شکرزاده</span>

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

    <div class="main-part">
        <div style="min-height: 150px; line-height: 0px;">
            
            <div style="min-height: 150px; line-height: 0px;" class="page-tap-bar">


                <div style="background-image: linear-gradient(white, #eff6fb); border-bottom: none; min-height: 100px; padding: 2em 0">
                    <div class="container text-center">
                        <br>
                        <div class="border-bottom">
                            <h2><i class="mr-2 fa fa-list-alt"></i>دسته بندی مسابقات</h2>
                        </div>
                        
                    </div>
                    <div style="width: 100%; position: absolute; bottom: -80px; padding: 15px;">
                        <div style="width: 100%; justify-content: center; display: flex;">
                            
                        </div>
                    </div>
                </div>

                <img class="hide-in-mobile" style="width: 100%;" src="https://static.quera.ir/college/images/theme/arc.0-2309348228a7.svg">
            </div>

            
        
        </div>
        <div class="items mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card text-center rounded">
                            <img class="card-img-top rounded" src="images/solo-mode.png" alt="card image cap">
                            <div class="card-body py-2">
                                <h4 class="card-title">بازی انفرادی</h4>
                                <p class="card-text">تو این بخش میتونی به صورت تک نفره به سوالات پاسخ بدی و امتیاز و سکه بگیری !</p>
                                <span class="text-muted"><i class="fa fa-fire mr-2" style="color: rgb(255, 115, 0);"></i>بیش از {{$count}} بازی انجام شده</span>
                            </div>
                            <a class="btn btn-outline-danger mx-auto mb-2" href="{{route('subjects' , ['mode' => 'solo_mode'] )}}" role="button">بزن بریم!</a>
                                    
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card text-center rounded">
                            <img class="card-img-top rounded" src="images/double-mode.png" alt="card image cap">
                            <div class="card-body py-2">
                                <h4 class="card-title">بازی با رقیب شانسی</h4>
                                <p class="card-text">با رقیب شانسی مسابقه بده و از شکست دادن شون لذت ببر !</p>
                                <span class="text-muted"><i class="fa fa-fire mr-2" style="color: rgb(255, 115, 0);"></i>1 بازی انجام شده</span>
                            </div>

                            <a class="btn btn-outline-danger mx-auto mb-2" href="#" role="button">بزن بریم!</a>
                                    
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card text-center rounded">
                            <img class="card-img-top rounded" src="images/team-mode.png" alt="card image cap">
                            <div class="card-body py-2">
                                <h4 class="card-title">بازی گروهی</h4>
                                <p class="card-text">با دوستات به صورت گروهی رقابت کن و لیگ تشکیل بده !</p>
                            </div>
                            <a class="btn btn-outline-danger disabled mx-auto mb-2" href="#" role="button">در دست بروزرسانی</a>
                                    
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


</body>
</html>