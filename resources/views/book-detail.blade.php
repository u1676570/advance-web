@extends('layouts.app')

@section('content')
<section id="contentarea">
	<h2>Book Details</h2>
	{{ @$msg }}
	<table>
		@foreach($books as $key => $value)

		<!-- form to update book info with show previous detail -->
		<form action="" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<tr>
				<td id="image"><img src="{{ url('/')}}/public/pictures/<?php echo $value['isbn'];?>.jpg" /></td>

				<td>
					<strong>Book ID: </strong>{{$value->bookid}}</br>
					<strong>Title: </strong><input value="{{$value->title}}" name="title" required type="text" class="form-control" /><br>
					<strong>ISBN: </strong><input value="{{$value->isbn}}" name="isbn" required type="text" class="form-control" /><br>
					<strong>Language: </strong><input value="{{$value->language}}" name="language" required type="text"  class="form-control"/><br>
					<strong>Publish Date: </strong><input value="{{$value->publishdate}}" name="publishdate" type="date" class="form-control" /><br>
					<strong>Pages: </strong><input min="0" value="{{$value->pages}}" name="pages" type="number" class="form-control" /><br>
					<strong>Author Name: </strong>

					<!-- show all author with the already selected author -->
					<select name="authorid">
						@foreach ($authors as $akey => $authorvalue)
						<?php  
						$select = '';
						if($authorvalue->authorid == $value['authorid']) { $select = 'selected="selected"';}?>
						<option value="{{ $authorvalue->authorid }}" {{ $select }}>{{ $authorvalue->authorname }}</option>
						@endforeach
					</select>
					<br /><br />


					<!-- show all genre with already selected genre -->
					<strong>Genre Name: </strong>
					<select name="genreid">
						@foreach ($genre as $gkey => $genrevalue)
						<?php  
						$select = '';
						if($genrevalue->genreid == $books_genre[0]['genreid']) { $select = 'selected=selected';}?>
						<option value="{{ $genrevalue->genreid }}" {{ $select }}>{{ $genrevalue->name }}</option>
						@endforeach
					</select>
				</br><br />
			</td>
		</tr>
		<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Update" /> | <a href="{{ url('/delete/'.$value['bookid']) }}" class="btn btn-danger">Delete</a></td></tr>			
	</form>

	@endforeach
</table>
<br>
</section>

@endsection
