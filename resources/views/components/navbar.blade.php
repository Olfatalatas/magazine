	<nav id="Navbar" class="max-w-[1000px] mx-auto flex justify-between items-center mt-[30px]">
		<div class="logo-container flex gap-[30px] items-center sm:gap-[10px]">
			<a href="{{route('front.index')}}" class="flex shrink-0">
				<img src="{{asset('assets/images/logos/logo_gerbang_publik.jpg')}}" alt="logo" height="100px" width="100px" class="rounded-full" />
			</a>
			<div class="h-12 border border-[#E8EBF4]"></div>
			<form method="GET" action="{{route('front.search')}}"
				class="w-[450px] flex items-center rounded-full border border-[#E8EBF4] p-[12px_20px] gap-[10px] focus-within:ring-2 focus-within:ring-[#0285b5] transition-all duration-300">

			@csrf

				<button type="submit" class="w-5 h-5 flex shrink-0">
					<img src="{{asset('assets/images/icons/search-normal.svg')}}" alt="icon" />
				</button>
				<input type="text" name="keyword" id=""
					class="appearance-none outline-none w-full font-semibold placeholder:font-normal placeholder:text-[#A3A6AE]"
					placeholder="Search hot trendy news today..." />
			</form>
		</div>
		<div class="flex items-center gap-3">
			<a href="https://wa.me/6281249036099?text=Halo%20saya%20ingin%20memasang%20iklan%20saya"
				class="rounded-full p-[12px_22px] flex gap-[10px] font-bold transition-all duration-300 bg-[#0285b5] text-white hover:shadow-[0_10px_20px_0_#0285b580]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{asset('assets/images/icons/favorite-chart.svg')}}" alt="icon"/>
				</div>
				<span>Post Ads</span>
			</a>
		</div>
	</nav>