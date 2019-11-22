@extends('master')

@section('title')
    Manage Genre
@endsection

@section('content')
<table class = "genre-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($genres as $genre)
        <tr>
            <td>{{$genre->id}}</td>
            <td>{{$genre->genre_name}}</td>
            <td><button type ="button" id="edit-btn">Edit</button>
                <button type="button" id="delete-btn">Delete</button>
            </td>
        </tr>       
        @endforeach
    </tbody>
</table>
  
<script>
    $(document).ready(function(){
        // $('.genre-table tbody').on('click', '.edit-btn', function(){
        //  // var row = $(this).closest('tr');
        //  // var id = row.find('td:eq(0)').text();
        //  // window.location.replace('http://127.0.0.1:8000/manage/genres'); 
        //  // + id + '/edit');
        //  alert('id');
        // })

        // $('.edit-btn').click(function(){
        //     alert('fhcjd');
        // })
        $('.edit-btn').click(function(){
            var row = $(this).closest('tr');
            var id = row.find('td:eq(0)').text();
            alert(id);
        });

        $('.delete-btn').click(function(){
            var row = $(this).closest('tr');
            var id = row.find('td:eq(0)').text();
            alert(id);
        });

    });
</script>
@endsection