<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <!-- Tombol Add Grade -->
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-start md:space-x-3 flex-shrink-0">
                    <a href="{{ route('admin.grades.create') }}" class="flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                        </svg>
                        Add Grade
                    </a>
                </div>

                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search..." required />
                        </div>
                    </form>
                </div>

                <!-- Tabel Grades -->
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">No</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Kelas</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Department</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Student List</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grades as $grade)
                                <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $grade->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $grade->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $grade->department->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        @foreach ($grade->students as $student)
                                            <ul>
                                                <li>{{ $student->nama }}</li>
                                            </ul>
                                        @endforeach
                                    </td>

                                    <td class="px-6 py-4 flex space-x-3">
                                        <button id="modalDetail" class="modalDetailBtn" data-nama="{{ $grade ->name }}" data-department="{{ $grade->department->name}}" data-studentlist="{{$student->nama}}" data-modal-target="readGradeModal" data-modal-toggle="readGradeModal" type="button">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="1" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                <path stroke="currentColor" stroke-width="1" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </button>

                                        <button id="deleteButton" data-id="{{ $grade ->id }}" class="text-red-600 hover:text-red-800">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
        aria-label="Table navigation">
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
            Showing
            <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
            of
            <span class="font-semibold text-gray-900 dark:text-white">1000</span>
        </span>
        <ul class="inline-flex items-stretch -space-x-px">
            <li>
                <a href="#"
                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
            </li>
            <li>
                <a href="#" aria-current="page"
                    class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>

            <div id="readGradeModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <dl>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Kelas</dt>
                        <dd id="modalName" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>

                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Department</dt>
                        <dd id="modalDepartment" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>

                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Student List</dt>
                        <dd id="modalStudentList" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>
                    </dl>
                </div>
            </div>
          </div>

          <div id="deleteModal" class="fixed inset-0 z-50 hidden flex justify-center items-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                <h3 class="text-lg font-semibold text-gray-800">Apakah anda yakin untuk menghapus data Department?</h3>
                <p class="text-sm text-gray-600 mt-2">Data tidak bisa dikembalikan setelah dihapus.</p>
                <div class="mt-4 flex justify-end space-x-4">
                    <!-- Tombol Cancel -->
                    <button id="cancelDelete" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Batal</button>
                    <!-- Tombol Confirm -->
                    <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Hapus</button>
                </div>
            </div>
        </div>

        <!-- Form for DELETE Request -->
    <form id="deleteForm" action="/admin/grade/delete/{{ $grade->id }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

    </div>

        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("default-search");

            searchInput.addEventListener("keyup", function() {
                let filter = searchInput.value.toLowerCase();
                let rows = document.querySelectorAll("tbody tr");

                rows.forEach(row => {
                    let name = row.cells[1].textContent.toLowerCase();
                    let department = row.cells[2].textContent.toLowerCase();
                    let nama = row.cells[3].textContent.toLowerCase();

                    if (name.includes(filter) || department.includes(filter) || nama.includes(filter)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            });
        });



        //script untuk detail modal
        document.addEventListener("DOMContentLoaded", function(event) {
            // document.getElementById('modalDetail').click();
            // Ambil semua tombol dengan kelas .modalDetailBtn
            const modalDetailBtns = document.querySelectorAll('.modalDetailBtn');

            // Ambil modal dan elemen-elemen dalam modal untuk diisi
            const modal = document.getElementById('readGradeModal');
            const modalName = document.getElementById('modalName');
            const modalDepartment = document.getElementById('modalDepartment');
            const modalStudentList = document.getElementById('modalStudentList');

            modalDetailBtns.forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil data dari atribut data-* pada tombol yang diklik
                    const name = button.getAttribute('data-nama');
                    const department = button.getAttribute('data-department');
                    const studentlist = button.getAttribute('data-studentlist');

                    // Isi modal dengan data yang diambil
                    modalName.textContent = name;
                    modalDepartment.textContent = department;
                    modalStudentList.textContent = studentlist;


                    // Tampilkan modal
                    modal.classList.remove('hidden');
                });
            });

            // Menutup modal jika klik di luar area modal
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });

         // Script untuk modal delete
    // Ambil elemen modal dan tombol delete
    const deleteModal = document.getElementById('deleteModal');
        const deleteButtons = document.querySelectorAll('#deleteButton'); // Semua tombol delete
        const confirmDeleteButton = document.getElementById('confirmDelete');
        const cancelDeleteButton = document.getElementById('cancelDelete');

        // Variabel untuk menyimpan ID grade yang ingin dihapus
        let gradeIdToDelete = null;

        // Loop melalui semua tombol delete
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Menyimpan ID grade yang ingin dihapus
                gradeIdToDelete = button.getAttribute('data-id');
                // Menampilkan modal
                deleteModal.classList.remove('hidden');
            });
        });

        // Ketika tombol cancel ditekan
        cancelDeleteButton.addEventListener('click', function () {
            // Menutup modal tanpa menghapus data
            deleteModal.classList.add('hidden');
        });

        // Ketika tombol confirm ditekan
        confirmDeleteButton.addEventListener('click', function () {
            if (gradeIdToDelete) {
                // Mengisi form action dengan ID grade
                const form = document.getElementById('deleteForm');
                form.action = '/admin/grade/delete/' + gradeIdToDelete;

                // Submit form untuk menghapus data
                form.submit();
            }

    });

    </script>

</x-layout-admin>
