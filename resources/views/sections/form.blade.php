
<div class="hidden" id="counter">0</div>
{{--{!! $counter !!}--}}
{!! Form::open(array('action'=>'SectionsController@store','files'=>true,'enctype'=>'multipart/form-data') )!!}
{!! Form::text('articel_id',$article->id,array('class'=>'hidden')) !!}
{!! Form::hidden('count',0,array('id'=>'count')) !!}
<div class="form-group" id="parent">
    <div class="form-group" id="section0">
        <div><input class="form-group form-control" type="text" name="st0"/></div>
        <div><input class="form-group form-control" type="file" name="file0"/></div>
        <div><textarea class="form-group form-control" name="sb0" cols='50' rows='10'></textarea></div>
        <div><a onclick="Delete(this)" id="del0" class="form-group btn btn-danger">Delete</a> </div>
    </div>
    <br/><hr>
</div>

{{--{!! Form::file('asd') !!}--}}
{!! Form::submit('Done',array('class'=>'btn btn-success','style'=>'float:right')) !!}

{!! Form::close() !!}

<button class="btn btn-primary" onclick="add_section()" value="Add Section" >Add Section</button>

<script>

var counter = 10;
console.log(counter);
    function Delete(del){
    var id=del.getAttribute('id');
    var current = id.substr(3,id.length);
    var parent = document.getElementById('parent');
    var section = document.getElementById('section'+current);
    parent.removeChild(section);
}

    function setInputData(input, name, type, currentId) {
        input.setAttribute('class', 'form-group form-control');
        input.setAttribute('name', name + currentId);
        input.setAttribute('type',type);


    }

    function build_section(parentDiv, currentId){

        var containerDiv = document.createElement('div');
        containerDiv.setAttribute('class','form-group');
        currentId++;
        containerDiv.setAttribute('id', 'section' + currentId);

        // div for section title
        var titleDiv = document.createElement('div');
        var titleInput = document.createElement('input');
        setInputData(titleInput, 'st', 'text', currentId);
        titleDiv.appendChild(titleInput);


        // div for section body
        var fileDiv = document.createElement('div');
        var fileInput = document.createElement('input');
        setInputData(fileInput, 'file', 'file', currentId);
        fileDiv.appendChild(fileInput);

        // div for textarea
        var bodyDiv = document.createElement('div');
        var tareaDiv = document.createElement('textarea');
        tareaDiv.setAttribute('class', 'form-group form-control');
        tareaDiv.setAttribute('name', 'sb' + currentId);
        tareaDiv.setAttribute('cols', '50');
        tareaDiv.setAttribute('rows','10');
        bodyDiv.appendChild(tareaDiv);

        // div for btn
        var DivBtn=document.createElement('div');
        var btn=document.createElement('a');
        btn.setAttribute('class','form-group btn btn-danger');
        btn.setAttribute('id','del'+currentId);
        btn.innerHTML="Delete";
        btn.setAttribute('onclick','Delete(this)');
        DivBtn.appendChild(btn);
        // append all to parent div
        containerDiv.appendChild(titleDiv);
        containerDiv.appendChild(fileDiv);
        containerDiv.appendChild(bodyDiv);
        containerDiv.appendChild(DivBtn);
        containerDiv.innerHTML += "<hr>";
        parentDiv.appendChild(containerDiv);


    }

    function add_section(){
        var current = document.getElementById('counter').innerHTML;
        build_section(document.getElementById('parent'), parseInt(current));
        current++;
        document.getElementById('counter').innerHTML=current;
        var count = document.getElementById('count');
                count.innerHTML=current;
                count.setAttribute('value',current);
    }


</script>