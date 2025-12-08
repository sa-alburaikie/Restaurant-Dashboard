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
            <h2 style="text-align:center;margin-top:100px;font-weight:900;">Reservations List</h2>
            <table>
                <tr>
                    <th style="padding:30px;">Name</th>
                    <th style="padding:30px;">Email</th>
                    <th style="padding:30px;">Phone</th>
                    <th style="padding:30px;">Guests Number</th>
                    <th style="padding:30px;">Date</th>
                    <th style="padding:30px;">Time</th>
                    <th style="padding:30px;">Message</th>
                </tr>
                @foreach ($reservations as $reservation)
                    <tr align="center">
                        <td>{{ $reservation->name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>{{ $reservation->guest }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->time }}</td>
                        <td>{{ $reservation->message }}</td>
                        
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>