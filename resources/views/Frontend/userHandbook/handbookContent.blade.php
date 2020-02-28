@extends('Frontend.master')

@section('upper-header')
    {{ucfirst($hbContentTitle->handbookContentTitle)}}
@endsection

@section('button-header')
    <div class="dropdown-trig-sgn">
        <button class="btn triger-shake waves-effect" data-toggle="dropdown" aria-expanded="false">Content Title
        </button>
        <ul style="margin-left: 100px" class="dropdown-menu triger-shake-dp">
            @forelse($allContentTitle as $value)
                <li><a href="{{route('handbookContent',$value->id)}}">{{$value->handbookContentTitle}}</a></li>
            @empty

            @endforelse
        </ul>
    </div>
@endsection

@section('lower-header')
    You can edit and save...
@endsection

@section('icon-header')
    <i class="notika-icon notika-draft"></i>
@endsection

@section('my-header')
    <style>
        #saveMsg {
            display: none;
            color: #0f74a8;
        }
    </style>
@endsection

@section('content')


    @if(session('success'))
        <div id="successMsg" class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <code id="saveMsg">
        Please save your changes
    </code>
    <form method="post" action="{{route('handbookContent',$hbContentTitle->hbContentFromContentTitle->id)}}">
        {{csrf_field()}}
        <textarea name="handbook_content" id="myContent" cols="30" rows="10">
            {{
            str_replace('src="/kcfinder/upload/images/logoDefault2.png','src="'.url('/uploads/UserLogo/'.$userInfo->logo),
            str_replace('##no_of_sick_leave##',$userInfo->no_of_sickLeave,
            str_replace('##work_days##',$userInfo->workDays,
            str_replace('##work_time##',$userInfo->workTime,
            str_replace('##no_of_employee##',$userInfo->no_of_employee,
            str_replace('##company_name##',$userInfo->companyName,
            $hbContentTitle->hbContentFromContentTitle->handbook_content))))))
            }}
        </textarea>
        <br>
        <button class="btn btn-success" id="hbContent" type="submit">Save</button>
        <a href="{{route('handbookContentTitle',$hbContentTitle->hbFromContentTitle->id)}}"
           class="btn btn-primary">Back</a>
    </form>
@endsection


@section('my-footer')
    <script src="/vendor/unisharp/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('myContent', {
            filebrowserUploadUrl: '',
            filebrowserUploadMethod: 'form',
            height: 700,
            width: 1140
        });
    </script>

    <script>
        $(function () {
            setTimeout(function () {
                $('#successMsg').slideUp('fast');
            }, 1000);

            var e = CKEDITOR.instances['myContent']

            e.on('key', function (evt) {
                if (evt.keyCode === 13) {

                } else {
                    setTimeout(function () {
                        $('#saveMsg').slideDown('fast');
                    });

                }

            })

        })
    </script>
@endsection
