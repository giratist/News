<br>
@if ($newsId == $userid)
    <form   href="/newss/{{ $news['id'] }}" method="POST">
        <input type="hidden" name="_method" value="put" />
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="text" placeholder="Text">
        <input type="submit" value="Upreate">


    </form>
    <form   href="/newss/{{ $news['id'] }}" method="POST">
        <input type="hidden" name="_method" value="DELETE" />
        <input type="submit" value="DELETE">
@endif


<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Text</th>
        <th>User ID</th>

    </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{$news['id']}}</td>
            <td>{{$news['title']}}</td>
            <td>{{$news['text']}}</td>
            <td>{{$news['user_id']}}</td>



        </tr>

        <a href="http://localhost:8000/newss/" style="background-color: chartreuse" class="btn btn-dark">===Beak===</a>


    </tbody>
</table>
