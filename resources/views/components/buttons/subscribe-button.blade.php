<form action="/subscribe" method="POST">
    @csrf
    <input type="hidden" name="follower_id" value="{{ $user->id }}"></input>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Subscribe
    </button>
</form>
