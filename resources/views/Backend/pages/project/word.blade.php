<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a class="word-export" href="javascript:void(0)">Export</a>
<div class="word-content">
    @foreach($data as $value)
        @if($value->getContent)
            <?php
            echo htmlspecialchars_decode($value->getContent->myProjectContent)
            ?>
            <br style="page-break-before: always">
        @endif
    @endforeach
    {{--<img src="{{url('/uploads/backgroundImage/books.jpg')}}" style="width: 300px;height: 300px" alt="">--}}
</div> {{--Inventore!</p>--}}

<script src="{{URL::to('/lib/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::to('/vendor/FileSaver.js-master/dist/FileSaver.js')}}"></script>
<script src="{{URL::to('/vendor/jQuery-Word-Export-master/jquery.wordexport.js')}}"></script>
<script>
    $(function () {
        $('.word-export').trigger('click');
        window.history.back();
    });
    $('.word-export').click(function (e) {
        $('.word-content').wordExport();
    })
</script>
</body>
</html>