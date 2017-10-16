@extends('Company.layouts.layoutProfile')

@section('content')
    <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <h1>Post a Job</h1><hr>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2 text-right" for="title">Title:</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="input_title" placeholder="Enter Position" name="title">
                </div>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2 text-right">Tag:</label>
                <div class="col-sm-3">
                <input class="form-control" list="tag" id="input_PL">
                    <datalist id="tag">
                        @foreach($PLS as $PL)
                            <option value="{{ $PL->language }}">
                        @endforeach
                    </datalist>
                </div>
                <label class="control-label col-sm-2 text-right" for="location">Location:</label>
                <div class="col-sm-3">
                    <input class="form-control" list="location" id="input_location">
                    <datalist id="location">
                        @foreach($locations as $location)
                            <option value="{{ $location->thanhpho }}">
                        @endforeach
                    </datalist>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="radio">
                    <label><input type="radio" name="type" value="fulltime">Full-time</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="type" value="parttime">Part-time</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2 text-right" >Description:</label>
            </div>
        </div>
        <div id="description"></div>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2 text-right" >How to apply:</label>
            </div>
        </div>
        <div id="howToApply"></div>
        
        <input type="button" id="submit" value="Post">

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#description').summernote();
                $('#howToApply').summernote();

                $('#submit').click(function(){
                    var title = $('#input_title').val();
                    var tag = $('#input_PL').val();
                    var location = $('#input_location').val();
                    var type = $('input[name=type]:checked').val();
                    var description = $('#description').summernote('code');
                    var howToApply = $('#howToApply').summernote('code');
                    $.ajax({
                        url: "{{ route('postjob.post') }}",
                        type: 'POST',
                        data:{
                            title: title,
                            tag: tag,
                            location: location,
                            type: type,
                            description: description,
                            howToApply: howToApply
                        },
                        success: function(data){
                            if(!data.error)
                                alert("Post Success");
                        }
                    })
                });
            });
        </script>
    </div>
@endsection