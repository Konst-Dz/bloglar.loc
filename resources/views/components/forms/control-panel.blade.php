<div class="flex justify-between w-1/3 mx-10">
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="block">{{ __('all.delete') }}</button>
    </form>
    <a href="{{ route('posts.edit', $post->id) }}" class="block">{{ __('all.edit') }}</a>
</div>
