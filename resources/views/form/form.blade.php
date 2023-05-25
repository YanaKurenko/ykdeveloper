@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="flex flex-col justify-center items-center pt-2">
            <h1 class=" mb-4 text-2xl max-w-[400px] mx-auto text-center font-extrabold leading-none tracking-tight
             text-gray-900 md:text-3xl lg:text-4xl">
                Возникли вопросы, нужна помощь в разработке?</h1>
            <p class="mb-6 text-lg w-full mx-auto break-all text-center font-normal text-gray-800 lg:text-xl sm:px-16 xl:px-48">
                Свяжитесь со
                мной</p>

            <form action="/ask" method="post" class="w-full max-w-lg my-2 px-6">
                @csrf
                <div class="relative z-0 mb-4 group">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Имя</label>
                    <input type="text" id="base-input" name="name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900">Электронная
                    почта</label>
                <div class="relative z-0 mb-4 group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                    </div>
                    <input type="text" id="email-address-icon" name="email"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                           placeholder="name@flowbite.com">
                </div>
                <div class="relative z-0 mb-4 group">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Ваше сообщение</label>
                    <textarea id="message" name="message" rows="4"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Оставьте сообщение"></textarea>
                </div>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
