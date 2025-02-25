
@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('category.update', ['postCategory' => $postCategory->id]) }}" method="POST" class="bg-white w-6/12 overflow-hidden shadow-sm sm:rounded-lg px-[20px] py-[16px] ">
                @csrf
                @method('PUT')
                <div class="flex w-full justify-between items-center">
                    <div class="py-6 text-gray-900 font-[600] text-[20px]">
                       Edit Category
                    </div>
                </div>

                <div class="flex flex-col gap-y-[15px]">
                    <div class="flex justify-between items-center">
                        <p class="font-[600] text-[16px] w-3/12">
                            Name
                        </p>
                        <input type="text" name="name" value="{{ $postCategory->name }}" id="" class="w-9/12 rounded-[5px]">
                    </div>
                    @error('name')
                        <p class="mt-1 text-[16px] text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex gap-x-[15px] w-full mt-[15px]">
                    <button class="bg-gray-300 text-[12px]  py-[10px] rounded-[5px] w-full">
                        Cancel
                    </button>
                    <button class="bg-blue-500 text-[12px] text-white py-[10px] rounded-[5px] w-full">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
