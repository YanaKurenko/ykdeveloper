@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-center h-full">
        <div class="flex items-center justify-center">
            @foreach ($variables as $variable )
                <div class="p-4 hidden md:block">
                    <img class="rounded-full w-90 h-96" src="{{ asset('images/'.$variable->image) }}" alt="Photo">
                </div>
                <div class="p-4 md:w-1/2">
                    <h2 class="text-2xl font-extrabold md:text-4xl">{{ $variable -> title }}</h2>
                    <p class="my-4 text-lg text-gray-500">{{ $variable -> desc }}</p>
                    <button type="button"
                            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        <a href="{{ route('download', ['filename' => 'cvRus.pdf']) }}">
                            Скачать резюме
                        </a>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
