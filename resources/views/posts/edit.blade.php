<form action="{{ url('posts') }}" method="POST">
    @csrf
    <p>
        <input type="text" name="title" value="{{ $post->title ?? '' }}">Title
    </p>
    <p>
        <textarea name="text" id="" cols="30" rows="10">{{ $post->text ?? '' }}</textarea>
    </p>
    <p>
        <input type="text" name="slug" value="{{ $post->slug ?? '' }}">Preview
    </p>
    <p>
        <select multiple name="tags[]">
            @foreach($tags as $tag)
                @foreach($post->tags as $postTag)
                        <option @if($tag->id == $postTag->id) selected @endif value="{{$tag->id}}">{{ __('all.' . $tag->name) }}</option>
                @endforeach
            @endforeach
        </select>
    </p>
    <button type="submit">{{ __('all.save') }}</button>
</form>
