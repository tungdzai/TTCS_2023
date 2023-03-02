@extends('layout.layout')
@section("title")
    Upload Avatar
@endsection
@section('content')
    <div class="container-fluid">
        <form action="{{route('uploadAvatar')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control-file " id="avatar"  onchange="previewImage()">
                <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; display: none;">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
    <script src="../admin_lte/js/previewAvatar.js"></script>
@endsection
