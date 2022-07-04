@extends('layouts.app')

@section('pages')
    @foreach($pages as $page)
        @if(count($page->Subpages) >= 1)
            <li class="navigation-item">
                <a class="navigation-link" href="{{ route('register') }}">
                  <span>{{ $page->title }}</span>
                </a>

                <ul class="navigation-sub">
                    @foreach($page->Subpages as $subPage)
                      <li class="navigation-sub-item">
                        <a href="{{ url('/pages/'.$page->slug .'/subpages/'. $subPage->slug) }}" class="navigation-sub-link">
                          <span>{{ $subPage->title }}</span>
                        </a>
                      </li>
                    @endforeach
                </ul>
            </li>
        @else
        <li class="navigation-item">
            <a class="navigation-link" href="{{ url('/pages/'. $page->slug) }}">{{ $page->title }}</a>
        </li>
        @endif
    @endforeach
@endsection

@section('content')
<div class="mv">
    <div class="mv-animate"></div>

    <div class="mv-inner">
      <h1 class="mv-title">
        Welcome to TESOL Licence<br/>
        <span>Your Pathways <br/>in English Teaching Careers</span>
      </h1>

      <ul class="mv-list">
        <li class="mv-item">
          <i class="ico-circle"></i>
          <p>Multiple Levels of TESOL Licence</p>
        </li>
        <li class="mv-item">
          <i class="ico-circle"></i>
          <p>Free Basic TESOL Training</p>
        </li>
        <li class="mv-item">
          <i class="ico-circle"></i>
          <p>Access to Premium Content</p>
        </li>
        <li class="mv-item">
          <i class="ico-circle"></i>
          <p>Access to Accredited Journal Publishing</p>
        </li>
      </ul>

      <div class="btn btn-gradient-link btn-mv">
        <a class="btn-link" href="{{ route('login') }}">
          <span>Sign Up now!</span>
        </a>
      </div>
    </div>
  </div>

  <section class="l-section membership">
  <div class="l-container">
      <h2 class="section-title">Why own a TESOL Licence?</h2>
      <p class="section-title-sub">Upgrade the old fashioned out of date designation (English teacher) to a 21st century professional designation.<br>Provide clear and achievable pathways to your professional career </p>
      <div style="margin:auto;width:50%;max-width:333px;height:70px;" class="btn btn-gradient-link btn-mv">
        <a class="btn-link" href="{{ route('login') }}">
          <span style="font-size:24px;">Get Your Licence Now!</span>
        </a>
      </div>
      
    </div>
<!-- 3 Column Membership -->    
<!--    <div class="l-container">
      <h2 class="section-title">Membership Levels</h2>
      <p class="section-title-sub">Various membership options you can choose with corresponding benefits</p>

      <div class="membership-list">
        @foreach($plans->take(3) as $plan)
          <div class="membership-item">
            <div class="membership-type">
              <span>{{ $plan->name }}</span>
            </div>

            <div class="membership-pricing">
              <p class="membership-pricing-price">
                <span class="membership-pricing-symbol">$</span>
                <span class="membership-pricing-amount">{{ $plan->cost }}</span>
              </p>

              <p class="membership-pricing-note">{{ $plan->cost_details }}</p>
            </div>

            <div class="membership-content">
              <ul class="membership-content-list">
                <li>{{ $plan->details }}</li>
                <li>{{ $plan->description }}</li>
              </ul>
            </div>
            <div class="membership-btn">
              <div class="btn btn-default">
                <a href="{{url('plans/'.$plan->slug)}}" class="btn-link">
                  <span>sign up</span>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>-->
<!-- END 3 Column Membership -->    
  </section>
  <section class="l-section benefits">
    <div class="l-container">
      <div class="benefits-con">
        <div class="benefits-detail">
          <h2 class="section-title">
            Our members
          </h2>
          <ul class="benefits-list">
            <li>Become part of the estimated 300,000,000 strong TESOL teaching world</li>
            <li>Part of TESOL teaching world with a licence to reflect your career</li>
            <li>Support the growth of over 2,000,000 English language students across the globe</li>
            <li>Recognition of Experience gained</li>
            <li>Pathways for new teachers to make this a life long career</li>
            <li>Pathways for academics – in Indexed publishing</li>
            <li>The coveted Green Coat award at the Singapore Green Coat Gala event</li>
          </ul>
          <div class="btn-benefits">
            <a href="#" class="btn-link">
              <span>Become A memeber Now!</span>
            </a>
          </div>
        </div>
        <div class="benefits-img">
          <img src="assets/images/world-bg.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <section class="l-section membership">
    <div class="l-container">
      <h2 class="section-title">
        Membership Benefits
      </h2>

      <p class="section-title-sub">Loaded with necessary benefits for your membership</p>

      <ul class="paid-membership-list">
        <li class="paid-membership-item">
          <i class="ico-lock"></i>
          <div class="paid-membership-detail">
            <h3>Purpose and Aims</h3>
            <ul>
                <li>To build a global authority of experts in the worlds largest        profession.</li>
                <li>To upgrade the old fashioned out of date designation ( English        teacher) to a 21st century professional designation</li>
                <li>To promote the TESOL global profession to all educational        authority and applicable government departments</li>
                <li>To encourage membership in Local and International TESOL        orgainzations</li>
                <li>To provide clear and achievable pathways to your professional        career </li>
            </ul>
          </div>
        </li>

        <li class="paid-membership-item">
          <i class="ico-certificate"></i>
          <div class="paid-membership-detail">
            <h3>Explanatory notes</h3>
            <ul>
                <li>What is TESOL - TESOL certification</li>
                <li>Overview of educational providers</li>
                <li>Country laws</li>
                <li>TESOL organisations</li>
                <li>The value &amp; purpose of the TESOL licence</li>
                <li>Our Global community</li>
                <li>Data Safeguards</li>
            </ul>
          </div>
        </li>

        <li class="paid-membership-item">
          <i class="ico-shield"></i>
          <div class="paid-membership-detail">
            <h3>Members benefits</h3>
              <ul>
                <li>Hard copy licence to fit in your wallet</li>
                <li>To prevent fraud of TESOL certificates duplication (link here)</li>
                <li>Free TESOL certification</li>
                <li>Teachers Action Research Journal</li>
                <li>Licence  validity – 2 years </li>
                <li>Upgrade to higher category with experience and or added        qualifications at any time</li>
            </ul>
          </div>
        </li>

        <li class="paid-membership-item">
          <i class="ico-laptop"></i>
          <div class="paid-membership-detail">
            <h3>Upgrade one level - (any of the following)</h3>
            <ul>
                <li>Member of TESOL organisation</li>
                <li>Published works (journal or hard cover) on SLA teaching</li>
                <li>Presented at International conference</li>
            <li>Presented at local conference held by the TESOL organisation of        that country or by another recognised Conference group (TESOL Asia, etc)            </li></ul>
          </div>
        </li>

        <li class="paid-membership-item">
          <i class="ico-trophy"></i>
          <div class="paid-membership-detail">
            <h3>Green Coat Award for Researchers</h3>
            <ul>
            <li>Attend at the Worlds premier TESOL recognition event in Singapore where exceptional academic researchers and teaching professionals are awarded with the professions highest honors.</li>
            </ul>
          </div>
        </li>

        <li class="paid-membership-item">
          <i class="ico-paypal"></i>
          <div class="paid-membership-detail">
            <h3>Safeguard  of your data</h3>
            <ul>
                <li>The website and servers  employ high levels of security</li>
                <li>We do not store your credit card information</li>
                <li>We do not share your data / email </li>
                <li>We do not seek information without your permission.</li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </section>
<!-- Stats 
  <div class="statistics">
    <ul class="statistics-list">
      <li class="statistics-item">
        <i class="ico-commenting"></i>
        <h3>activity</h3>
        <span>4,302</span>
      </li>

      <li class="statistics-item">
        <i class="ico-user-o"></i>
        <h3>members</h3>
        <span>12,744</span>
      </li>

      <li class="statistics-item">
        <i class="ico-user-circle"></i>
        <h3>online</h3>
        <span>125</span>
      </li>

      <li class="statistics-item">
        <i class="ico-group-user"></i>
        <h3>groups</h3>
        <span>899</span>
      </li>

      <li class="statistics-item">
        <i class="ico-list"></i>
        <h3>forums</h3>
        <span>88</span>
      </li>

      <li class="statistics-item">
        <i class="ico-comments"></i>
        <h3>topics</h3>
        <span>23,543</span>
      </li>
    </ul>
  </div>
END Stats -->  
@endsection
