<x-dashboard.layout :title="$title">
  <h1 class="text-3xl font-bold text-gray-100">{{ $title }}</h1>
  <livewire:users-table />
  {{-- Modal --}}
  <div>
    {{-- Add User Modal --}}
    <div id="add-modal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black/30 backdrop-blur md:inset-0">
      <div class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              Tambah Member Baru
            </h3>
            <button type="button" class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
              data-modal-toggle="add-modal">
              <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <form class="p-4 md:p-5" method="POST" action="{{ route('add member') }}">
            @csrf
            <div class="space-y-4">
              <div>
                <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                <input type="text" name="name" id="name"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                  placeholder="Udin Petot" required>
              </div>
              <div class="flex gap-4">
                <div>
                  <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                  <input type="email" name="email" id="email"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                    placeholder="udinpetot@gmail.com" required>
                </div>
                <div>
                  <label for="phone_number" class="mb-2 block appearance-none text-sm font-medium text-gray-900 dark:text-white">No. HP</label>
                  <input type="number" name="phone_number" id="phone_number"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                    placeholder="081212121212" required>
                </div>
              </div>
              <div>
                <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <input type="text" name="address" id="address"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                  placeholder="Jl. Pak Benceng" required>
              </div>
              <div>
                <label for="role" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <select id="role" name="role_id"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                  <option selected disabled>Pilih Role</option>
                  @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ Str::ucfirst($role->name) }}</option>
                  @endforeach
                </select>
              </div>
              <div class="flex justify-end">
                <button type="submit"
                  class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <svg class="-ms-1 me-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                  </svg>
                  <span>Tambahkan</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- Add User Modal --}}
    {{-- Delete Specific User Modal --}}
    {{-- Delete Specific User Modal --}}
    {{-- Delete All User Modal --}}
    <div id="delete-all-modal" tabindex="-1" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black/30 backdrop-blur md:inset-0">
      <div class="relative max-h-full w-full max-w-md p-4">
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
          <button type="button"
            class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="delete-all-modal">
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <form action="{{ route('delete all member') }}" method="POST" class="p-4 text-center md:p-5">
            @csrf
            @method('DELETE')
            <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin nih mau hapus semua data?</h3>
            <button type="submit" type="button" class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800">
              Yakin
            </button>
            <button data-modal-hide="delete-all-modal" type="button"
              class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
              Engga Jadi
            </button>
          </form>
        </div>
      </div>
    </div>
    {{-- Delete All User Modal --}}
  </div>
  {{-- Modal --}}
  {{-- Toast --}}
  @session('success')
    <div id="toast-success" class="fixed bottom-0 right-0 w-full max-w-xs rounded-lg bg-white p-4 text-gray-500 shadow dark:border-green-800 dark:bg-gray-800 dark:text-green-400" role="alert">
      <div class="flex items-center">
        <div class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200">
          <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
          </svg>
          <span class="sr-only">Check icon</span>
        </div>
        <span class="ms-3 text-sm font-normal">{{ $value }}</span>
      </div>
      <div class="absolute bottom-0 left-0 h-1 w-full bg-gray-200 dark:bg-gray-700">
        <div id="progress" class="h-1 bg-blue-600 dark:bg-blue-500" style="width: 45%"></div>
      </div>
    </div>
  @endsession
  {{-- Toast --}}
</x-dashboard.layout>