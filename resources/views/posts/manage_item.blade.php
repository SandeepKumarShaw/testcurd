@extends('layouts.default')

@section('content')

<div class="row">
            <div class="col-lg-12 margin-tb">                   
                <div class="pull-left">
                    <h2>Laravel Ajax CRUD Example</h2>
                </div>
                <div class="pull-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item" id="create-manage-form">
                      Create Item
                </button>
                </div>
            </div>
</div>

        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
             <tr>
                 <td>jhjh</td>
                 <td>hfhf</td>
                 <td><img src=""></td>
                 <td>
                     <button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button>
                     <button class="btn btn-danger remove-item">Delete</button>
                 </td>
             </tr>
            </tbody>
        </table>

        <ul id="pagination" class="pagination-sm"></ul>

        <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Item</h4>
              </div>
              <div class="modal-body">
<input type="hidden" id="token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="control-label" for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" data-error="Please enter title." required />
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Description:</label>
                            <textarea name="description" id="description" class="form-control" data-error="Please enter description." required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Image:</label>
                            <input type="file" name="photo" id="photo" class="form-control" data-error="Please select image." required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn crud-submit btn-success btn-sava-item">Submit</button>
                        </div>
              </div>
            </div>
          </div>
        </div>



@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#create-manage-form').on('click',function(){
            $('#create-item').modal();
        });
        $('.btn-sava-item').on('click',function(e){
            e.preventDefault();
            var title       = $('#title').val();
            //alert(title);
            var description = $('#description').val();
            var photo       = $('#photo').val();
            data: $( '#personalDataForm' ).serialize()
            //alert(photo);
            $.post("{{ route('itemInsertPost') }}",{title:title,description:description,photo:photo},function(data){
                console.log(data);

            });
        });
    });
</script>
@endsection