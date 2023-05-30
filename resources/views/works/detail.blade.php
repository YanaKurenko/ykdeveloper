@extends('layouts.app')
@section('content')

    <div class="container">
        <div
            class="flex flex-col items-center justify-center px-8 py-8 mx-auto text-center">
            <div class="relative w-full">
                <button type="button"
                        class="absolute left-0 top-0 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    <a href="/works">Назад</a>
                </button>
                <h1 class="mb-4 text-2xl max-w-[400px] mx-auto break-all font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">{{ $work->name }}</h1>
                <p class="mb-6 text-lg w-full mx-auto break-all font-normal text-gray-800 lg:text-xl sm:px-16 xl:px-48">{{ $work->desc}}</p>
            </div>
            <div class="flex flex-col items-center justify-center w-full">
                <p class="mb-6 text-lg font-normal text-gray-500 row-start-2 col-start-2">
                    Цель: {{ $work->purepose}}</p>
                <div class="w-full text-right">
                    <p class="mb-6 text-lg font-normal text-gray-500">Дата
                        создания: {{ $work->created_at->format('d.m.Y')}}</p>
                </div>
            </div>
            @if($work->gallery->count() == 0)
                <div class="flex justify-center mx-auto items-center w-full h-96">
                    <p class="text-xl font-normal text-gray-500 text-center">Нет изображений</p>
                </div>
            @else
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                    @foreach(array_chunk($work->gallery->toArray(), ceil(count($work->gallery->toArray()) / 4)) as $index)
                        <div class="grid grid-cols-1 gap-4">
                            @foreach($index as $item)
                                <div>
                                    <img class="w-full rounded-lg h-full object-cover"
                                         src="{{ asset('images/' . $item['image']) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="flex w-full justify-between my-6">
                <p class="text-lg font-normal text-gray-500">
                    Раздел: {{$work->category->name}}</p>
                <p class="text-lg font-normal text-gray-500">
                    Обновлено: {{ $work->updated_at ->format('d.m.Y') }}</p>
            </div>
        </div>
    </div>

@endsection
