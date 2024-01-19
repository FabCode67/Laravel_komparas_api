<!-- resources/views/home.blade.php -->

@extends('dashboard')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div>
    <div class="w-full flex justify-between">
        <div class="users flex flex-col w-fit rounded-md shadow p-1 px-2">
            <div class="users__day text-sm font-bold">Total Shops</div>
            <div class="users__users text-sm font-medium text-blue-700 flex justify-center items-center text-center">
                {{$shops->count()}}
        </div>
        </div>
        <div class="users__list flex rounded-md space-x-3">
            <button class="shadow px-6">
                Export
            </button>
            <button class="shadow px-6 ">
                Print
            </button>
            <button class="shadow px-6">
                Add New Shop
            </button>
        </div>
    </div>
    <div class="users__table flex flex-col w-full rounded-md py-2 mt-2">
        <table class="w-full rounded-md">
            <thead class="w-full bg-slate-200 rounded-md">
                <tr class="w-full shadow-sm rounded-md">
                    <th class="w-[10%] text-sm font-bold text-start py-3 px-2">No</th>
                    <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Name</th>
                    <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Description</th>
                    <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Email</th>
                    <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Phone</th>
                    <th class="w-[10%] text-sm font-bold text-start py-3 px-2">Location</th>
                    <th class="w-[10%] text-sm font-bold text-start py-3 px-2">Action</th>
                </tr>
            </thead>
            <tbody class="w-full mt-3">
                @foreach($shops as $shop)
                <tr class="w-full mt-3 shadow-sm">
                    <td class="w-[10%] text-sm font-medium py-4 px-2">
                        {{$shop->id}}
                    </td>
                    <td class="w-[20%] text-sm font-medium py-4 px-2">
                        {{$shop->name}}
                    </td>
                    <td class="w-[20%] text-sm font-medium py-4 px-2">
                        {{$shop->description}}
                    </td>
                    <td class="w-[20%] text-sm font-medium py-4 px-2">
                        {{$shop->email}}
                    </td>
                    <td class="w-[20%] text-sm font-medium py-4 px-2">
                        {{$shop->phone}}
                    </td>
                    <td class="w-[20%] text-sm font-medium py-4 px-2">
                        {{$shop->location}}
                    </td>
                    <td class="w-[10%] text-sm font-medium py-4 px-2">
                        <div class="flex flex-row justify-between items-center">
                            <!-- Add a form for deletion with AJAX handling -->
                            <form class="delete-shop-form" action="{{ url('api/shops/' . $shop->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-shop-btn shadow px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fillRule="evenodd"
                                            d="M5.293 3.293a1 1 0 011.414 0L10 7.586l3.293-3.293a1 1 0 111.414 1.414L11.414 9l3.293 3.293a1 1 0 01-1.414 1.414L10 10.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 9 5.293 5.707a1 1 0 010-1.414z"
                                            clipRule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add JavaScript code for AJAX handling -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-shop-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', async function () {
                const form = this.closest('.delete-shop-form');
                if (form) {
                    const url = form.action;
                    try {
                        const response = await fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                        });
                        const data = await response.json();
                        if (data.message) {
                            alert('The product has been deleted.');
                            const productRow = this.closest('tr');
                            productRow.remove();

                        } else {
                            alert('An error occurred while deleting the product.');
                        }
                    } catch (error) {
                        alert(error)
                    }
                }
            });
        });
    });
</script>

@endsection