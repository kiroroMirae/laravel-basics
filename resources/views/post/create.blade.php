
@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('post.store', ['user' => auth()->user()->id]) }}" enctype="multipart/form-data" class="bg-white w-6/12 overflow-hidden shadow-sm sm:rounded-lg px-[20px] py-[16px] ">
                @csrf
                <div class="flex w-full justify-between items-center">
                    <div class="py-6 text-gray-900 font-[600] text-[20px]">
                       Create Post
                    </div>
                </div>

                <div class="flex flex-col gap-y-[15px]">
                    <div class="flex justify-between items-center">
                        <p class="font-[600] text-[16px] w-3/12">
                            Image
                        </p>
                        <input required type="file" name="poster" id="" class="w-9/12 rounded-[5px]">
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-[600] text-[16px] w-3/12">
                            Title
                        </p>
                        <div class="flex flex-col w-9/12 ">
                            <input required type="text" name="title" value="{{ old('title') }}" id="" class="rounded-[5px]">
                            @error('title')
                                <p class="mt-1 text-[16px] text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-[600] text-[16px] w-3/12">
                            Desc
                        </p>
                        <div class="flex flex-col w-9/12 ">
                            <input required type="text" name="desc" value="{{ old('desc') }}" id="" class=" rounded-[5px]">
                            @error('desc')
                                <p class="mt-1 text-[16px] text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-[600] text-[16px] w-3/12">
                            Author
                        </p>
                        <div class="flex flex-col w-9/12 ">
                            <input required type="text" name="author" value="{{ old('author') }}" id="" class="rounded-[5px]">
                            @error('author')
                                <p class="mt-1 text-[16px] text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-[600] text-[16px] w-3/12">
                            Category
                        </p>
                        <select required name="category_id" class="py-3 px-4 pe-9 block w-9/12 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
                            <option selected="" disabled>Open this select menu</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-[600] text-[16px] w-3/12">
                            Status
                        </p>
                        <select required name="status_id" class="capitalize py-3 px-4 pe-9 block w-9/12 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
                            <option selected="" disabled>Open this select menu</option>
                            @foreach ($statuses as $item)
                                <option value="{{ $item->id }}" class="capitalize" >{{ $item->name }}</option>
                            @endforeach
                          </select>
                    </div>
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
