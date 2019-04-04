@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Error!</h4>
        @foreach ($errors->all() as $error)
          <p class="mb-0">{{ $error }}</p>
        @endforeach
    </div>
@endif