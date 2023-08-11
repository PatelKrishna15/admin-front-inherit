<x-admin-component>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.category.store')}}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                      
                      </div>
                      <div class="form-group">
                        <label for="slug" class="form-label">Category Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug">
                      
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
              
            </div>
        </div>
      </div>
      <div class="container">
        <div class="card">
          <div class="card-header">
          <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add Category
        </button>

        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->name }}</td>
                        <td><i class="fa fa-trash" aria-hidden="true"></i> <i class="fa fa-edit"
                                aria-hidden="true"></i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      
      {{ $data->links() }}
    </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
      $('#name').change(function(e) {
        $.get('{{ route('admin.category.checkslug') }}',
          { 'name': $(this).val() },
          function( data ) {
            $('#slug').val(data.slug);
          }
        );
      });
    </script>
   
</x-admin-component>
