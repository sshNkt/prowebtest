<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #000;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
         
svg {
  width: 700px;
  height: 300px;
}
.light {
	transform-origin: 15% 18%;
	transform:rotate(60deg)
}
.light {
	transform-origin: 30% 0;
	animation: 6s animate ease-in-out reverse infinite;
}

@keyframes animate {
	0% {
		transform-origin: 19% 16%;
	transform: rotate(60deg)
	}
	50% {
		transform-origin: 18% 7%;
		transform: rotate(-80deg);
	}
	100% {
		transform-origin: 19% 16%;
	transform:rotate(60deg)
	}
}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/profile') }}">Profile</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                        <svg viewBox="-50 0 700 300">
                                <defs>  
                            
                               <clipPath id="text-1">  
                            
                                <text id="Mask" font-family="Montserrat-Black, Montserrat" font-size="100" font-weight="700" letter-spacing="50" fill="#121212">
                                                <tspan x="" y="195">Proweb</tspan>
                                            </text>
                            
                               </clipPath>  
                            
                             </defs>
                            <g>
                                
                                <text id="Mask" font-family="Montserrat-Black, Montserrat" font-size="100" font-weight="700" letter-spacing="50" fill="#121212">
                                                <tspan x="0" y="195">Proweb</tspan>
                                            </text>
                                </text>
                                </g>
                            //clip-path="url(#text-1)"
                             <g clip-path="url(#text-1)">  
                                <polygon class="light" fill="#F8F8F8" points="91.7663783 -3.51439292 176.859739 -3.51439292 234.191437 922.485607 -154.808563 887.785896"></polygon>
                             </g>  
                            </svg>
                </div>

                <div class="links">
                    <a href="https://pro-web.agency/uslugi/" target="_blank">Services</a>
                    <a href="https://pro-web.agency/portfolio/" target="_blank">Portfolio</a>
                    <a href="https://pro-web.agency/about-us/" target="_blank">About</a>
                    <a href="https://pro-web.agency/contacts/" target="_blank">Contacts</a>
                </div>
            </div>
        </div>
    </body>
</html>
