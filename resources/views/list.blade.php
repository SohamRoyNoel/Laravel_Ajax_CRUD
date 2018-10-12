<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax To do list</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
{{--// all things CSS & JS are done under 3.2.2 ver @ : https://getbootstrap.com/docs/3.3/javascript/#modals--}}
<div class="container" style="padding-top: 20px">
    <div class="row" id="items">
        <div class="col-lg-offset-2 col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Ajax List <a href="" id="addNew" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></a> </h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($items as $item)
                            <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">{{$item->item}}
                                <input type="hidden" id="itemId" value="{{$item->id}}">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title">Add A New Item</h4>
            </div>
            <div class="modal-body">
                <p>

                {!! Form::open(['method'=>'POST', 'files'=>true]) !!}

                <input type="hidden" id="id">

                <div class="form-group">
                    {!! Form::label('item', 'Post Title:') !!}
                    {!! Form::text('item', null, ['class'=>'form-control', 'placeholder'=>'Name', 'id'=>'addItem']) !!}
                </div>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete" data-dismiss="modal" style="display: none">Delete</button>
                <button type="button" class="btn btn-warning" id="saveChanges" data-dismiss="modal" style="display: none">Save</button>
                <button type="button" class="btn btn-success" id="AddButton" data-dismiss="modal">Add Item</button>
                {!! Form::close() !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script
        src="http://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $(document).on('click', '.ourItem', function (event) {
            var  text = $(this).text();
            var id = $(this).find('#itemId').val(); // pulls particular value from li
            $('#title').text('Edit Item');
            var text = $.trim(text); // trims the spaces from the string
            $('#addItem').val(text);
            $('#delete').show('400');
            $('#saveChanges').show('400');
            $('#AddButton').hide('400');
            $('#id').val(id);
            console.log(text);
        });

        $(document).on('click', '#addNew', function (event) {
            $('#title').text('Edit Item');
            $('#addItem').val("");
            $('#delete').hide('400');
            $('#saveChanges').hide('400');
            $('#AddButton').show('400');
            console.log();
        });

        $('#AddButton').click(function (event) {
            var text = $('#addItem').val();
            if (text == ""){
                alert("Please type anything meaningful you dumbass");
            } else {
                $.post('list', {'text':text, '_token':$('input[name=_token]').val()}, function (data) { //passes to controller
                    console.log(data);
                    $('#items').load(location.href + ' #items'); // hold the PANEL and refresh it in a go - *Space is needed before #items*
                });
            }
        });

        $('#delete').click(function (event) {
            var id = $("#id").val();
            $.post('delete', {'id':id, '_token':$('input[name=_token]').val()}, function (data) {
                console.log(data);
                $('#items').load(location.href + ' #items'); // hold the PANEL and refresh it in a go - *Space is needed before #items*
            });
        });

        $('#saveChanges').click(function (event) {
            var id = $("#id").val();
            var value = $.trim($(" #addItem").val()); // Collecting the value from the text field
            $.post('update', {'id':id, 'value': value , '_token':$('input[name=_token]').val()}, function (data) {
                $('#items').load(location.href + ' #items');
                console.log(data);
            });
        });
    });
</script>
</body>
</html>