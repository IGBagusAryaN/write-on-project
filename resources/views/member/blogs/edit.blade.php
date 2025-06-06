<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Edit Data Tulisan
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Silakan melakukan perubahan data
                            </p>
                        </header>

                        <form method="post" action="{{ route('member.blogs.update', $data->id) }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div>
                                <x-input-label for="title" value="Title" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                    value="{{ old('title', $data->title) }}" />
                                @error('title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for="description" value="Description" />
                                <x-text-input id="description" name="description" type="text"
                                    class="mt-1 block w-full" value="{{ old('description', $data->description) }}" />
                                @error('description')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                @isset($data->thumbnail)
                                    <img src="{{ asset(getenv('CUSTOM_THUMBNAILS_LOCATION') . '/' . $data->thumbnail) }}"
                                        class="rounded-md border-gray-300 max-w-40 py-2">
                                @endisset

                                <x-input-label for="file_input" value="Thumbnail" />
                                <input type="file" class="w-full border border-gray-300 rounded-md"
                                    name="thumbnail" />
                                @error('thumbnail')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-textarea-trix value="{!! old('content', $data->content) !!}" name="content"
                                    id="x"></x-textarea-trix>
                            </div>
                            <div>
                                <x-select name="status">
                                    <option value="draft"
                                        {{ old('status', $data->status) == 'draft' ? 'selected' : '' }}>Simpan sebagai
                                        draft</option>
                                    <option value="publish"
                                        {{ old('status', $data->status) == 'publish' ? 'selected' : '' }}>Publish
                                    </option>
                                </x-select>
                            </div>
                            <div class="flex items-center gap-4">
                                <a href="{{ route('member.blogs.index') }}">
                                    <x-secondary-button>Kembali</x-secondary-button>
                                </a>
                                <x-primary-button>Simpan</x-primary-button>
                            </div>

                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
