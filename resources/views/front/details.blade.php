@extends('front.master')
@section('title', $articleNews->name)
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
	<header class="flex flex-col items-center gap-[30px] md:gap-[50px] mt-[70px] px-4 xl:px-0 w-full">
		<div id="Headline" class="max-w-[1130px] mx-auto flex flex-col gap-4 items-center w-full">
			<p class="w-fit text-[#A3A6AE]">{{$articleNews->created_at->format('M d, Y')}} • {{$articleNews->category->name}}</p>
			<h1 id="Title" class="font-bold text-3xl md:text-[46px] md:leading-[60px] text-center two-lines">{{$articleNews->name}}</h1>
			<div class="flex items-center justify-center gap-[70px]">
				<a id="Author" href="{{route('front.author', $articleNews->author->slug)}}" class="w-fit h-fit">
					<div class="flex items-center gap-3">
						<div class="w-10 h-10 rounded-full overflow-hidden">
							<img src="{{Storage::url($articleNews->author->avatar)}}" class="object-cover w-full h-full" alt="avatar">
						</div>
						<div class="flex flex-col">
							<p class="font-semibold text-sm leading-[21px]">{{$articleNews->author->name}}</p>
							<p class="text-xs leading-[18px] text-[#A3A6AE]">{{$articleNews->author->occupation}}</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="w-full max-w-[1130px] mx-auto h-[300px] md:h-[500px] flex shrink-0 overflow-hidden rounded-2xl md:rounded-none">
			<img src="{{Storage::url($articleNews->thumbnail)}}" class="object-cover w-full h-full" alt="cover thumbnail">
		</div>
	</header>
	<section id="Article-container" class="max-w-[1130px] mx-auto flex flex-col lg:flex-row gap-10 lg:gap-20 mt-[50px] px-4 xl:px-0 w-full">
		<article id="Content-wrapper" class="w-full lg:w-auto">
			{!! $articleNews->content !!}
		</article>
		<div class="side-bar flex flex-col w-full lg:w-[300px] shrink-0 gap-10">
			<div class="ads flex flex-col gap-3 w-full max-w-[250px] mx-auto lg:max-w-full lg:mx-0">
				<a href="{{$square_ads_1->link}}">
					<img src="{{Storage::url($square_ads_1->thumbnail)}}" class="object-contain w-full h-full" alt="ads" />
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
							src="{{asset('assets/images/icons/message-question.svg')}}" alt="icon" /></a>
				</p>
			</div>
			<div id="More-from-author" class="flex flex-col gap-4">
				<p class="font-bold">More From Author</p>

                @forelse($author_news as $item_news)
				<a href="{{route('front.details', $item_news->slug)}}" class="card-from-author">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[14px] flex gap-4 hover:ring-2 hover:ring-[#0285b5] transition-all duration-300">
						<div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden rounded-2xl">
							<img src="{{Storage::url($item_news->thumbnail)}}" class="object-cover w-full h-full"
								alt="thumbnail">
						</div>
						<div class="flex flex-col gap-[6px]">
							<p class="line-clamp-2 font-bold">{{substr($item_news->name, 0, 50)}}{{strlen($item_news->name) > 50 ? '...' : ' '}}</p>
							<p class="text-xs leading-[18px] text-[#A3A6AE]">{{$item_news->created_at->format('M d, Y')}} • {{$item_news->category->name}}</p>
						</div>
					</div>
				</a>
                @empty
				<div class="flex flex-col items-center justify-center gap-3 p-6 bg-[#F9F9FC] rounded-[20px] ring-1 ring-[#EEF0F7] text-center">
					<div class="w-12 h-12 flex items-center justify-center bg-white rounded-full shrink-0 shadow-sm border border-[#EEF0F7]">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M22 10V15C22 20 20 22 15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H14" stroke="#A3A6AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M22 10H18C15 10 14 9 14 6V2L22 10Z" stroke="#A3A6AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<div class="flex flex-col gap-1">
						<p class="font-semibold text-sm">Belum Ada Artikel</p>
						<p class="text-xs leading-[18px] text-[#A3A6AE]">Penulis ini belum memiliki artikel terbaru lainnya.</p>
					</div>
				</div>
                @endforelse
			</div>

			<div class="ads flex flex-col gap-3 w-full max-w-[250px] mx-auto lg:max-w-full lg:mx-0">
				<a href="{{$square_ads_2->link}}">
					<img src="{{Storage::url($square_ads_2->thumbnail)}}" class="object-contain w-full h-full" alt="ads" />
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
							src="{{asset('assets/images/icons/message-question.svg')}}" alt="icon" /></a>
				</p>
			</div>
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
				Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
						src="{{asset('assets/images/icons/message-question.svg')}}" alt="icon" /></a>
			</p>
		</div>
	</section>
	<section id="Up-to-date" class="w-full flex justify-center mt-[70px] py-[50px] bg-[#F9F9FC] px-4 xl:px-0">
		<div class="max-w-[1130px] w-full mx-auto flex flex-col gap-[30px]">
			<div class="flex justify-between items-center">
				<h2 class="font-bold text-[26px] leading-[39px]">
					Other News You <br />
					Might Be Interested
				</h2>
			</div>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px] w-full">

                @forelse($articles as $article)
                <a href="{{route('front.details', $article->slug)}}" class="card">
                    <div
                        class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#0285b5] rounded-[20px] overflow-hidden bg-white">
                        <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
                            <div
                                class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
                                <p class="text-xs leading-[18px] font-bold uppercase">{{$article->category->name}}</p>
                            </div>
                            <img src="{{Storage::url($article->thumbnail)}}" alt="thumbnail photo"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="flex flex-col gap-[6px]">
                            <h3 class="text-lg leading-[27px] font-bold">{{$article->name}}</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">{{$article->created_at->format('M d, Y')}}</p>
                        </div>
                    </div>
                </a>
                @empty
				<div class="col-span-1 md:col-span-2 lg:col-span-3 flex flex-col items-center justify-center gap-3 p-10 bg-[#F9F9FC] rounded-[20px] ring-1 ring-[#EEF0F7] text-center w-full">
					<div class="w-16 h-16 flex items-center justify-center bg-white rounded-full shrink-0 shadow-sm border border-[#EEF0F7]">
						<svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M22 10V15C22 20 20 22 15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H14" stroke="#A3A6AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M22 10H18C15 10 14 9 14 6V2L22 10Z" stroke="#A3A6AE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<div class="flex flex-col gap-1">
						<p class="font-bold text-lg">Belum Ada Artikel Lain</p>
						<p class="text-sm text-[#A3A6AE]">Belum ada artikel tambahan yang bisa ditampilkan saat ini.</p>
					</div>
				</div>
                @endforelse
			</div>
		</div>
	</section>
</body>

@endsection

@push('after-styles')
		<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
	    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
@endpush

@push('after-scripts')
        <script src="js/two-lines-text.js"></script>
@endpush