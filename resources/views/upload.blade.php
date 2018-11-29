<h1>Upload Images For Blogs</h1>
<form enctype="multipart/form-data" method="POST" action="/upload">
    @csrf
    <label for="images">Images:</label><br/>
    <input type="file" name="images" multiple><br/>
    <button type="submit" name="submit">Upload</button>
</form>