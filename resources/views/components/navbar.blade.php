	<nav id="Navbar" class="max-w-[1000px] w-full mx-auto flex flex-col md:flex-row justify-between items-center mt-[30px] px-4 xl:px-0 gap-4 md:gap-8">
		<div class="logo-container flex flex-col md:flex-row gap-[10px] md:gap-[30px] items-center w-full md:flex-1">
			<a href="{{route('front.index')}}" class="flex shrink-0">
				<img src="{{asset('assets/images/logos/magazine logo.svg')}}" alt="logo" class="h-[70px] md:h-[80px] w-auto" />
			</a>
			<div class="hidden md:block h-12 border border-[#E8EBF4]"></div>
			<form method="GET" action="{{route('front.search')}}"
				class="w-full flex-1 max-w-[450px] flex items-center rounded-full border border-[#E8EBF4] p-[12px_20px] gap-[10px] focus-within:ring-2 focus-within:ring-[#0285b5] transition-all duration-300">

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
			<a href="https://wa.me/6281227392837?text=Halo%20saya%20ingin%20memasang%20iklan%20saya"
				class="rounded-full p-[12px_22px] flex items-center gap-[10px] font-bold transition-all duration-300 bg-[#0285b5] text-white hover:shadow-[0_10px_20px_0_#0285b580] shrink-0">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{asset('assets/images/icons/favorite-chart.svg')}}" alt="icon"/>
				</div>
				<span class="whitespace-nowrap">Post Ads</span>
			</a>
		</div>
	</nav>