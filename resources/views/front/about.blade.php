@extends('front.layouts.app')
@section('content')

<div id="header" class="bg-[#F6F7FA] relative">
  <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
      <x-navbar/>
      <div class="flex flex-col gap-[50px] items-center py-20">
        <div class="breadcrumb flex items-center justify-center gap-[30px]">
          <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
          <span class="text-cp-light-grey">/</span>
          <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">About Us</p>
        </div>
        <h2 class="font-bold text-4xl leading-[45px] text-center">Since Beginning We Only <br> Want to Make World Better</h2>
      </div>
  </div>
</div>
<div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">
    @forelse ($abouts as $about)
    <div class="product flex flex-wrap justify-center items-center gap-[60px] even:flex-row-reverse">    
      <div class="w-[470px] h-[550px] flex shrink-0 overflow-hidden">
        <img src="{{Storage::url($about->thumbnail)}}" class="w-full h-full object-contain" alt="thumbnail">
      </div>
      <div class="flex flex-col gap-[30px] py-[50px] h-fit max-w-[500px]">
        <p class="badge w-fit bg-cp-pale-blue text-cp-carrot p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR {{$about->type}}</p>
        <div class="flex flex-col gap-[10px]">
          <h2 class="font-bold text-4xl leading-[45px]">
            {{$about->name}}
          </h2>
          <div class="flex flex-col gap-5">
            @forelse ($about->keypoints as $keypoint)
                    <div class="flex items-center gap-[10px]">                
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="assets/icons/check.png" alt="icon">
                        </div>
                        <p class="leading-[26px] font-semibold">
                            {{$keypoint->keypoint}}
                        </p>
                    </div>
                @empty                    
                @endforelse            
          </div>
        </div>
      </div>
    </div>   
    @empty
        
    @endforelse
  
  
</div>
<div id="Clients" class="container max-w-[1130px] mx-auto flex flex-col justify-center text-center gap-5 mt-20">
  <h2 class="font-bold text-lg">Trusted by 500+ Top Leaders Worldwide</h2>
  <div class="logo-container flex flex-wrap gap-5 justify-center max-h-[250px] overflow-hidden relative">
    @forelse ($clients->take(8) as $client)
        <div class="logo-card h-[100px] w-[200px] flex items-center shrink-0 rounded-[18px] p-2 gap-[5px] bg-white hover:shadow-[0_10px_30px_0_#D1D4DF80] transition-all duration-300">
          <div class="overflow-hidden h-full w-full">
            <img src="{{Storage::url($client->logo)}}" class="object-contain w-full h-full" alt="logo">
          </div>
        </div>
    @empty
        <P>Belum Ada Data Terbaru</P>
    @endforelse
  </div>
  
  @if(count($clients) > 8)
  <div class="text-center mt-4">
    <a href="#" class="bg-cp-dark-carrot p-[14px_20px] w-fit rounded-xl font-bold text-white inline-block mt-10">View All Clients</a>
  </div>
  @endif
</div>
<div id="Stats" class="bg-cp-black w-full mt-20">
  <div class="container max-w-[1000px] mx-auto py-10">
    <div class="flex flex-wrap items-center justify-between p-[10px]">
      
      @forelse ($statistics as $statistic)
          <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
          <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
            <img src="{{Storage::url($statistic->icon)}}" class="object-contain w-full h-full" alt="icon">
          </div>
          <p class="text-cp-pale-orange font-bold text-4xl leading-[54px]">
              {{$statistic->goal}}
          </p>
          <p class="text-cp-light-grey">
              {{$statistic->name}}
          </p>
        </div>
      @empty
          <p>Belum Ada Data Terbaru</p>
      @endforelse
      
      
    </div>
  </div>
</div>
<div id="Services" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
  <div class="flex items-center justify-between">
    <div class="flex flex-col gap-[14px]">
      <p class="badge w-fit bg-cp-pale-blue text-cp-carrot p-[8px_16px] rounded-full uppercase font-bold text-sm">OUR SERVICES</p>
      <h2 class="font-bold text-4xl leading-[45px]">We’ve Dedicated Our<br>Best Team Efforts</h2>
    </div>
    <a href="{{route('front.appointment')}}" class="bg-cp-dark-carrot p-[14px_20px] w-fit rounded-xl font-bold text-white">Explore More</a>
  </div>
  <div class="awards-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">

    @forelse ($services as $service)
      <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-carrot transition-all duration-300">
        <div class="w-[55px] h-[55px] flex shrink-0">
          <img src="{{Storage::url($service->logo)}}" alt="icon">
        </div>
        <hr class="border-[#E8EAF2]">
        <p class="font-bold text-xl leading-[30px]">{{$service->name}}</p>
        <hr class="border-[#E8EAF2]">
        <p class="text-cp-light-grey">{{$service->subtitle}}</p>
      </div>
    @empty
      <P>Belum Ada Data Terbaru</P>
    @endforelse
    
    {{-- <div class="card bg-white flex flex-col h-full p-[30px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
      <div class="w-[55px] h-[55px] flex shrink-0">
        <img src="assets/icons/desktop.png" alt="icon">
      </div>
      <hr class="border-[#E8EAF2]">
      <p class="font-bold text-xl leading-[30px]">Teamwork and Solidarity</p>
      <hr class="border-[#E8EAF2]">
      <p class="text-cp-light-grey">Bandung, 2023</p>
    </div> --}}
  </div>
</div>
<footer class="bg-cp-black w-full relative overflow-hidden mt-20">
  <div class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-4 items-center justify-between pt-[100px] pb-[220px] relative z-10">
    <div class="flex flex-col gap-10">
      <div class="flex items-center gap-3">
        <div class="flex shrink-0 h-[43px] overflow-hidden">
            <img src="assets/logo/diroi2.png" class="object-contain w-full h-full" alt="logo">
        </div>
        <div class="flex flex-col">
          <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-white">DiroiComp</p>
          <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
        </div>
      </div>
      <div class="flex items-center gap-4">
        <a href="">
          <div class="w-6 h-6 flex shrink-0 overflow-hidden">
            <img src="assets/icons/youtube.svg" class="w-full h-full object-contain" alt="youtube">
          </div>
        </a>
        <a href="">
          <div class="w-6 h-6 flex shrink-0 overflow-hidden">
            <img src="assets/icons/whatsapp.svg" class="w-full h-full object-contain" alt="whatsapp">
          </div>
        </a>
        <a href="">
          <div class="w-6 h-6 flex shrink-0 overflow-hidden">
            <img src="assets/icons/facebook.svg" class="w-full h-full object-contain" alt="facebook">
          </div>
        </a>
        <a href="">
          <div class="w-6 h-6 flex shrink-0 overflow-hidden">
            <img src="assets/icons/instagram.svg" class="w-full h-full object-contain" alt="instagram">
          </div>
        </a>
      </div>
    </div>
    <div class="flex flex-wrap gap-[50px]">
      <div class="flex flex-col w-[200px] gap-3">
        <p class="font-bold text-lg text-white">Products</p>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Web Development</a>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Mobile Development</a>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">UI/UX Design</a>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">SEO Optimization</a>
      </div>
      <div class="flex flex-col w-[200px] gap-3">
        <p class="font-bold text-lg text-white">About</p>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Our Team</a>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Our Big Purposes</a>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Investor Relations</a>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Media Press</a>
      </div>
      <div class="flex flex-col w-[200px] gap-3">
        <p class="font-bold text-lg text-white">Useful Links</p>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Privacy & Policy</a>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Terms & Conditions</a>
        <a href="contact.html" class="text-cp-light-grey hover:text-white transition-all duration-300">Contact Us</a>
        <a href="" class="text-cp-light-grey hover:text-white transition-all duration-300">Download Template</a>
      </div>
    </div>
  </div>
  <div class="absolute -bottom-[135px] w-full">
    <p class="font-extrabold text-[250px] leading-[375px] text-center text-white opacity-5">DIROI</p>
  </div>
</footer>


@endsection