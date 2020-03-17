@extends('Frontend.master')
@section('icon-header')
    <i class="notika-icon notika-app"></i>
@endsection
@section('upper-header')
    Create your handbook
@endsection
@section('lower-header')
    Dashboard

@endsection
@section('button-header')
{{--    <a id="easyCreate"  href="{{route('builderList')}}" title="Easy Create from builder List" class="btn btn-primary">Easy Create</a>--}}
@endsection

@section('my-header')
    <style>
        .myBlock {
            background-color: #ecf0f1;
        }
        #easyCreate:hover{
            box-shadow: 0 0 15px #3498db;
        }
        .infoNumber {

            font-family: 'Monoton', cursive;
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Asset|Barrio|Monoton|Zilla+Slab+Highlight&display=swap"
          rel="stylesheet">
@endsection

@section('content')
    {{--    userList Updated msg--}}
    @if(session('userListUpdated_msg'))
        <div class="alert alert-success">
            {{session('userListUpdated_msg')}}
        </div>
    @endif

    {{--    <div style="padding: 20px">--}}
    {{--        <br>--}}
    {{--        <div>--}}
    {{--            <h1>HELLO {{ucfirst(Auth::guard('userList')->user()->username)}}!!</h1>--}}
    {{--        </div>--}}
    {{--        <br>--}}
    {{--        <div>--}}
    {{--            <p style="font-size: 18px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, commodi, cupiditate--}}
    {{--                delectus eligendi enim--}}
    {{--                ex, hic maxime nihil officiis quisquam quod ratione recusandae repellat sint sunt tempora totam velit--}}
    {{--                voluptatem?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores consequatur corporis--}}
    {{--                deleniti deserunt, earum et exercitationem facilis, iure minima molestiae nobis officia repellat--}}
    {{--                reprehenderit sed soluta? Ex ipsa obcaecati tempora.</p>--}}
    {{--            <hr>--}}
    {{--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur autem doloribus ducimus error et,--}}
    {{--                ipsa laudantium nisi quam quisquam quo reiciendis rem sed soluta? At impedit odit praesentium veritatis--}}
    {{--                vero.</p>--}}
    {{--            <Button class="btn btn-primary">Go to builder</Button>--}}
    {{--            <br><br><br><br>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="row">
        <div>
            <h1><i class="notika-icon notika-star"></i> How to:
            </h1>
        </div>
        <div class="col-md-12 offset-3">
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/tgbNymZ7vqY">
            </iframe>
        </div>

    </div>
    <br>

    <div style="background-color: white">
        <br><br><br>

        <div class="container">
            <div class="row">
                <h1 style="text-align: center">ABOUT US</h1><br><br>
                <div class="col-md-6" style="font-size: 16px">Talentmanagement.io is managed and owned by Talent
                    Connects Private Limited. A customized Employee Handbook and Contracts with most updated policies of
                    Government of Nepal in the Human Resource segment, prepared by an attorney in Nepal. This service
                    offers you both digital and printer-friendly access to the employee handbook and HR related
                    Contracts by eliminating the work to create employee manual from scratch. <br><br>
                    Customize your Employee Handbook, offer letter, Employment Contract, Promotion letter, termination
                    letter from the ease of your desktop or laptop with step-by-step interface, you will find it easy to
                    use. Pay onetime fee for your required document and update your HR documents as per your company
                    preference.
                </div>
                <div class="col-md-6">
                    <img src={{URL::to('/uploads/backgroundImage/handbook.jpeg')}} alt="">
                </div>
            </div>

            <br><br><br>
            <br><br>
        </div>
    </div>


    {{--        section3--}}
    <div>
        <br><br><br><br>

        <h1 style="text-align: center">Why Document Builder ? </h1><br><br>
        <p style="font-size: 20px">
            The Document Builder is a web-based system, you can revise, edit and customize your
            Employee Handbook, standard employment contract, offer letter, promotion letter,
            termination letter from any computer with a browser and internet facility. Once you
            finalize the document you can preview and download the document for your use.</p><br><h3>Advantages</h3><br>
        <div class="row">
            <div class="col-md-4">
                <div class="contact-inner"
                     style="height: 300px; margin-top: 10px; border-radius: 15px; box-shadow: 0 0 5px darkslategrey">
                    <div class="contact-hd widget-ctn-hd"><br>
                        <p></p>
                        <h2 style="text-align: center"><i style="color: cornflowerblue; font-size: 30px"
                                                          class="fa fa-compass"></i><br>
                            <br>Stay Compliant</h2><br>
                        <p >
                            Easy navigation and edit option with one-time company name and logo input.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-inner"
                     style="height: 300px; margin-top: 10px; border-radius: 15px; box-shadow: 0 0 5px darkslategrey">
                    <div class="contact-hd widget-ctn-hd"><br>
                        <p></p>
                        <h2 style="text-align: center"><i style="color: cornflowerblue; font-size: 30px"
                                                          class="fa fa-money-bill-alt"></i><br>
                            <br>Customizable and Affordable</h2><br>
                        <p>
                            Stay compliant with updated policies regularly updated and revised by lawyers directly in your handbook.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-inner"
                     style="height: 300px; margin-top: 10px; border-radius: 15px; box-shadow: 0 0 5px darkslategrey">
                    <div class="contact-hd widget-ctn-hd"><br>
                        <p></p>
                        <h2 style="text-align: center"><i style="color: cornflowerblue; font-size: 30px"
                                                          class="fa fa-user-circle"></i><br>
                            <br>Online Customer Support</h2><br>
                        <p>
                            Customer Support to help you address any issues during your HR document revision.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
    </div>



    <div style="background-color: white; padding: 20px">

        <br><br>
        <h1 style="text-align: center">Easy way to create your Handbook</h1><br><br>
        <p style="font-size: 16px">Get an updated, high-quality employee handbook for your company.
        </p><br><br>

        <div class="row">
            <div class="col-md-3" style="text-align: center">
                <span class="infoNumber" style="font-size: 100px;color: cornflowerblue;">1</span><br>
                <h1>Customized
                    Handbook</h1>
                <p style="font-size: 16px" class="text-justify">Create a customized employee handbook for your company.
                    A good handbook should reflect your company
                    culture. Your policies should be clear and easy to understand. Having a solid employee handbooks is
                    important.</p><br>

            </div>
            <div class="col-md-3" style="text-align: center">
                <span class="infoNumber" style="font-size: 100px;color: cornflowerblue;">2</span><br>
                <h1>Company
                    Information</h1>
                <p style="font-size: 16px" class="text-justify">One size does not fit all. By providing answers to
                    company-specific questions you ensure that your
                    handbook is applicable to the work you're doing. You can always go back and edit your choices as
                    your policies change over time.</p><br>

            </div>
            <div class="col-md-3" style="text-align: center">
                <span class="infoNumber" style="font-size: 100px;color: cornflowerblue;">3</span><br>
                <h1>Assemble
                    Handbook</h1>
                <p style="font-size: 16px " class="text-justify">Your handbook is assembled when all of your company
                    data has been gathered. It takes only a few
                    minutes to create an updated handbook with clear expectations and guidelines for your team.
                    asdfadsfasdf asdf</p><br>

            </div>
            <div class="col-md-3" style="text-align: center">
                <span class="infoNumber" style="font-size: 100px;color: cornflowerblue;">4</span><br>
                <h1>Download
                    Document</h1>
                <p style="font-size: 16px" class="text-justify">Download your handbook as a Microsoft Word Document. You
                    should review your handbook with your
                    trusted advisiors and make any changes you deem necessary. If you need assistance, we're here to
                    help!</p><br>

            </div>
        </div>
    </div>

    <br>


@endsection
@section('my-footer')
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
