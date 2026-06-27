@extends('front.master')
@section('title', 'Author: ' . $author->name)
@section('content')

<body class="font-[Poppins] pb-[83px]">
    <x-navbar/>
	<nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px] px-4 xl:px-0 relative z-40">
		<!-- Desktop/Tablet Category List -->
		<div class="hidden md:flex flex-wrap justify-center items-center gap-4 w-full">
			<!-- First 5 Categories (Always visible on Tablet and Desktop) -->
			@foreach($categories->take(5) as $item_category)
			<a href="{{route('front.category', $item_category->slug)}}" class="rounded-full p-[12px_22px] flex items-center gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{Storage::url($item_category->icon)}}" alt="icon" />
				</div>
				<span class="whitespace-nowrap">{{$item_category->name}}</span>
			</a>
			@endforeach

			<!-- Categories 6-8 (Visible on Desktop only) -->
			@foreach($categories->skip(5)->take(3) as $item_category)
			<a href="{{route('front.category', $item_category->slug)}}" class="hidden lg:flex rounded-full p-[12px_22px] items-center gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{Storage::url($item_category->icon)}}" alt="icon" />
				</div>
				<span class="whitespace-nowrap">{{$item_category->name}}</span>
			</a>
			@endforeach

			<!-- Tablet "More Categories" Button (Visible only on Tablet, hidden on Desktop) -->
			@if($categories->count() > 5)
			<div class="relative md:block lg:hidden">
				<button onclick="document.getElementById('tabletMoreCategories').classList.toggle('hidden')" class="rounded-full p-[12px_22px] flex items-center gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5] bg-white cursor-pointer">
					<span class="whitespace-nowrap">More</span>
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500">
						<path d="M19.9201 8.9502L13.4001 15.4702C12.6301 16.2402 11.3701 16.2402 10.6001 15.4702L4.08008 8.9502" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</button>
				<div id="tabletMoreCategories" class="hidden absolute top-full right-0 mt-2 z-50">
					<div class="bg-white rounded-[20px] shadow-[0_10px_30px_0_rgba(0,0,0,0.1)] border border-[#EEF0F7] p-4 flex flex-col gap-4 w-max max-h-[300px] overflow-y-auto">
						@foreach($categories->skip(5) as $item_category)
						<a href="{{route('front.category', $item_category->slug)}}" class="rounded-full p-[12px_22px] flex items-center gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5]">
							<div class="w-6 h-6 flex shrink-0">
								<img src="{{Storage::url($item_category->icon)}}" alt="icon" />
							</div>
							<span class="whitespace-nowrap">{{$item_category->name}}</span>
						</a>
						@endforeach
					</div>
				</div>
			</div>
			@endif

			<!-- Desktop "More Categories" Button (Visible only on Desktop) -->
			@if($categories->count() > 8)
			<div class="relative hidden lg:block">
				<button onclick="document.getElementById('desktopMoreCategories').classList.toggle('hidden')" class="rounded-full p-[12px_22px] flex items-center gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5] bg-white cursor-pointer">
					<span class="whitespace-nowrap">More</span>
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500">
						<path d="M19.9201 8.9502L13.4001 15.4702C12.6301 16.2402 11.3701 16.2402 10.6001 15.4702L4.08008 8.9502" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</button>
				<div id="desktopMoreCategories" class="hidden absolute top-full right-0 mt-2 z-50">
					<div class="bg-white rounded-[20px] shadow-[0_10px_30px_0_rgba(0,0,0,0.1)] border border-[#EEF0F7] p-4 flex flex-col gap-4 w-max max-h-[300px] overflow-y-auto">
						@foreach($categories->skip(8) as $item_category)
						<a href="{{route('front.category', $item_category->slug)}}" class="rounded-full p-[12px_22px] flex items-center gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5]">
							<div class="w-6 h-6 flex shrink-0">
								<img src="{{Storage::url($item_category->icon)}}" alt="icon" />
							</div>
							<span class="whitespace-nowrap">{{$item_category->name}}</span>
						</a>
						@endforeach
					</div>
				</div>
			</div>
			@endif
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
	<section id="author" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px] px-4 xl:px-0">
		<div id="title" class="flex flex-col md:flex-row items-center gap-[15px] md:gap-[30px] text-center md:text-left">
			<h1 class="text-4xl leading-[45px] font-bold">Author News</h1>
			<h1 class="hidden md:block text-4xl leading-[45px] font-bold">/</h1>
			<div class="flex gap-3 items-center">
				<div class="w-[60px] h-[60px] flex shrink-0 rounded-full overflow-hidden">
					<img src="{{Storage::url($author->avatar)}}" alt="profile photo" />
				</div>
				<div class="flex flex-col">
					<p class="text-lg leading-[27px] font-semibold">{{$author->name}}</p>
					<span class="text-[#A3A6AE]">{{$author->occupation}}</span>
				</div>
			</div>
		</div>
		<div id="content-cards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px] w-full">

            @forelse($author->news as $news)
			<a href="{{route('front.details', $news->slug)}}" class="card">
				<div
					class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5] rounded-[20px] overflow-hidden bg-white">
					<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
						<div
							class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
							<p class="text-xs leading-[18px] font-bold uppercase">{{$news->category->name}}</p>
						</div>
						<img src="{{Storage::url($news->thumbnail)}}" alt="thumbnail photo"
							class="w-full h-full object-cover" />
					</div>
					<div class="flex flex-col gap-[6px]">
						<h3 class="text-lg leading-[27px] font-bold">{{$news->name}}</h3>
						<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$news->created_at->format('M d, Y')}}</p>
					</div>
				</div>
			</a>
            @empty
            <p>belum ada artikel yang ditulis</p>\
            @endforelse
		</div>
	</section>
	<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px] px-4 xl:px-0">
		<div class="flex flex-col gap-3 shrink-0 w-fit">
			<a href="{{$bannerads->link}}">
				<div class="w-full max-w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
					<img src="{{Storage::url($bannerads->thumbnail)}}" class="object-cover w-full h-full" alt="ads" />
				</div>
			</a>
			<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
				Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img src="{{asset('assets/images/icons/message-question.svg')}}" alt="icon" /></a>
			</p>
		</div>
	</section>
</body>
@endsection

@push('after-scripts')
@endpush