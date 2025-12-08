<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller">
        @include('admin.navbar')

        <div class="update-food w-100">
            <div class="w-50 m-auto p-5">
                <h2 style="text-align:center;margin-top:20px;">Update Chef</h2>
                <form action="{{ url('update-chef-info',$chef -> id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name">Name</label>
                        <input type="text" class="form-control bg-white" name="name" value="{{ $chef->name }}" id=""
                             required>
                    </div>
                    <div>
                        <label for="speciality">Speciality</label>
                        <input type="text" class="form-control bg-white" name="speciality" value="{{ $chef->speciality }}" id=""
                             required>
                    </div>
                    <div style="text-align:center;">
                        <label for="oldImage">old image</label>
                        <img src="/chefimage/{{ $chef->image }}" height="200" width="200" alt=""
                            style="margin:0 auto;border:1px solid white;">
                    </div>
                    <div>
                        <label for="Image">choose image</label>
                        <input type="file" class="form-control bg-white" class="file" name="image" id="" required>
                    </div>
                    <div>
                        <input type="submit" class="form-control bg-white" class="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>