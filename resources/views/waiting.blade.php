<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/header-footer.css">
    <link rel="stylesheet" href="../../css/wainting.css">


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
    <div class="rounded p-4">
        
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-10 col-lg-5">
                <div class="card text-center rounded">

                        <div class="card-body py-2">
                            
                        
                            <div class="row mb-3 d-flex justify-content-center mt-4">
                            
                                
                                <div class="col-6">
                                    <button class="btn btn-success">خوب بود <i class="fa fa-thumbs-up"></i></button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-danger">خوب نبود <i class="fa fa-thumbs-down"></i></button>
                                </div>
                                <div class="col-6 mt-3">
                                    <a  class="btn btn-info mr-auto" href="javascript:window.location.href=window.location.href+'/'+'next_question' ">
                                                بعدی
                                    </a> 
                                </div>
                            </div> 
                        </div>

                                                    
                </div>
            </div>
        </div>
            
    </div>
</div>

<script>


</script>

</body>


</html>