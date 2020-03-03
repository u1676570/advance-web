@extends('layouts.app')

@section('content')
<section id="contentarea">
	<h2>Book Details</h2>
	{{ @$msg }}
	<table>

		<!-- form to upload new book with image -->
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<tr>			
				<td>
					<strong>Book ID: </strong></br>
					<strong>Title: </strong><input  name="title" required type="text" class="form-control" /></br>
					<strong>ISBN: </strong><input  name="isbn" required type="text" class="form-control" /></br>
					<strong>Language: </strong><input  name="language" required type="text"  class="form-control"/></br>
					<strong>Publish Date: </strong><input  name="publishdate" type="date" class="form-control" /></br>
					<strong>Pages: </strong><input min="0" name="pages" type="number" class="form-control" /><br>
					<strong>Image: </strong><input  name="file" type="file" class="form-control" /></br>
					
					<!-- select author from author list -->
					<strong>Author Name: </strong>
					<select name="authorid">
						@foreach ($authors as $akey => $authorvalue)
						<option value="{{ $authorvalue->authorid }}">{{ $authorvalue->authorname }}</option>
						@endforeach
					</select><br /><br />

					<!-- select genre from genre list -->
					<strong>Genre Name: </strong>
					<select name="genreid">
						@foreach ($genre as $gkey => $genrevalue)
						<option value="{{ $genrevalue->genreid }}">{{ $genrevalue->name }}</option>
						@endforeach
					</select>
				</br><br />
			</td>
		</tr>
		<tr><td><input type="submit" name="submit" value="Add" /></td></tr>			
	</form>
</table>
<br>
</section>

@endsection
