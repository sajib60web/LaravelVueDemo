<table class="table table-bordered">
    @foreach ($posts as $post)
    @if($post->id == 1)
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    @endif
    @endforeach
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->name }}</td>
            <td>{{ $post->email }}</td>
            <td>{{ $post->address }}</td>
        </tr>
        @endforeach
    </tbody>
</table>