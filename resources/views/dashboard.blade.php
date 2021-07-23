<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       <b class="text-muted">Hi ... {{Auth::user()->name}}</b>
      <b style="float: right;">
      Total Users <span class="badge bg-info">
        {{count($users)}}
      </span>
      </b>
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="container">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created_at</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>

  </div>
</x-app-layout>