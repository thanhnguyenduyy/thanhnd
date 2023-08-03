<!DOCTYPE html>
<html>
<head>
    <title>Create New Rating Member</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Thêm thành viên</h1>
    <form action="{{ route('rating_members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-12">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="name">
            </div>
            <div class="form-group col-12">
            <label for="images">images</label>
            <input type="file" name="images" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12">
            <label for="point">Point</label>
            <input type="number" name="point"  value="0" class="form-control" id="point" placeholder="point">
        </div>
            <div class="form-group col-12">
            <label for="note">note</label>
            <input type="text" name="note" class="form-control" id="note" placeholder="note">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-space">ADD</button>
    </form>
</div>
</body>
</html>
