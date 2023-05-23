@extends('admin.menu')

@section('title','kategori Listesi')

@section('content')
    @include('paresial.error')
    @isset($cats)
        <table class="table table-hover">
            <tr>
                <th>sıra no</th>
                <th>adı</th>
                <th>aksyon</th>
            </tr>
            @foreach($cats as $cat)
                <tr>
                    <td>{{ $cat['sort'] }}</td>
                    <td>{{$cat['name'] }}</td>
                    <td>
                        <div class="d-flex ">
                            <a href="{{ route('cat.edit',$cat->id) }}" class=" text-info col-6"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('cat.destroy',$cat->id) }}" onclick="return confirm('Silinmeli mi?')" class=" text-danger col-6"><i class="fas fa-trash-alt"></i></a>


                        </div>
                    </td>
                </tr>
            @endforeach
        </table>


    @endisset
@endsection
