@extends('master')

@section('title')
    Manage Genre
@endsection

@section('content')
<table class = "genre-table">
        <tr>
            <th>#</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>
        @foreach ($genres as $genre)
        <tr>
            <td>{{$genre->id}}</td>
            <td>{{$genre->genre_name}}</td>
            <td><button type ="button" class="edit-btn">Edit</button>
                <button type="button" class="delete-btn">Delete</button>
            </td>
        </tr>
        @endforeach
</table>

 <script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            var row = $(this).closest('tr');
            var id = row.find('td:eq(0)').text();
            window.location.replace('genres/' + id + '/edit');
        });

        $('.delete-btn').click(function(){
            var row = $(this).closest('tr');
            var id = row.find('td:eq(0)').text();
            window.location.replace('genres/' + id + '/delete');
        });

    });
</script>
@endsection
