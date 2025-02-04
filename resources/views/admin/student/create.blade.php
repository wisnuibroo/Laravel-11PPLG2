<x-layout-admin>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a New Student</h2>
            <form action="/admin/student/store" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter student name" required>
                    </div>

                    <!-- Grade/Class Dropdown -->
                    <div>
                        <label for="grade_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade/Class</label>
                        <select id="grade_id" name="grade_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <option value="" disabled selected>Select grade</option>
                            @foreach($grades as $grade)
                                <option value="{{ $grade->id }}" data-department="{{ $grade->department->name }}" data-department-id="{{ $grade->department->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:col-span-1">
                        <label for="department_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                        <input type="text" id="department_name" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-not-allowed" readonly>

                        <!-- Hidden input untuk menyimpan department_id -->
                        <input type="hidden" name="department_id" id="department_id">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter email address" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter student address" required></textarea>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-6 py-3 mt-6 sm:mt-8 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-700 transition duration-300 ease-in-out">
                    Add Student
                </button>
            </form>
        </div>
    </section>

    <!-- JavaScript untuk Auto-fill Department -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let gradeSelect = document.getElementById("grade_id");
            let departmentNameInput = document.getElementById("department_name");
            let departmentIdInput = document.getElementById("department_id");

            gradeSelect.addEventListener("change", function () {
                let selectedOption = gradeSelect.options[gradeSelect.selectedIndex];
                let departmentName = selectedOption.getAttribute("data-department");
                let departmentId = selectedOption.getAttribute("data-department-id");

                if (departmentName && departmentId) {
                    departmentNameInput.value = departmentName;  // Tampilkan nama department
                    departmentIdInput.value = departmentId;  // Simpan id department untuk form submission
                }
            });
        });
    </script>
</x-layout-admin>
