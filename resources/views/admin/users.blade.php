<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller">
        @include('admin.navbar')
        <div class="users-table">
            <h2 style="text-align:center;margin-top:100px;font-weight:900;">System Users</h2>
            <table>
                <tr>
                    <th style="padding:30px;">Name</th>
                    <th style="padding:30px;">Email</th>
                    <th style="padding:30px;">Actions</th>
                </tr>
                @foreach ($users as $user)
                    <tr align="center">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if ($user->user_type == "0")
                            <td><a href="{{ url('delete-user',$user ->id) }}">Delete</a></td>
                        @else
                            <td>Admin</td>
                        @endif
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>