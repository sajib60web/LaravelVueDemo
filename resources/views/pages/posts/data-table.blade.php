@foreach ($posts as $post)
<tr>
    <th scope="row">{{ $post->id }}</th>
    <td>{{ $post->name }}</td>
    <td>{{ $post->email }}</td>
    <td>{{ $post->address }}</td>
</tr>
@endforeach