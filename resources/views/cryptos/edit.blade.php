<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DEPOSITS') }}
        </h2>
    </x-slot>

    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-5">
            <!-- FORM -->
            <div class="grid grid-cols-1 mt-3 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create new crypto</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Create a crypto for users to associate with a
                        deposit</p>
                </div>

                <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" method="POST">
                    @csrf
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="name"
                                       class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="name" id="name"
                                           class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                           placeholder="Bitcoin" value="{{ $crypto->name }}">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="acronym"
                                       class="block text-sm font-medium leading-6 text-gray-900">Acronym</label>
                                <input type="text" name="acronym" id="acronym"
                                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                       value="{{ $crypto->acronym }}" placeholder="BTC">
                            </div>

                            <div class="sm:col-span-2">
                                <label for="logo_url"
                                       class="block text-sm font-medium leading-6 text-gray-900">Logo URL</label>
                                <input type="url" name="logo_url" id="logo_url"
                                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                       value="{{ $crypto->logo }}" placeholder="https://logos.com/logohere">
                                <p class="mt-0.5 text-sm leading-6 text-gray-600">You can find crypto logos <a
                                        href="https://cryptologos.cc/" class="text-blue-500 hover:text-blue-700"
                                        target="_blank">here</a>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <a href="{{ route('cryptos.index') }}">
                            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        </a>
                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


