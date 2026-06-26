@extends('front.master')
@section('title', 'Search: ' . $keyword)
@section('content')

	<body class="font-[Poppins]">
        <x-navbar/>
		<nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px] px-4 xl:px-0 relative z-40">
			<!-- Desktop/Tablet: Category Button -->
			<div class="hidden md:flex flex-col items-center relative">
				<button onclick="document.getElementById('desktopCategoryList').classList.toggle('hidden')" class="rounded-full p-[12px_22px] flex items-center gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5] bg-white cursor-pointer">
					<span>Explore Categories</span>
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition-transform duration-300">
						<path d="M19.9201 8.9502L13.4001 15.4702C12.6301 16.2402 11.3701 16.2402 10.6001 15.4702L4.08008 8.9502" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</button>
				
				<!-- Dropdown (Grid Sideways) -->
				<div id="desktopCategoryList" class="hidden absolute top-full left-1/2 -translate-x-1/2 mt-2 z-50">
					<div class="w-max max-w-[90vw] bg-white rounded-[20px] shadow-[0_10px_30px_0_rgba(0,0,0,0.1)] border border-[#EEF0F7] p-6 grid grid-cols-2 lg:grid-cols-4 gap-4">
						@foreach($categories as $item_category)
						<a href="{{route('front.category', $item_category->slug)}}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5]">
							<div class="w-6 h-6 flex shrink-0">
								<img src="{{Storage::url($item_category->icon)}}" alt="icon" />
							</div>
							<span class="whitespace-nowrap">{{$item_category->name}}</span>
						</a>
						@endforeach
					</div>
				</div>
			</div>

			<!-- Mobile: Burger Menu -->
			<div class="md:hidden w-full relative">
				<button onclick="document.getElementById('mobileCategoryList').classList.toggle('hidden')" class="w-full rounded-full p-[12px_22px] flex justify-between items-center font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5] bg-white cursor-pointer">
					<span>Explore Categories</span>
					<!-- Burger Icon -->
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3 7H21" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
						<path d="M3 12H21" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
						<path d="M3 17H21" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
					</svg>
				</button>

				<!-- Dropdown Mobile -->
				<div id="mobileCategoryList" class="hidden absolute top-full left-0 w-full mt-2 z-50">
					<div class="flex flex-col gap-4 bg-white rounded-[20px] shadow-[0_10px_30px_0_rgba(0,0,0,0.1)] border border-[#EEF0F7] p-4 max-h-[300px] overflow-y-auto">
						@foreach($categories as $item_category)
						<a href="{{route('front.category', $item_category->slug)}}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5]">
							<div class="w-6 h-6 flex shrink-0">
								<img src="{{Storage::url($item_category->icon)}}" alt="icon" />
							</div>
							<span class="whitespace-nowrap">{{$item_category->name}}</span>
						</a>
						@endforeach
					</div>
				</div>
			</div>
		</nav>
		<section id="heading" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px] px-4 xl:px-0">
			<h1 class="text-4xl leading-[45px] font-bold text-center">
				Explore Hot Trending <br />
				Good News Today
			</h1>
			<form action="{{route('front.search')}}" method="GET" class="w-full">
				<label for="search-bar" class="w-full max-w-[500px] mx-auto flex p-[12px_20px] transition-all duration-300 gap-[10px] ring-1 ring-[#E8EBF4] focus-within:ring-2 focus-within:ring-[#0285b5] rounded-[50px] group">
					<div class="w-5 h-5 flex shrink-0">
						<img src="assets/images/icons/search-normal.svg" alt="icon" />
					</div>
					<input
						autocomplete="off"
						type="text"
						id="search-bar"
						name="keyword"
						placeholder="Search hot trendy news today..."
						class="appearance-none font-semibold placeholder:font-normal placeholder:text-[#A3A6AE] outline-none focus:ring-0 w-full"
					/>
				</label>
			</form>
		</section>
		<section id="search-result" class="max-w-[1130px] mx-auto flex items-start flex-col gap-[30px] mt-[70px] mb-[100px] px-4 xl:px-0 w-full">
			<h2 class="text-[26px] leading-[39px] font-bold">Search Result: <span>{{{ucfirst($keyword)}}}</span></h2>
			<div id="search-cards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px] w-full">

                @forelse($articles as $article)
				<a href="{{route('front.details', $article->slug)}}" class="card">
					<div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5] rounded-[20px] overflow-hidden bg-white">
						<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
							<div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
								<p class="text-xs leading-[18px] font-bold uppercase">{{$article->category->name}}</p>
							</div>
							<img src="{{Storage::url($article->thumbnail)}}" alt="thumbnail photo" class="w-full h-full object-cover" />
						</div>
						<div class="flex flex-col gap-[6px]">
							<h3 class="text-lg leading-[27px] font-bold">{{$article->name}}</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$article->created_at->format('M d, Y')}}</p>
						</div>
					</div>
				</a>
                @empty
                <p>belum ada artikel dengan keyword tersebut</p>
                @endforelse
			</div>
		</section>
		</section>
	</body>
@endsection

@push('after-scripts')
@endpush