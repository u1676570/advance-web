@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Books</div>

                <div class="panel-body">
                 <section id="contentarea">
                  <h2>Browse Books</h2>
                  <form action="" method="post">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table>

                      <!-- Search filter by Title -->
                      <tr>
                        <td>By Title: </td>
                        <td><input type="text" name="searchtitle" placeholder="Browse by Title" /></td>
                        <td><input type="submit" name="titlesubmit" value="Search" /></td>
                    </tr>

                    <!-- Search filter by Author -->
                    <tr>
                        <td>By Author: </td>
                        <td><select name="searchauthor">
                            @foreach ($authors as $key => $value)
                            <option value="{{ $value->authorid }}">{{ $value->authorname }}</option>
                            @endforeach
                        </select></td>
                        <td><input type="submit" name="authorsubmit" value="Search" /></td>
                    </tr>

                    <!-- Search filter by Genre -->
                    <tr>
                        <td>By Genre: </td>
                        <td><select name="searchgenre">
                         @foreach ($genre as $key => $value)
                         <option value="{{ $value->genreid }}">{{ $value->name }}</option>
                         @endforeach
                     </select></td>
                     <td><input type="submit" name="genresubmit" value="Search" /></td>
                 </tr>
             </table>
         </form>
     </section>
     <hr>
     <section id="contentarea">
        <table border="1">

        	<!-- // table header -->
            <tr>
              <th>Bookid</th>
              <th>Title</th>
              <th>ISBN</th>
              <th>Language</th>
              <th>Pages</th>
              <th>Publish Date</th>
              <th>Author</th>
              <th>Genre</th>
          </tr>
          @if(!empty($books))

          <!-- Show the result according to search -->
          <tr>
            @foreach ($books as $key => $value)
            <td>{{$value->bookid}}</td>
            <td><a href="{{url('/bookdetail/'.$value->bookid)}}">{{$value->title}}</a></td>
            <td>{{$value->isbn}}</td>
            <td>{{$value->language}}</td>
            <td>{{$value->pages}}</td>
            <td>{{$value->publishdate}}</td>
            <td>{{$value->authorname}}</td>
            <td>{{$value->name}}</td>
        </tr>
            @endforeach
            @endif
        </table>
        <br>
        
    </section>
</div>
</div>
</div>
</div>
</div>
@endsection
