        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<div>{!! Form::hidden('user_id',1) !!}</div>
<div class="form-group">
{!! Form::label('Header','header') !!}
{!! Form::text('header',null,array('class'=>'form-control')) !!}
</div>
<div class="form-group">
{!! Form::label('su','sub Header') !!}
{!! Form::text('sub_header','',array('class'=>'form-control')) !!}
</div>
<div class="form-group">
{!! Form::label('body','Body') !!}
{!! Form::textarea('body','',array('class'=>'form-control')) !!}
</div>
<div class="form-group">
{!! Form::label('image','Image') !!}
{!! Form::file('image',null,array('class'=>'form-control')) !!}
</div>
<div class="form-group">
{!! Form::label('punlished','published') !!}
{!! Form::input('date', 'published_at', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}

</div>
<div class="form-group">
{!! Form::label('Choose Tags') !!}
{!! Form::select('tags[]',$tags,null,array('id' => 'tag_list' ,'class'=>'form-control','multiple')) !!}

</div>
<div class="form-group">
{!! Form::label('Create a New Tags') !!}
{!! Form::select('new_tags[]',[],null,array('id' => 'new_tag' ,'class'=>'form-control','multiple')) !!}

</div>


<div class="form-group">
{{--    {!! Form::input('new_tag', 'published_at', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}--}}
{!! Form::submit('Create Post',array('class'=>'btn btn-primary')) !!}
</div>
<script>
$('#tag_list').select2({
    placeholder : 'Choose a Tag '
});
$('#new_tag').select2({
    placeholder : 'Create a New Tag',
    tags : true
});
</script>

