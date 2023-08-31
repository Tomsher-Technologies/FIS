@extends('layouts.frontend.app')

@section('content')
    <!--=================================
        contact Form -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h1>{{ $pageSettings['heading'] ?? '' }}</h1>
                        <p>
                        {{ $pageSettings['sub_heading'] ?? '' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-lg-around position-relative pt-5">
                <div class="col-lg-4 col-md-5 mb-4">
                    <div class="is-sticky">
                        <h4 class="mb-4">{{ $pageSettings['heading2'] ?? '' }}</h4>
                        
                        {!! $pageSettings['content'] ?? '' !!}
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 pe-lg-5">
                    <div class="p-4 p-md-5 bg-white shadow">
                        <h3>Need assistance? please fill the form</h3>
                        <form class="mt-4" id="contact-form-new" action="#" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Name">
                            </div>
                            
                            <div class="mb-3">
                                <input type="text" class="form-control" id="contact_email" name="contact_email" placeholder="Email">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="contact_phone" name="contact_phone" placeholder="Phone Number">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="contact_subject" name="contact_subject" placeholder="Subject">
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control" id="contact_message" name="contact_message" placeholder="Message" rows="5"></textarea>
                            </div>
                          
                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary"  id="contact-button">Send Massage<i
                                        class="fas fa-arrow-right ps-3"></i></button>
                            </div>
                        </form>

                        <p class="ajax-response mt-3"></p>
                    </div>
                </div>
                <div class="contact-bg-logo text-center">
                    <i class="fas fa-comment"></i>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          contact Form  -->

    <!--=================================
          contact Form info -->
    <section>
        <div class="container-f">
            <div class="row justify-content-lg-around">
                <div class="col-lg-12 col-md-12 pe-lg-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14433.077104888856!2d55.3009594871582!3d25.26152560000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5cce0a5a65f3%3A0xe3e76144a55699c3!2sFarook%20International%20Stationery%20-%20Head%20Office!5e0!3m2!1sen!2sae!4v1693380034068!5m2!1sen!2sae" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          contact Form info-->
<style>
.error{
    color:red ;
}
</style>
@endsection

@push('footer')
<script src="{{ getAdminAsset('js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
<script src="{{ getAdminAsset('js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
<script>

$("#contact-form-new").validate({
            rules: {
                contact_name: {
                    required: true
                },
                contact_email: {
                    required: true,
                    email:true
                },  
                contact_phone: {
                    required: true
                },
                contact_subject: {
                    required: true
                },  
                contact_message: {
                    required: true
                },     
            },
            
            submitHandler: function(e) {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#submit').html('Please Wait...');
                $("#submit"). attr("disabled", true);
                $.ajax({
                    url: "{{ route('contact-save')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "name": $('#contact_name').val(),
                        "email": $('#contact_email').val(),
                        "phone": $('#contact_phone').val(),
                        "subject": $('#contact_subject').val(),
                        "message": $('#contact_message').val()
                    },
                    success: function(response) {
                        $("#contact-form-new")[0].reset();
                        $(".ajax-response").html("<div class='alert alert-success'>THANK YOU FOR GETTING IN TOUCH. OUR TEAM WILL CONTACT YOU SHORTLY.</div>");
                    }
                });
            }
        })
    // hideErrors();
    // function hideErrors(){
    //     $('#name-error').css('display','none');
    //     $('#email-error').css('display','none');
    //     $('#phone-error').css('display','none');
    //     $('#message-error').css('display','none');
    // }

    // $('#contact-button').on('click',function(){
    //     hideErrors();
    //     var flag = true;
    //     if($('#contact_name').val() == ''){
    //         flag = false;
    //         $('#name-error').css('display','block');
    //     }
    //     if($('#contact_email').val() == ''){
    //         flag = false;
    //         $('#email-error').css('display','block');
    //     }
    //     if($('#contact_phone').val() == ''){
    //         flag = false;
    //         $('#phone-error').css('display','block');
    //     }
    //     if($('#contact_message').val() == ''){
    //         flag = false;
    //         $('#message-error').css('display','block');
    //     }
        
    //     if(flag == true){
    //         $.ajax({
    //         url: "{{ route('contact-save')}}",
    //         type: "POST",
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "name": $('#contact_name').val(),
    //             "email": $('#contact_email').val(),
    //             "phone": $('#contact_phone').val(),
    //             "subject": $('#contact_subject').val(),
    //             "message": $('#contact_message').val()
    //         },
    //         success: function(response) {
    //             $("#contact-form-new")[0].reset();
    //             $(".ajax-response").html("<div class='alert alert-success'>THANK YOU FOR GETTING IN TOUCH. OUR TEAM WILL CONTACT YOU SHORTLY.</div>");
    //         }
    //     });
    //     }
    // });
</script>
@endpush