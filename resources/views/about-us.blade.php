<div>
    @extends('layout.app')

    @section('content')
    <div class="container why-choosing-us-outer" style="margin: 20px;">
        <div class="chapter-header">
            <h2>WHY CHOOSING US</h2>
        </div>
        <div class="row">
            <!-- First Column -->
            <div class="col-lg-6 col-md-12 col-sm-12 why-choose-left-inner ">
                <img src="{{asset('images/vectors-home/why-choose.jpg')}}" alt="peoples-using-technology">
            </div>

            <!-- Second Column -->
            <div class="col-lg-6 col-md-12 col-sm-12 why-choosing-us-inner" style="">

                <ul>
                    <li><i class="fas fa-cogs"></i> Comprehensive & Integrated Solution
                        Manage all your operations in one place, including booking, inventory, payments, and customer management. No more juggling between different systems.</li>
                    <li><i class="fas fa-check-circle"></i> Regulatory Compliance
                        Our platform ensures that your business complies with the latest health and safety regulations, promoting transparency and industry credibility.</li>
                    <li><i class="fas fa-users"></i> Customer-Centric Features
                        Enhance customer satisfaction with features like real-time booking, personalized recommendations, a feedback system, and loyalty programs that encourage repeat business.</li>
                    <li><i class="fas fa-clock"></i> Boost Efficiency & Productivity
                        Say goodbye to administrative burdens. Our platform helps automate processes, saving time and increasing productivity, so you can focus on delivering top-notch services.</li>
                </ul>

            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="chapter-header">
                <h2>OUR VISION</h2>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 vision-content-inner" >
                <P>Our vision is to revolutionize the wellness industry in Sri Lanka by offering an innovative digital
                    platform that enhances operational efficiency, ensures strict health and safety compliance,
                    and delivers exceptional customer experiences. We aim to empower massage parlors to grow sustainably
                    and stand out in a competitive market while fostering long-term customer satisfaction and business
                    success.</P>
            </div>


            <div class="col-lg-6 col-md-12 col-sm-12 mission-inner" >
                <img src="{{asset('images/vectors-home/5439.jpg')}}" alt="team-image">

            </div>



        </div>

    </div>
    <div class="container mission-section">
        <div class="chapter-header">
            <h2>OUR MISSION</h2>
        </div>

        <div class="row">

            <div class="col-lg-6 col-md-12 col-sm-12 why-choose-left-inner" >
                <img src="{{asset('images/vectors-home/20943566.jpg')}}" alt="">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 vision-content-inner" >
                <p>Our mission is to empower massage parlor owners and customers across Sri Lanka with a comprehensive,
                    easy-to-use digital solution. We are dedicated to simplifying day-to-day operations,
                    from online booking and payment processing to customer management and inventory control.
                    By incorporating real-time data, feedback systems, and personalized wellness services,
                    we aim to boost customer engagement, streamline operations, and drive business growth while ensuring
                    compliance with industry standards.</p>
            </div>
        </div>

    </div>
    <div class="container" style="background-color: white;height: 150px">
        <div class="chapter-header">
            <h2>Our Sponsers</h2>
        </div>
        <div class="row">
            <div class="logo-ribbon">
                <div class="logo-item">
                    <img src="{{asset('images/logo.jpg')}}" alt="Logo 1">
                </div>
                <div class="logo-item">
                    <img src="{{asset('images/logo.jpg')}}" alt="Logo 1">

                </div>
                <div class="logo-item">
                    <img src="{{asset('images/logo.jpg')}}" alt="Logo 1">

                </div>
                <div class="logo-item">
                    <img src="{{asset('images/logo.jpg')}}" alt="Logo 1">

                </div>
                <div class="logo-item">
                    <img src="{{asset('images/logo.jpg')}}" alt="Logo 1">

                </div>
            </div>

        </div>
    </div>


    @endsection


</div>
