<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/update" method="POST" class="grid justify-center p-2">
                        @csrf
                        <input type="hidden" value="{{ $student->id }}" name="id">
                        <h2 class="font-semibold text-xl text-center tracking-wide mb-1">Form Update Murid</h2>
                        <span class="border border-black w-[190px] mx-auto mb-10"></span>
                        <div class="border p-10 rounded-md shadow bg-gray-50">
                            <div class="flex items-center justify-center w-full gap-10">
                                <div class="text-center">
                                    <label for="name" class="font-semibold">Name</label><br>
                                    <input type="text" id="name" value="{{ $student->name }}" name="name" class="py-1.5 mt-2 rounded-lg placeholder:text-sm placeholder:text-black/40" placeholder="Input name"><br>
                                </div>

                                <div class="text-center">
                                    <label for="alamat" class="font-semibold">Address</label><br>
                                    <input type="text" id="alamat" name="alamat" value="{{ $student->alamat }}"  class="py-1.5 mt-2 rounded-lg placeholder:text-sm placeholder:text-black/40" placeholder="Input address"><br>
                                </div>
                            </div>

                            <div class="grid justify-center mt-5">
                                <div class="text-center">
                                    <label for="umur"  class="font-semibold">Age</label><br>
                                    <input type="number" id="umur" name="umur" value="{{ $student->umur }}"  class="py-1.5 mt-2 rounded-lg placeholder:text-sm placeholder:text-black/40" placeholder="Input age"><br><br>
                                </div>

                                <input type="submit" value="Ubah" name="ubah" class="p-2 mt-2 border border-black/50 bg-sky-300 text-white font-semibold text-lg rounded-lg hover:bg-sky-400 active:scale-95">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
