
@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-[20px] py-[16px] ">

                <div class="flex w-full justify-between items-center">
                    <div class=" text-gray-900">
                        Post Category List
                    </div>
                    <a href="{{ route('category.create') }}" class="bg-blue-400 text-white px-[16px] py-[10px] h-fit rounded-[8px]">
                        Create
                    </a>
                </div>

                <div class="py-[15px]">
                    <div class="border overflow-hidden rounded-[12px]">
                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-800 uppercase">Name</th>
                                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-800 uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 ">
                                @foreach ($postCategory as $category)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-black">
                                            {{ $category->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium ">
                                            <a href="{{ route('category.edit', ['postCategory' => $category->id]) }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                                                Edit
                                            </a>
                                            <button class="delete-btn pl-[5px] inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none"
                                                data-url="{{ route('category.destroy', ['postCategory' => $category->id]) }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();

        let deleteUrl = $(this).data('url');

        if (confirm('Are you sure you want to delete this category?')) {
            $.ajax({
                url: deleteUrl,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert('Category deleted successfully!');
                    location.reload(); // Refresh the page to reflect the changes
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                }
            });
        }
    });
});
</script>
@endsection
