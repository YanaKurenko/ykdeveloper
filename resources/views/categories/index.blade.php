@php use App\Http\Controllers\CategoryController; @endphp
@extends('layouts.app')
@section('content')
    <div class="container pb-6">
        <div class="flex justify-center items-center pt-2 pb-8">
            <div
                class="text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <a href="/works"
                           class="@if($selectedCategory == null) inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active
                       @else inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 @endif">Все
                            работы</a>
                    </li>
                    @foreach($categories as $category)
                        @if ($category->name == $selectedCategory)
                            <li class="mr-2">
                                <a href="/workByCategory/{{$category->id}}"
                                   class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active">{{ $category->name }}</a>
                            </li>
                        @else
                            <li class="mr-2">
                                <a href="/workByCategory/{{$category->id}}"
                                   class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 place-items-center">
            @foreach($works as $work)
                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    @if($work->gallery->count() < 2)
                        <div class="relative h-52 overflow-hidden rounded-lg bg-white">
                            <a href="@if($work->gallery->count() == 0) {{ asset('images/main.jpg') }}
                            @else {{ asset('images/'.$work->gallery->first()->image )}} @endif"
                               class="absolute block w-full h-full -translate-y-1/2 top-1/2"
                               data-fslightbox="gallery{{$work->id}}"
                               data-fslightbox-group="gallery{{$work->id}}"
                               data-fslightbox-caption="{{$work->name}}">
                                <img src="@if($work->gallery->count() == 0) {{ asset('images/main.jpg') }}
                            @else {{ asset('images/'.$work->gallery->first()->image )}} @endif"
                                     class="absolute block w-full -translate-y-1/2 top-1/2"
                                     alt="image">
                            </a>
                        </div>
                    @else
                        <div id="{{ $work->id }}" class="relative w-full" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="relative h-52 overflow-hidden rounded-lg bg-white">
                                @foreach(array_slice($work->gallery->toArray(), 0, 5) as $image)
                                    <div class="duration-700 ease-in-out" data-carousel-item>
                                        <a href="{{ asset('images/'.$image['image'] )}}"
                                           class="absolute block w-full h-full -translate-y-1/2 top-1/2"
                                           data-fslightbox="gallery{{$work['id']}}"
                                           data-fslightbox-group="gallery{{$work['id']}}"
                                           data-fslightbox-caption="{{$work['name']}}">
                                            <img src="{{ asset('images/'.$image['image'] )}}"
                                                 class="absolute block w-full -translate-y-1/2 top-1/2"
                                                 alt="{{$image['image']}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Slider indicators -->
                            <div class="absolute z-30 flex space-x-3 pt-2 -translate-x-1/2 left-1/2">
                                @foreach(array_slice($work->gallery->toArray(), 0, 5) as $image)
                                <button type="button" class="w-3 h-3 rounded-full"
                                        aria-current="{{ $loop->first ? 'true' : 'false' }}"
                                        data-carousel-slide-to="{{$loop->index + 1}}"></button>
                                @endforeach
                            </div>

                            <!-- Slider controls -->
                            <button type="button"
                                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
                            </button>
                            <button type="button"
                                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
                            </button>
                        </div>
                    @endif
                    <div class="p-5">
                        <a href="{{$work->shortDesc}}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$work->name}}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$work->shortDesc}}</p>
                        <div class="flex mx-auto">
                            <a href="{{url('show/' .$work->id)}}"
                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Подробнее
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            @foreach ($work->docs as $doc)
                                <a href="{{ route('download', ['filename' => $doc->path]) }}"
                                   class="inline-flex items-center ml-4 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Скачать
                                </a>
                            @endforeach
                            <p class="flex items-center text-gray-400 ml-4">
                                {{ $work->created_at->format('d.m.Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
