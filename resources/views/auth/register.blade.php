<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{ asset('myassets') }}/images/favicon_1.ico">

        <title>Moltran - Responsive Admin Dashboard Template</title>

        <!-- Base Css Files -->
        <link href="{{ asset('myassets') }}/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ asset('myassets') }}/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="{{ asset('myassets') }}/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="{{ asset('myassets') }}/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ asset('myassets') }}/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ asset('myassets') }}/css/waves-effect.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{ asset('myassets') }}/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('myassets') }}/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{ asset('myassets') }}/js/modernizr.min.js"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                   <h3 class="text-center m-t-10 text-white"> Create a new Account </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input  id="name" class="form-control input-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="email" class="form-control input-lg" type="email" name="email" :value="old('email')" required  placeholder="Email Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" id="password" type="password" name="password" required autocomplete="new-password" placeholder="New Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Retype New Password">
                        </div>
                    </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input name="terms" id="terms" id="checkbox-signup" type="checkbox" checked="">
<!--                                 <label for="checkbox-signup">
                                    I accept <a href="#">Terms and Conditions</a>
                                </label> -->

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                            
                            </div>
                            
                        </div>
                    </div>
            @endif                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-12 text-center">
                            <a href="{{ route('login') }}">Already have account?</a>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>
        <script src="{{ asset('myassets') }}/js/jquery.min.js"></script>
        <script src="{{ asset('myassets') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('myassets') }}/js/waves.js"></script>
        <script src="{{ asset('myassets') }}/js/wow.min.js"></script>
        <script src="{{ asset('myassets') }}/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="{{ asset('myassets') }}/js/jquery.scrollTo.min.js"></script>
        <script src="{{ asset('myassets') }}/assets/jquery-detectmobile/detect.js"></script>
        <script src="{{ asset('myassets') }}/assets/fastclick/fastclick.js"></script>
        <script src="{{ asset('myassets') }}/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="{{ asset('myassets') }}/assets/jquery-blockui/jquery.blockUI.js"></script>


        <!-- CUSTOM JS -->
        <script src="{{ asset('myassets') }}/js/jquery.app.js"></script>
	
	</body>
</html>