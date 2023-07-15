<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/header-footer.css">
    <link rel="stylesheet" href="../../css/question.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

</head>
<body>
    
<div class="container">

    <div id="main-part">
        <div class="main-part">
            <div class="question-part text-center">
                <span class="badge badge-danger">مذهبی</span>
                <div class="score row mt-2 mb-3">
                    <div class="col-5">
                        <span class="text-muted">4 : امتیاز شما</span>
                    </div>
                    <div class="col-3">
                    </div>
                    <div class="col-4">
                        <i class="fa fa-circle"></i>
                        <i class="fa fa-circle"></i>
                        <i class="fa fa-circle"></i>
                    </div>
                </div>
                <p>{{$question['question']}}</p>
            </div>
            <div class="text-center mt-4 mb-1 sent-by">
                <span>ارسالی از : mahdi2832</span>
            </div>
        </div>

        <div class="timer mt-3">
            <div class="row container">
                <div class="col-10">
                    <div class="progress mx-auto mb-2" >
                        <div class="progress-bar bg-success" role="progressbar" id="progressBar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        
                    </div>
                </div>
                <div class="col-2 text-center">
                    <span id="remaining-time" class="badge rounded-circle">35</span>
                </div>
            </div>
            
        </div>

        <div class="options mt-4 mb-4">
            <div class="row">
                <div class="col-6 option text-center">
                    <button class="btn btn-light" onclick="ClickButton(this)">
                    {{$question['first_ans']}}
                    </button>
                    
                </div>
                <div class="col-6 option text-center">
                    <button class="btn btn-light" onclick="ClickButton(this)">
                    {{$question['second_ans']}}
                    </button>
                </div>
                <div class="col-6 option text-center">
                    <button class="btn btn-light" onclick="ClickButton(this)">
                    {{$question['third_ans']}}
                    </button>
                </div>
                <div class="col-6 option text-center">
                    <button class="btn btn-light" onclick="ClickButton(this)">
                    {{$question['forth_ans']}}
                    </button>
                </div>
            </div>
        </div>

        <div class="row helpers mt-4">
            <div class="col-6 text-center">
            
                <button class="btn btn-info" onclick="Helper(1)">
                    درصد جواب های مردمی<i class="fa fa-percent ml-2"></i><br>
                    <span><i class="fa fa-coins mr-2"></i>60</span>
                </button>               

            </div>
            <div class="col-6 text-center">
                <button class="btn btn-info" onclick="Helper(1)">
                    حذف دو گزینه<i class="fa fa-bomb ml-2"></i><br>
                    <span><i class="fa fa-coins mr-2"></i>70</span>
                </button>
            </div>
            <div class="col-12 mt-3 text-center">
                <button class="btn btn-info" onclick="Helper(1)">
                    30 ثانیه زمان بیشتر<i class="fa fa-hourglass ml-2"></i><br>
                    <span><i class="fa fa-coins mr-2"></i>30</span>
                </button>
            </div>
        </div>
    </div>


</div>


</body>
</html>