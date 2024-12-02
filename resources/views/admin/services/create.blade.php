<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight">
            {{ __('New Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg"> 

                @if ($errors->any())                
                    @foreach ($errors->all() as $error)
                        <div class="py-3 w-full rounded-3-xl bg-red-500 text-white">
                            {{$error}}
                        </div>
                    @endforeach                                                    
                @endif
                
                <form method="POST" action="{{route('admin.services.store')}}" enctype="multipart/form-data"> 
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="subtitle" :value="__('subtitle')" />
                        <textarea name="subtitle" id="subtitle" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full"></textarea>
                        <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('logo')" />
                        <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" required autofocus autocomplete="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{route('admin.services.index')}}" class="font-bold py-4 mr-4 px-6 bg-red-500 text-white rounded-full">
                            Cancel
                        </a>
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Service
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
