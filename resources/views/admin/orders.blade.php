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
        <div class="orders-table">
            <h2 style="text-align:center;margin-top:100px;font-weight:900;">Orders List</h2>
            <form action="{{ url('search-orders') }}" method="get">
                @csrf
                <input type="text" name="search" class="form-control form-control-search" style="width:80%;" placeholder="Enter Name To Search" id="">
                <input type="submit" style="width:15%;background-color:#5ee75e;" class="btn form-control form-control-search" value="Search">
            </form>
            <table>
                <tr>
                    <th style="padding:30px;">Name</th>
                    <th style="padding:30px;">Phone</th>
                    <th style="padding:30px;">Address</th>
                    <th style="padding:30px;">Food Name</th>
                    <th style="padding:30px;">Price</th>
                    <th style="padding:30px;">Quantity</th>
                    <th style="padding:30px;">Total Price</th>
                </tr>
                @foreach ($orders as $order)
                    <tr align="center">
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->food_name }}</td>
                        <td>{{ $order->price }}$</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price * $order -> quantity }}$</td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>