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
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{$model->slug}}">
    </div>

    <div class="form-group">
        <label for="published_at">Published Date/Time</label>
        <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{$model->published_at}}">
    </div>

    {{-- <div class="form-group position-relative">
        <label for="published_at">Published Date/Time</label>
        <input
        type="datetime" 
        class="form-control datetimepicker-input" 
        data-target="#published_at"
        data-toggle="datetimepicker"
        id="published_at" 
        name="published_at" value="{{$model->published_at}}">
    </div> --}}

    {{-- <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div> --}}
    <div class="form-group">
        <label for="excerpt">Excerpt</label>
        <textarea class="form-control" id="excerpt" name="excerpt">{{$model->excerpt}}</textarea>
    </div>

    <div class="form-group">
        <label for="body">Body Content</label>
        <textarea class="form-control" id="body" name="body">{{$model->body}}</textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-default btn-primary mt-3" value="Submit">
    </div>