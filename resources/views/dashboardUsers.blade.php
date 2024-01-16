<!-- resources/views/home.blade.php -->

@extends('dashboard')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="users flex flex-col w-full min-h-screen h-fit p-4 mt-2">
    <div class="w-full flex justify-between">
        <div class="users flex flex-col w-fit rounded-md shadow p-1">
            <div class="users__day text-sm font-bold">Total Users</div>
            <div class="users__users text-sm font-medium text-blue-700 flex justify-center items-center text-center">
                1000</div>
        </div>
        <div class="users__list flex rounded-md space-x-3">
            <button class="shadow px-6">
                Export
            </button>
            <button class="shadow px-6 ">
                Print
            </button>
        </div>
    </div>
    <div class="users__table flex flex-col w-full rounded-md py-2 mt-2">
        <table class="w-full rounded-md">
            <thead class="w-full bg-slate-200 rounded-md">
                <tr class="w-full shadow-sm rounded-md">
                    <th class="w-[10%] text-sm font-bold text-start py-3 px-2">No</th>
                    <th class="w-[10%] text-sm font-bold text-start py-3 px-2">Image</th>
                    <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Name</th>
                    <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Email</th>
                    <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Role</th>
                    <th class="w-[20%] text-sm font-bold text-start py-3 px-2">Status</th>
                    <th class="w-[10%] text-sm font-bold text-start py-3 px-2">Action</th>
                </tr>
            </thead>
            <tbody class="w-full mt-3">
                @foreach($users as $user)
                <tr class="w-full mt-3 shadow-sm">
                    <td class="w-[10%] text-sm font-medium py-2 px-2">
                        {{$user->id}}
                    </td>
                    <td class="w-[10%] text-sm font-medium py-2 px-2">
                        <div class="w-[50px] h-[50px] rounded-full bg-gray-400">
                            <img src="{{$user->avatar}}"
                                alt="user" class="w-full h-full rounded-full object-cover" />
                        </div>
                    </td>
                    <td class="w-[20%] text-sm font-medium py-2 px-2">
                        {{$user->first_name}} {{$user->last_name}}
                    </td>
                    <td class="w-[20%] text-sm font-medium py-2 px-2">
                        {{$user->email}}
                    </td>
                    <td class="w-[20%] text-sm font-medium py-2 px-2">
                        {{$user->role}}
                    </td>
                    <td class="w-[20%] text-sm font-medium py-2 px-2">
                        {{$user->status}}
                    </td>
                    <td class="w-[10%] text-sm font-medium py-2 px-2">
                        <div class="flex flex-row justify-between items-center">
                            <button class="shadow px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fillRule="evenodd"
                                        d="M10.707 3.293a1 1 0 00-1.414 0L3 9.586V17h6v-2a1 1 0 011-1h2a1 1 0 011 1v2h6v-7.414l-6.293-6.293zM12 10a2 2 0 100-4 2 2 0 000 4z"
                                        clipRule="evenodd" />
                                </svg>
                            </button>
                            <button class="shadow px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fillRule="evenodd"
                                        d="M10.707 3.293a1 1 0 00-1.414 0L3 9.586V17h6v-2a1 1 0 011-1h2a1 1 0 011 1v2h6v-7.414l-6.293-6.293zM12 10a2 2 0 100-4 2 2 0 000 4z"
                                        clipRule="evenodd" />
                                </svg>
                            </button>
                            <form class="delete-user-form" action="{{ url('api/users/' . $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-user-btn shadow px-2">
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-user-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', async function () {
                const form = this.closest('.delete-user-form');
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
                        if (data) {
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