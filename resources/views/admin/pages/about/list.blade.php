@extends('admin.index')
@section('content')
<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">About List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Blog Paragraph</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        @foreach ($about as $item)
                            
                      
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$item->title}}</td>
                            <td><img src="{{asset('about_image')}}/{{$item->image}}" style="max-height: 100px;"></td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->mission}}</td>
                            <td>{{$item->vision}}</td>

                            <td>
                                <div class="btn-group">
                           
                                    <a href="{{route('about.edit',$item->id)}}" class="btn btn-success btn-sm mr-1"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger btn-sm mr-1 " data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>
                                </div>

                            </td>
                           
                           
                        </tr>
                        <div id="deletemodal" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                            <form action="{{route('about.delete',$item->id)}}" method="POST" id="deletebanner">
                              @csrf
                              @method('DELETE')
                              
                                <div class="modal-content">
                                    <div class="modal-header bg-danger ">				
                                        <h4 class="modal-title w-100">Are you sure?</h4>	
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" >Sumbit</button>
                                      
                                    </div>
                                </div>
                            
                            
                            </form>
                            </div>
                        </div>
                        
                        

                        @endforeach
                     </tbody>
                </table>
            </div>
        </div>
    </div>


</div>



@endsection


<script>
    function handeldelete(id){
        var form = document.getElementById('deletebanner')
        form.action='banner/' +id
        
        $('#deletemodal').modal('show')
    }
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0; 
            var id = $(this).data('id'); 
             
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/bannerstatus',
                data: {'status': status, 'id': id},
                success: function(data){
                    alert(data.success)
                }
            });
        })
      })
</script>    