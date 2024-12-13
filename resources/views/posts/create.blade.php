<form action="{{ url('posts') }}" method="POST">
    @csrf
    <p>
        <input type="text" name="title" value="{{ $post->title ?? '' }}">Title
    </p>
    <p>
        <textarea name="text" id="" cols="30" rows="10">{{ $post->text ?? '' }}</textarea>
    </p>
    <p>
        <input type="text" name="slug" value="{{ $post->slug ?? '' }}">Slug
    </p>
    <p>
        <select multiple name="tags[]">
            @foreach($tags as $tag)
                <option  value="{{$tag->id}}">{{ __('all.' . $tag->name) }}</option>
            @endforeach
        </select>
    </p>
    <button type="submit">{{ __('all.save') }}</button>
</form>
