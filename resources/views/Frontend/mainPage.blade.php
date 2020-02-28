@extends('Frontend.master')
@section('my-header')
    <style>
        .zxcv li {
            padding: 10px;

        }

        body {
            /*font-family: 'Advent Pro', sans-serif;*/
            font-family: 'Roboto', sans-serif;

        }

        .infoNumber {

            font-family: 'Monoton', cursive;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asset|Barrio|Monoton|Zilla+Slab+Highlight&display=swap"
          rel="stylesheet">
@endsection
@section('before-content')
    <br>
    {{--    section1--}}
    <div class="container" style="width: 100%;max-width: 1920px;padding: 0;margin-top: -20px">
        <div
            style="background-image: url('/uploads/backgroundImage/laptopBackground.jpg');background-repeat: no-repeat;background-size: 100% 100%; ">
            <div class="container">
                <div
                    style="margin-top: 20%;margin-bottom: 30%;font-family: 'ABeeZee', sans-serif;color: white;text-shadow: 0px 0px 10px red ;width: 60%">
                    <h1 style="font-size: 50px">
                        Document Builder
                    </h1>
                    <div style="font-size: 20px">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur debitis
                            distinctio
                            esse est et fuga libero minus molestiae nemo nesciunt numquam optio quaerat quam quas
                            reiciendis,
                            velit. Aliquid, veritatis!
                        </p>
                    </div>
                    <br><br>
                    <br><br>
                </div>
            </div>


        </div>
    </div>
    {{--    section2--}}
    <div style="background-color: white">
        <br><br><br><br>

        <div class="container">
            <div class="row">
                <h1 style="text-align: center">ABOUT US</h1><br><br>
                <div class="col-md-6" style="font-size: 18px">Talentmanagement.io is managed and owned by Talent
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

        {{--        section3--}}
        <div style="background-color: #c2dcff">
            <br><br><br><br>

            <div class="container">
                <h1 style="text-align: center">Why Document Builder ? </h1><br><br>
                <p style="font-size: 20px">Preparing Employee Handbook, Employment Contracts and other HR document can
                    be a little overwhelming, specially when there is no legal help to proof read the policies. With
                    Document Builder, you can prepare all these documents that are prepared by the registered lawyer
                    of Nepal who specializes in Labor policies. You will save, time, money and access to the most
                    updated policies to slide your way into professional Human Resource Management</p><br><br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-inner"
                             style="height: 320px;  border-radius: 15px; box-shadow: 0 0 5px darkslategrey">
                            <div class="contact-hd widget-ctn-hd"><br>
                                <p></p>
                                <h2 style="text-align: center"><i style="color: cornflowerblue; font-size: 30px"
                                                                  class="fa fa-user-circle"></i><br>
                                    <br>What to expect?</h2><br>
                                <p>
                                    The Document Builder is a web-based system, you can revise, edit and customize your
                                    Employee Handbook, standard employment contract, offer letter, promotion letter,
                                    termination letter from any computer with a browser and internet facility. Once you
                                    finalize the document you can preview and download the document for your use.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-inner"
                             style="height: 320px;  border-radius: 15px; box-shadow: 0 0 5px darkslategrey">
                            <div class="contact-hd widget-ctn-hd"><br>
                                <p></p>
                                <h2 style="text-align: center"><i style="color: cornflowerblue; font-size: 30px"
                                                                  class="fa fa-user-circle"></i><br>
                                    <br>Advantages</h2><br>
                                <p>
                                    - Easy navigation and edit option with one-time company name and logo input. <br>
                                    - Stay compliant with updated policies regularly updated and revised by lawyers
                                    directly in your handbook. <br>
                                    - Customer Support to help you address any issues during your HR document revision.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-inner"
                             style="height: 320px;  border-radius: 15px; box-shadow: 0 0 5px darkslategrey">
                            <div class="contact-hd widget-ctn-hd"><br>
                                <p></p>
                                <h2 style="text-align: center"><i style="color: cornflowerblue; font-size: 30px"
                                                                  class="fa fa-user-circle"></i><br>
                                    <br>Heading</h2><br>
                                <p>
                                    Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero
                                    Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero
                                    Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
            </div>
        </div>


    </div>
    {{--        section4--}}
    {{--jumbotron--}}
    <div style="background-color: white">
        <br><br>

        <div class="container">
            <br><br>
            <h1 style="text-align: center">Easy way to create your Handbook</h1><br><br>
            <p style="font-size: 16px;text-align: center">Get an updated, high-quality employee handbook for your company.
                </p><br><br>

            <div class="row">
                <div class="col-md-6" style="text-align: center">
                    <span class="infoNumber" style="font-size: 100px;color: cornflowerblue;">1</span><br>
                    <h1>Customized
                        Handbook</h1>
                    <p style="font-size: 16px" class="text-justify">Create a customized employee handbook for your company.
                        A good handbook should reflect your company
                        culture. Your policies should be clear and easy to understand. Having a solid employee handbooks is
                        important.</p><br>

                </div>
                <div class="col-md-6" style="text-align: center">
                    <span class="infoNumber" style="font-size: 100px;color: cornflowerblue;">2</span><br>
                    <h1>Company
                        Information</h1>
                    <p style="font-size: 16px" class="text-justify">One size does not fit all. By providing answers to
                        company-specific questions you ensure that your
                        handbook is applicable to the work you're doing. You can always go back and edit your choices as
                        your policies change over time.</p><br>

                </div>
                <div class="col-md-6" style="text-align: center">
                    <span class="infoNumber" style="font-size: 100px;color: cornflowerblue;">3</span><br>
                    <h1>Assemble
                        Handbook</h1>
                    <p style="font-size: 16px " class="text-justify">Your handbook is assembled when all of your company
                        data has been gathered. It takes only a few
                        minutes to create an updated handbook with clear expectations and guidelines for your team.
                        asdfadsfasdf asdf</p><br>

                </div>
                <div class="col-md-6" style="text-align: center">
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
    </div>

    {{--    section5--}}
    <div style="background-color:#c2dcff">
        <div class="container">
            <div>

                <br><br><br><br>
                <h1 style="text-align: center">Contact Us:</h1>
                <br>
                <p style="font-size: 20px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet
                    animi commodi, error
                    explicabo fuga in laborum minima modi nobis obcaecati perferendis possimus repellat sit ullam unde
                    vero! Odio!</p>
                <br><br><br>
                <div class="row">

                    <div class="col-md-8" style="font-size: 15px">
                        <div class="row">
                            <div class="col-md-7">
                                <h3><img src="{{URL::to('uploads/logo/logo5.png')}}" style="width: 30px;height: 30px"
                                         alt=""> Talent Connects</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam assumenda at cumque
                                distinctio dolores eos fugit labore, nostrum odit porro quisquam repellat saepe ut
                                veniam. Error placeat unde vero.
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-2"><i style="font-size: 35px" class="fa fa-map-pin"> </i></div>
                                    <div class="col-md-10"> Arun Thapa Chowk, Jhamsikhel, Nepal<br><br></div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"><i style="font-size: 35px" class="fa fa-envelope"> </i></div>
                                    <div class="col-md-10"> info@talentconnects.com.np<br><br><br></div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"><i style="font-size: 35px" class="fa fa-phone"> </i></div>
                                    <div class="col-md-10">+989898998 <br><br></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="alert alert-success contactMsg" style="display: none">
                            <p>Message Sent</p>
                        </div>
                        <div class="alert alert-danger contactMsgFailed" style="display: none">
                            <p>Message Sent Failed</p>
                        </div>
                        <div class="alert alert-danger contactIncomplete" style="display: none">
                            <p>Incomplete Form</p>
                        </div>
                        <form id="contactForm">
                            <div class="form-group">
                                {{--                                <label for="">Full Name:</label>--}}
                                <input type="text" name="contactName" placeholder="Full Name" id="contactName"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                {{--                                <label for="">Email:</label>--}}
                                <input type="email" name="contactEmail" placeholder="Email" id="contactEmail"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                {{--                                <label for="">Subject:</label>--}}
                                <input type="text" name="contactSubject" placeholder="Subject" id="contactSubject"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                {{--                                <label for="">Message:</label>--}}
                                <textarea name="contactMessage" class="form-control" placeholder="Message"
                                          id="contactMessage" cols="20"
                                          rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="button" id="sendContact">Send</button>
                            </div>
                        </form>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('my-footer')
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        $(function () {
            $('#sendContact').on('click', function () {
                var contactName = $('#contactName').val();
                var contactEmail = $('#contactEmail').val();
                var contactSubject = $('#contactSubject').val();
                var contactMessage = $('#contactMessage').val();
                if (contactName === '' || contactEmail === '' || contactSubject == '' || contactMessage === '') {
                    $('.contactIncomplete').slideDown(function () {
                        setTimeout(function () {
                            $('.contactIncomplete').slideUp();
                        }, 1000);
                    });
                } else {
                    // console.log(contactMessage);
                    $.ajax({
                        url: "{!! route ('contactMainPage') !!}",
                        data: {
                            'fullName': contactName,
                            'email': contactEmail,
                            'subject': contactSubject,
                            'message': contactMessage
                        },
                        cache: false,
                        success: function (data) {
                            if (data === 1) {
                                $('#contactForm')[0].reset()
                                $('.contactMsg').slideDown(function () {
                                    setTimeout(function () {
                                        $('.contactMsg').slideUp();
                                    }, 1000);
                                });
                            } else {
                                $('.contactMsgFailed').slideDown(function () {
                                    setTimeout(function () {
                                        $('.contactMsgFailed').slideUp();
                                    }, 1000);
                                });
                            }
                        }
                    });
                }
            })
        })
    </script>
@endsection
