@extends('admin.menu')

@section('title','Kullanıcılar Listesi')

@section('content')
    @include('paresial.error')
@isset($users)
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>adı</th>
            <th>E-posta</th>
            <th>rulo</th>
            <th>doğrulanmış tarıhı</th>
            <th>aksyon</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['rol'] }}</td>
                <td>{{ $user['email_verified_at'] }}</td>
                <td>
                    <div class="d-flex ">
                        <a href="{{ route('users.edit',$user->id) }}" class=" text-info col-6"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('users.destroy',$user->id) }}" onclick="return confirm('Silinmeli mi?')" class=" text-danger col-6"><i class="fas fa-trash-alt"></i></a>


                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center pt-2" >
        <div>
            {{ $users->withQueryString()->links()}}
        </div>

    </div>

@endisset
@endsection
