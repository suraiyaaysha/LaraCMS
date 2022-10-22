{!! csrf_field() !!}

{{-- @if (!$errors->isEmpty())

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>

@endif --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$model->title}}">
    </div>

    <div class="form-group">
        <label for="url">URL</label>
        <input type="text" class="form-control" id="url" name="url" value="{{$model->url}}">
    </div>

    <div class="form-group">
        <label for="title">Content</label>
        <textarea class="form-control" id="content" name="content">{{$model->content}}</textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-default btn-primary mt-3" value="Submit">
    </div>