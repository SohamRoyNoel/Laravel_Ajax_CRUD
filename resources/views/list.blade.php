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
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Ajax List <a href="" id="addNew" class="pull-right" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></a> </h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Cras justo odio</li>
                        <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Dapibus ac facilisis in</li>
                        <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Morbi leo risus</li>
                        <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Porta ac consectetur ac</li>
                        <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Vestibulum at eros</li>
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

                        <div class="form-group">
                            {!! Form::label('title', 'Post Title:') !!}
                            {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Name', 'id'=>'addItem']) !!}
                        </div>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete" data-dismiss="modal" style="display: none">Delete</button>
                <button type="button" class="btn btn-warning" id="saveChanges" style="display: none">Save</button>
                <button type="button" class="btn btn-success" id="AddButton">Add Item</button>
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
        $('.ourItem').each(function () {
            $(this).click(function (event) {
                var  text = $(this).text();
                $('#title').text('Edit Item')
                $('#addItem').val(text);
                $('#delete').show('400')
                $('#saveChanges').show('400');
                $('#AddButton').hide('400');
                console.log(text);
            })
        });

        $('#addNew').click(function (event) {
                $('#title').text('Edit Item');
                $('#addItem').val("");
                $('#delete').hide('400');
                $('#saveChanges').hide('400');
                $('#AddButton').show('400');
                console.log();
            });


    });
</script>
</body>
</html>