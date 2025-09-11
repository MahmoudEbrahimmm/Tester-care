@extends('layouts.dashboard')
@section('content')
<x-breadcrumb title="رسائل العملاء" />
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto text-center">
            <h4 class="mt-3 mb-4">رسائل العملاء</h4>
            @if (session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <td class="th">الاسم</td>
                        <td class="th">البريد</td>
                        <td class="th">الرسالة</td>
                        <td class="th">التاريخ</td>
                        <td class="th"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td> {{$contact->name}} </td>
                        <td> {{$contact->email}} </td>
                        <td> {{$contact->description}} </td>
                        <td>{{ $contact->created_at->format('d-m-y h:i A') }}</td>

                        <td>
                            <form action="{{ route('contact.destroy', $contact->id) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger px-2"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>



@endsection