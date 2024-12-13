<div class="my-5">
    <form action="{{ url('/comments') }}" method="POST" >
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <label for="text">{{ __('all.write_comment') }}</label>
        <br>
        <textarea name="text" id="" cols="30" rows="10" class="border">

        </textarea>
        <br>
        <input type="submit" value="{{ __('all.send') }}">
    </form>
</div>
