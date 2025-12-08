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
        <div class="food-form">
            <div class="container ml-0 ml-md-5 mr-0 mr-md-5 mt-3">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="foodmenu-form">
                            <h2 style="color:black;text-align:center;">Add New Chef</h2>
                            <form action="{{ url('add-chef') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control bg-white" name="name" id=""
                                        placeholder="Enter  Name" required>
                                </div>
                                <div>
                                    <label for="speciality">Speciality</label>
                                    <input type="text" class="form-control bg-white" name="speciality" id=""
                                        placeholder="Enter  speciality" required>
                                </div>
                                <div>
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control bg-white" class="file" name="image" id=""
                                        required>
                                </div>
                                <div>
                                    <input type="submit" class="form-control bg-white" class="submit" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 mt-4 mt-md-0">
                        <div class="food-table">
                            <table>
                                <tr>
                                    <th style="padding:30px;">image</th>
                                    <th style="padding:30px;">Chef Name</th>
                                    <th style="padding:30px;">Speciality</th>
                                    <th style="padding:30px;">Action</th>
                                </tr>
                                @foreach ($chefs as $chef)
                                    <tr align="center">
                                        <td><img src="/chefimage/{{ $chef->image }}"
                                                style="height:100px;width:100px;border-radius:50px;" alt=""></td>
                                        <td>{{ $chef->name }}</td>
                                        <td>{{ $chef->speciality }}</td>
                                        <td>
                                            <a href="{{ url('remove-chef', $chef->id) }}"
                                                style="background-color:red;padding:5px 10px;text-decoration:none;color:white;border-radius:5px;">Delete</a>
                                            <a href="{{ url('update-chef', $chef->id) }}"
                                                style="background-color:green;padding:5px 10px;text-decoration:none;color:white;border-radius:5px;margin-left:10px;">Update</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>