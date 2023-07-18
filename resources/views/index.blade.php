<form action="{{ route('user.edit') }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="fullname">
    <button>Register</button>
</form>