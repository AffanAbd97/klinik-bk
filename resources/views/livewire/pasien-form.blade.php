<div class="col-span-1 bg-white rounded shadow p-6 dark:bg-gray-800 dark:border-gray-70" wire:debug>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <form wire:submit="save" class="space-y-8" >
        @csrf
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nomor Rekam
                Medis</label>
            <input type="text" id="email" readonly name="no_rm" value="{{ $pasien->no_rm }}"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                placeholder="">
                
        </div>
        <div>
            <label for="poli" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilih
                Poli</label>
            <select id="poli" name="poli"  wire:model.live="selectedPoli"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Pilih Poli</option>
                @forelse ($poli as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_poli }}</option>
                @empty
                    <option value="" @readonly(true)>Poli Kosong</option>
                @endforelse


            </select>
            @error('selectedPoli')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
        </div>

        <div>
            <label for="jadwal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilih
                jadwal</label>
            <select id="jadwal" name="jadwal" wire:model="jadwal"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Pilih Jadwal</option>
         
                @forelse ($jadwals as $item)
                    <option value="{{ $item->jadwal->id }}">{{ $item->jadwal->dokter->nama}} | {{ $item->jadwal->hari}}, {{ substr($item->jadwal->jam_mulai, 0, 5)}} - {{substr($item->jadwal->jam_selesai, 0, 5)}}</option>
                @empty
                    <option value="" @readonly(true)>Poli Kosong</option>
                @endforelse


            </select>
            @error('jadwal')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
        </div>

        <div class="sm:col-span-2">
            <label for="keluhan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">  Keluhan</label>
            <textarea id="keluhan" rows="6" wire:model="keluhan" name="keluhan"
                class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Keluhan yang Dirasakan"></textarea>
                @error('keluhan')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="w-full py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700  hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Kirim Keluhan</button>
    </form>

</div>
