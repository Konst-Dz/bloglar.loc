<x-layout>

    <x-forms.control-panel :post="$post" />

    @if($post->user->id == $user->id)
        <form action="/toggle-public" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}"></input>
            <button type="submit">
                {{ $post->is_public ? 'Private' : 'Public' }}
            </button>
        </form>
    @endif
<div class="container mx-auto flex flex-wrap py-6">

    <!-- Post Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                @foreach($post->tags as $tag)
                    <a href="{{ url('/' . $tag->name) }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $tag->name }}</a>
                @endforeach

                <div class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</div>
                <p href="#" class="text-sm pb-8">
                    By <a href="{{ url($post->user->id) }}" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{ $post->created_at }}
                </p>
                <p class="pb-3"> {{ $post->text }}</p>

            </div>
        </article>

        <div class="w-full flex pt-6">
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
        </div>

        <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
            <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                <img src="https://source.unsplash.com/collection/1346951/150x150?sig=1" class="rounded-full shadow h-32 w-32">
            </div>
            <div class="flex-1 flex flex-col justify-center md:justify-start">
                <p class="font-semibold text-2xl">{{ $post->user->name }}</p>
                <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero suscipit suscipit eu eu urna.</p>
                <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

    </section>



</div>

    <x-forms.create-comment :post="$post" />

<div class="">
    @if(!empty($post->comments))
        {{ __('all.comments') }}
    @endif
    @foreach($post->comments as $comment)
        <div>
            <p class="flex justify-between font-bold my-3"><span>{{$comment->user->name}}</span><span>{{$comment->created_at}}</span></p>
            <div>
                {{$comment->text}}
            </div>
        </div>
    @endforeach
</div>




</x-layout>
