@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8 bg-gray-100 min-h-screen">
        <!-- Success/Error Messages -->
        <div id="notification" class="fixed top-4 right-4 z-50 hidden">
            <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg" id="notificationContent">
                <!-- Message will be inserted here -->
            </div>
        </div>
        <!-- Header with Back Button and Add Class Button -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-200 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Back to Dashboard</span>
                </a>
                <h1 class="text-3xl font-bold text-gray-800">Manage Classes</h1>
            </div>
            <button id="addClassBtn"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-200 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>Add New Class</span>
            </button>
        </div>

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                <div class="flex-1 mr-4">
                    <input type="text" id="searchClasses" placeholder="Search classes..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="flex space-x-2">
                    <select id="gradeFilter"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">All Grades</option>
                        <option value="1">Grade 1</option>
                        <option value="2">Grade 2</option>
                        <option value="3">Grade 3</option>
                        <option value="4">Grade 4</option>
                        <option value="5">Grade 5</option>
                    </select>
                    <button id="clearFilters"
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg transition">Clear</button>
                </div>
            </div>
        </div>

        <!-- Classes Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Class
                                Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Teacher</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Students</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody id="classesTableBody" class="bg-white divide-y divide-gray-200">
                        <!-- Sample data - replace with dynamic data from controller -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Mathematics A</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Grade
                                    3</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mr. John Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">25
                                    Students</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jan 15, 2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 edit-class" data-id="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="text-green-600 hover:text-green-900 view-class" data-id="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-900 delete-class" data-id="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">English Literature
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Grade
                                    4</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ms. Sarah Johnson</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">28
                                    Students</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Feb 20, 2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 edit-class" data-id="2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="text-green-600 hover:text-green-900 view-class" data-id="2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-900 delete-class" data-id="2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <!-- Add more sample rows as needed -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="flex-1 flex justify-between sm:hidden">
                    <a href="#"
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
                    <a href="#"
                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">Showing <span class="font-medium">1</span> to <span
                                class="font-medium">10</span> of <span class="font-medium">97</span> results</p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                            <a href="#"
                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Previous</a>
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                            <a href="#"
                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Next</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add/Edit Class Modal -->
        <div id="classModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900" id="modalTitle">Add New Class</h3>
                        <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form id="classForm">
                        @csrf
                        <input type="hidden" id="classId" name="classId">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="className">Class Name</label>
                            <input type="text" id="className" name="name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter class name" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="classGrade">Grade</label>
                            <select id="classGrade" name="grade"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                                <option value="">Select Grade</option>
                                <option value="1">Grade 1</option>
                                <option value="2">Grade 2</option>
                                <option value="3">Grade 3</option>
                                <option value="4">Grade 4</option>
                                <option value="5">Grade 5</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="classTeacher">Teacher</label>
                            <select id="classTeacher" name="teacher_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Select Teacher</option>
                                @if(isset($teachers))
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                @else
                                    <option value="1">Mr. John Smith</option>
                                    <option value="2">Ms. Sarah Johnson</option>
                                    <option value="3">Dr. Michael Brown</option>
                                @endif
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2"
                                for="classDescription">Description</label>
                            <textarea id="classDescription" name="description" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter class description"></textarea>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" id="cancelBtn"
                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200">Cancel</button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">Save
                                Class</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for CRUD Operations -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('classModal');
            const addClassBtn = document.getElementById('addClassBtn');
            const closeModal = document.getElementById('closeModal');
            const cancelBtn = document.getElementById('cancelBtn');
            const classForm = document.getElementById('classForm');
            const modalTitle = document.getElementById('modalTitle');
            const searchInput = document.getElementById('searchClasses');
            const gradeFilter = document.getElementById('gradeFilter');
            const clearFilters = document.getElementById('clearFilters');

            let isEditMode = false;
            let currentClassId = null;

            // Notification function
            function showNotification(message, type = 'success') {
                const notification = document.getElementById('notification');
                const notificationContent = document.getElementById('notificationContent');

                // Set message
                notificationContent.textContent = message;

                // Set background color based on type
                notificationContent.className = type === 'success'
                    ? 'bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg'
                    : 'bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg';

                // Show notification
                notification.classList.remove('hidden');

                // Auto-hide after 3 seconds
                setTimeout(() => {
                    notification.classList.add('hidden');
                }, 3000);
            }

            // Open modal for adding new class
            addClassBtn.addEventListener('click', function () {
                isEditMode = false;
                modalTitle.textContent = 'Add New Class';
                classForm.reset();
                modal.classList.remove('hidden');
            });

            // Close modal
            function closeModalFunction() {
                modal.classList.add('hidden');
                classForm.reset();
                isEditMode = false;
                currentClassId = null;
            }

            closeModal.addEventListener('click', closeModalFunction);
            cancelBtn.addEventListener('click', closeModalFunction);

            // Close modal when clicking outside
            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    closeModalFunction();
                }
            });

            // Handle form submission
            classForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(classForm);

                // Add CSRF token
                formData.append('_token', document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}');

                const submitBtn = classForm.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Saving...';
                submitBtn.disabled = true;

                let url, method;

                if (isEditMode) {
                    // Update existing class
                    url = `{{ route('admin.classes.index') }}/${currentClassId}`;
                    method = 'PUT';
                    formData.append('_method', 'PUT');
                } else {
                    // Create new class
                    url = '{{ route('admin.classes.store') }}';
                    method = 'POST';
                }

                fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Show success message
                            showNotification(data.message || 'Class saved successfully!', 'success');

                            // Close modal
                            closeModalFunction();

                            // Refresh the page to show new data
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } else {
                            // Show error message
                            showNotification(data.message || 'An error occurred while saving the class.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('An error occurred while saving the class.', 'error');
                    })
                    .finally(() => {
                        // Re-enable submit button
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    });
            });

            // Handle edit buttons
            document.addEventListener('click', function (e) {
                if (e.target.closest('.edit-class')) {
                    const classId = e.target.closest('.edit-class').dataset.id;
                    isEditMode = true;
                    currentClassId = classId;
                    modalTitle.textContent = 'Edit Class';

                    // Load class data (replace with actual data loading)
                    // For demo purposes, using static data
                    if (classId === '1') {
                        document.getElementById('className').value = 'Mathematics A';
                        document.getElementById('classGrade').value = '3';
                        document.getElementById('classTeacher').value = '1';
                        document.getElementById('classDescription').value = 'Advanced mathematics for grade 3 students';
                    }

                    modal.classList.remove('hidden');
                }

                if (e.target.closest('.delete-class')) {
                    const classId = e.target.closest('.delete-class').dataset.id;
                    if (confirm('Are you sure you want to delete this class?')) {
                        // Create form data for DELETE request
                        const formData = new FormData();
                        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                        formData.append('_method', 'DELETE');

                        fetch(`{{ route('admin.classes.index') }}/${classId}`, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    showNotification(data.message || 'Class deleted successfully!', 'success');
                                    // Refresh the page to show updated data
                                    setTimeout(() => {
                                        window.location.reload();
                                    }, 1000);
                                } else {
                                    showNotification(data.message || 'An error occurred while deleting the class.', 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                showNotification('An error occurred while deleting the class.', 'error');
                            });
                    }
                }

                if (e.target.closest('.view-class')) {
                    const classId = e.target.closest('.view-class').dataset.id;
                    console.log('Viewing class:', classId);
                    // Add your view logic here (redirect to class details page)
                }
            });

            // Search functionality
            searchInput.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();
                filterTable();
            });

            // Grade filter functionality
            gradeFilter.addEventListener('change', function () {
                filterTable();
            });

            // Clear filters
            clearFilters.addEventListener('click', function () {
                searchInput.value = '';
                gradeFilter.value = '';
                filterTable();
            });

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedGrade = gradeFilter.value;
                const rows = document.querySelectorAll('#classesTableBody tr');

                rows.forEach(row => {
                    const className = row.cells[0].textContent.toLowerCase();
                    const grade = row.cells[1].textContent.includes('Grade') ? row.cells[1].textContent.match(/\d+/)[0] : '';

                    const matchesSearch = className.includes(searchTerm);
                    const matchesGrade = !selectedGrade || grade === selectedGrade;

                    if (matchesSearch && matchesGrade) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endsection