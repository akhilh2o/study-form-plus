<option value="{{ $subCategory->id }}" @selected($subCategory->id == $selected)>{{ $subCategory->name }}</option>
@if (count($subCategory->children))
    @foreach ($subCategory->children as $subSubCategory)
        @include('admin.ebooks.categories.partials.subCategory', [
            'subCategory' => $subSubCategory,
            'selected'    => $selected,
        ])
    @endforeach
@endif
