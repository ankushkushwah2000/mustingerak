<div class="row">
    <div class="col-md-4 col-12">
        <div class="mb-1">
            <label class="form-label" for="title">select category {{ $selectedCategory }}</label>
            <select class="form-control" name="category_id" wire:model='selectedCategory'>
                <option value="" selected>none</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error('category_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="mb-1">
            <label class="form-label" for="title">select sub category {{ $selectedSubCategory }}</label>
            <select name="sub_category_id" id="" class="form-control" wire:model='selectedSubCategory'>
                <option value="" selected>none</option>
                @if ($subcategories)
                @foreach ($subcategories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
                @endif
            </select>
            @error('sub_category_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="mb-1">
            <label class="form-label" for="title">select sub sub category {{ $selectedSubSubCategory }}</label>
            <select name="sub_sub_category_id" id="" class="form-control" wire:model='selectedSubSubCategory'>
                <option value="" selected>none</option>
                @if ($subsubcategories)
                @foreach ($subsubcategories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
                @endif
            </select>
            @error('sub_sub_category_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>   