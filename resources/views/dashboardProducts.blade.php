<!-- resources/views/about.blade.php -->

@extends('dashboard')

@section('content')
<div class="w-full flex justify-between">
            <div class="users flex flex-col w-fit rounded-md shadow p-1 px-2">
                <div class="users__day text-sm font-bold">Total Products</div>
                <div class="users__users text-sm font-medium text-blue-700 flex justify-center items-center text-center">1000</div>
            </div>
            <div class="users__list flex rounded-md space-x-3">
                <button class="shadow px-6">
                    Export
                </button>
                <button class="shadow px-6 ">
                    Print
                </button>
                <button class="shadow px-6" >
                    Add New Product
                </button>
            </div>
        </div><div class="users__table flex flex-col w-full rounded-md py-2 mt-2">
                <table class="w-full rounded-md">
                    <thead class="w-full bg-slate-200 rounded-md">
                        <tr class="w-full shadow-sm rounded-md">
                            <th class="w-[10%] text-sm font-bold text-start py-3 px-2">No</th>
                            <th class="w-[10%] text-sm font-bold text-start py-3 px-2">Image</th>
                            <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Name</th>
                            <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Description</th>
                            <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Category</th>
                            <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Price</th>
                            <th class="w-[10%] text-sm font-bold text-start py-3 px-2">Action</th>
                        </tr>
                    </thead>

                    <tbody class="w-full mt-3">
                        @foreach($products as $product)
                            <tr class="w-full mt-3 shadow-sm">
                                <td class="w-[10%] text-sm font-medium py-2 px-2">
                                    {{$product->id}}
                                </td>
                                <td class="w-[10%] text-sm font-medium py-2 px-2">
                                    <div class="w-[50px] h-[50px] rounded-full bg-gray-400">
                                        <img 
                                        src="{{ $product->image }}"
                                        
                                            alt="product" class="w-full h-full rounded-sm object-cover" />
                                    </div>
                                </td>
                                <td class="w-[20%] text-sm font-medium py-2 px-2">
                                    {{$product->name}}
                                </td>
                                <td class="w-[20%] text-sm font-medium py-2 px-2">
                                    {{$product->description}}
                                </td>
                                <td class="w-[20%] text-sm font-medium py-2 px-2">
                                    {{$product->category}}
                                </td>
                                <td class="w-[20%] text-sm font-medium py-2 px-2">
                                    {{$product->price}}
                                </td>
                                <td class="w-[10%] text-sm font-medium py-2 px-2">
                                    <div class="flex flex-row justify-between items-center">
                                        <button class="shadow px-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path fillRule="evenodd" d="M10.707 3.293a1 1 0 00-1.414 0L3 9.586V17h6v-2a1 1 0 011-1h2a1 1 0 011 1v2h6v-7.414l-6.293-6.293zM12 10a2 2 0 100-4 2 2 0 000 4z" clipRule="evenodd" />
                                            </svg>
                                        </button>
                                        <button class="shadow px-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path fillRule="evenodd" d="M10.707 3.293a1 1 0 00-1.414 0L3 9.586V17h6v-2a1 1 0 011-1h2a1 1 0 011 1v2h6v-7.414l-6.293-6.293zM12 10a2 2 0 100-4 2 2 0 000 4z" clipRule="evenodd" />
                                            </svg>
                                        </button>
                                        <button class="shadow px-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path fillRule="evenodd" d="M13.707 3.293a1 1 0 00-1.414 0L4 11.586V16h4.414l8.293-8.293a1 1 0 000-1.414L13.707 3.293zM6 14.414V12h2.414L15.707 6.707l-2.293-2.293L6 9.586v4.828zM13.586 5L15 6.414 16.586 5 15 3.414 13.586 5z" clipRule="evenodd" />
                                            </svg>
                                        </button>
                                        <button
                                            class="shadow px-2"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                                <path fillRule="evenodd" d="M5.293 3.293a1 1 0 011.414 0L10 7.586l3.293-3.293a1 1 0 111.414 1.414L11.414 9l3.293 3.293a1 1 0 01-1.414 1.414L10 10.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 9 5.293 5.707a1 1 0 010-1.414z" clipRule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
@endsection
