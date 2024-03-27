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
                    <form action="/dashboard" method="POST" class="grid justify-center p-2">
                        @csrf
                        <h2 class="font-semibold text-xl text-center tracking-wide mb-1">Form Tambah Murid</h2>
                        <span class="border border-black w-[190px] mx-auto mb-10"></span>
                        <div class="border p-10 rounded-md shadow bg-gray-50">
                            <div class="flex items-center justify-center w-full gap-10">
                                <div class="text-center">
                                    <label for="name" class="font-semibold">Name</label><br>
                                    <input type="text" id="name" name="name" class="py-1.5 mt-2 rounded-lg placeholder:text-sm placeholder:text-black/40" placeholder="Input name"><br>
                                </div>

                                <div class="text-center">
                                    <label for="alamat" class="font-semibold">Address</label><br>
                                    <input type="text" id="alamat" name="alamat" class="py-1.5 mt-2 rounded-lg placeholder:text-sm placeholder:text-black/40" placeholder="Input address"><br>
                                </div>
                            </div>

                            <div class="grid justify-center mt-5">
                                <div class="text-center">
                                    <label for="umur"  class="font-semibold">Age</label><br>
                                    <input type="number" id="umur" name="umur" class="py-1.5 mt-2 rounded-lg placeholder:text-sm placeholder:text-black/40" placeholder="Input age"><br><br>
                                </div>

                                <input type="submit" value="Daftar" name="daftar" class="p-2 mt-2 border border-black/50 bg-sky-300 text-white font-semibold text-lg rounded-lg hover:bg-sky-400 active:scale-95">
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="py-2 px-5 bg-green-400 w-full rounded-sm mt-3">
                                <p class="text-lg font-semibold text-white text-center">Success</p>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="py-2 px-5 bg-red-600 w-full rounded-sm mt-3">
                                <p class="text-lg font-semibold text-white text-center">Failed</p>
                            </div>
                        @endif
                    </form>

                    <!-- Show All data -->
                    <table class="table-fixed w-full mt-20 border">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr class="">
                                <th class="p-5 border-b text-sm font-semibold tracking-wide text-left">No</th>
                                <th class="p-5 border-b text-sm font-semibold tracking-wide text-left">Nama</th>
                                <th class="p-5 border-b text-sm font-semibold tracking-wide text-left">Alamat</th>
                                <th class="p-5 border-b text-sm font-semibold tracking-wide text-left">Umur</th>
                                <th class="p-5 border-b text-sm font-semibold tracking-wide text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $s)
                             <tr class="bg-slate-50/30">
                                <td class="p-5 border-b text-sm text-gray-700">{{$s->id}}</td>
                                <td class="p-5 border-b text-sm text-gray-700">{{$s->name}}</td>
                                <td class="p-5 border-b text-sm text-gray-700">{{$s->alamat}}</td>
                                <td class="p-5 border-b text-sm text-gray-700">{{$s->umur}}</td>
                                <td class="p-5 border-b text-sm text-gray-700 flex gap-5">
                                    <div class="border py-1 px-3 rounded-md bg-red-600 text-white font-semibold hover:bg-red-700 active:scale-90">
                                        <form action="/dashboard/{{ $s->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Hapus</button>
                                        </form>
                                    </div>

                                    <div class="border py-1 px-3 rounded-md bg-yellow-400 text-white font-semibold hover:bg-yellow-500 active:scale-90">
                                        <a href="/dashboard/student/edit/{{ $s->id }}">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                             </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
