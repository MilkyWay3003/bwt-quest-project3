@extends('layouts.template')

@section('content')

  @include('blocks.navbar')

  <div class="container">
  <div class="members">
    All members ({{ auth()->check() ? $countAllMembers : $countVisibleMembers}})
  </div>

    <br>
      <table>
      <thead>
          <tr>
          @if (Auth::check())
             <th>Hide participant</th>
             <th>Photo</th>
             <th>Name and Lastname</th>
             <th>Report of subject</th>
             <th>Email</th>
          @else    
             <th>Photo</th>
             <th>Name and Lastname</th>
             <th>Report of subject</th>
             <th>Email</th>
           @endif
      </thead>
      <tbody>
      @foreach($members as $member)
        <tr>
          @if (Auth::check())
          <td> <input type="checkbox" name="userId" value="{{ $member->id }} " @if ($member->show)  checked  @endif > </td>
          <td> <img src= "{{ $member->photo }}" alt ="Photo" }}></td>
          <td> {{ $member->firstname }} {{ $member->lastname }} </td>
          <td> {{ $member->reportsubject }} </td>
          <td> <a href= "mailto: {{ $member->email }} "> {{$member->email}} </a></td>
          @else
              @if (!$member->show)
          <td> <img src= "{{ $member->photo }}" alt ="Photo" }}></td>
          <td> {{ $member->firstname }} {{ $member->lastname }} </td>
          <td> {{ $member->reportsubject }} </td>
          <td> <a href= "mailto: {{ $member->email }}" > {{$member->email}} </a></td>
              @endif
          @endif
        </tr>
      @endforeach
    </tbody>
    </table>

  </div>

@endsection

@push('scripts')
  <script src= {{ asset('js/showMembers.js') }}></script>
@endpush