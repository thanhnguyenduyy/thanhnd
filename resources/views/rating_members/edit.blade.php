<!DOCTYPE html>
<html>
<head>
    <title>Edit Rating Member</title>
</head>
<body>
    <h1>Edit Rating Member</h1>
    <form action="{{ route('rating_members.edit', $rating_member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $rating_member->name }}" required>
        <br>
        <label for="images">Images:</label>
        <input type="text" name="images" value="{{ $rating_member->images }}" required>
        <br>
        <label for="point">Point:</label>
        <input type="number" name="point" value="{{ $rating_member->point }}" required>
        <br>
        <label for="note">Note:</label>
        <textarea name="note">{{ $rating_member->note }}</textarea>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
