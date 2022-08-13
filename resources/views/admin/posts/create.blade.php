<x-layout >
    <x-setting heading="Create new Post">
        <section class="py-6 px-8">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-form.input name="title" />
                    <x-form.input name="thumbnail" type="file" />
                    <x-form.textarea name="excerpt"/>
                    <x-form.textarea name="body"/>
                    {{-- Category selection --}}
                    <x-form.lable name="Category" />
                    <select name="category_id" id="category_id">
                        @foreach ( $categories as $category )
                        <option value="{{$category->id}}"
                                {{old('category_id')==$category->id ? 'selected':'' }}
                                >{{ ucwords( $category->name )}}</option>
                        @endforeach
                    </select>
                    <x-form.error name="category" />
                    {{-- Submit Button --}}
                    <div class="mb-6">
                        <x-form.button>Publish</x-form.button>
                    </div>
                </form>
        </section>
    </x-setting>
</x-layout >
