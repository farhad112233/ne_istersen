@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li class="alert alert-danger ">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if(session('info'))
    @if(session('status')=='ok')
        <div class="alert alert-success note">{{ session('info') }}</div>
    @else
        <div class="alert alert-danger note">{{ session('info') }}</div>
    @endif
@endif
