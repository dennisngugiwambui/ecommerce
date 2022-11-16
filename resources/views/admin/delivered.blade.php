@extends('admin.app')

@section('content')

<main>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                {{-- @if(session()->has('message'))
                <div class="alert-alert-success">
                    {{ session()->get('message') }}
                </div>

                @endif --}}
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Active Orders</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">New Products</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">All products</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <p id="p1"></p>
                                    <script>
                                        var date = new Date();
                                        var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
                                        var current_time = date.getHours()+":"+date.getMinutes()+":"+ date.getSeconds();
                                        var date_time = current_date+" "+current_time;
                                        document.getElementById("p1").innerHTML = date_time;
                                    </script>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">Welcome today</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal -->
                        {{-- <button type="button" style="background: chocolate;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                            Add Category
                        </button>

                        <!-- Modal For adding Category -->
                        <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategory" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Categories</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                </div>
                                <div class="modal-body" style="background: maroon;">
                                    <form action="{{ route('category') }}" method="POST">
                                        @csrf

                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label" style="color: white;">Category</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="category_name" class="form-control-plaintext" id="category">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-cancel"></i>Close</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div> --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product title</th>
                                    <th>Quantity</th>
                                    <th>Delivery status</th>
                                    <th>Payment status</th>
                                    <th>Image</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product title</th>
                                    <th>Quantity</th>
                                    <th>Delivery status</th>
                                    <th>Payment status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                   </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($orders as $orders)
                                <tr>
                                    <td>{{ $orders->id }}</td>
                                    <td>{{ $orders->name }}</td>
                                    <td>{{ $orders->email }}</td>
                                    <td>{{ $orders->address }}</td>
                                    <td>{{ $orders->phone }}</td>
                                    <td>{{ $orders->product_title }}</td>
                                    <td>{{ $orders->quantity }}</td>
                                    <td>{{ $orders->delivery_status }}</td>
                                    <td>{{ $orders->payment_status }}</td>
                                    <td> <img src="{{ asset('product/'.$orders->image) }}" alt=""> </td>
                                    <td>
                                        <button class="btn btn-sm btn-success">
                                            <a href="{{ url('print_receipt/'.$orders->id) }}">
                                                <i class="fa fa-print">
                                                    </i>
                                                    Print
                                            </a>
                                        </button>
                                    </td>
                                    <td>
                                        <button style="background: blueviolet;" class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#sendEmail_{{ $orders->id }}">
                                                {{-- {{ route('send_email',$orders->id) }} --}}
                                                <i class="fa fa-fighter-jet">
                                                    </i>
                                                    Mail
                                         </button>

                                        {{-- <a href="{{ route('sending_emails', $orders->id) }}">Mail</a> --}}
                                    </td>
                                </tr>


                                <!-- Button trigger modal -->

                                    <!-- Modal -->
                                    {{-- <div class="modal right fade" id="sendEmail_{{ $orders->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Sending emails</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            Are you sure you want to send email to {{ $orders->address }}
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div> --}}
                                                     {{-- DECLINE ORDER MODAL --}}
                                        <div class="modal right fade" id="sendEmail_{{ $orders->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            {{-- modal for editing user details--}}
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="staticBackdropLabel">Send Emails</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    {{ $orders->id }}
                                                </div>
                                                <div class="modal-body" style="background: maroon;">

                                                    <form action="{{ route('send_user_mail', $orders->id) }}" method="post">
                                                        @csrf
                                                        <div class="mb-3 row">
                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Greetings</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" name="greeting" class="form-control-plaintext" id="staticEmail" value="Hello {{ $orders->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword" class="col-sm-2 col-form-label">First Line</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" name="firstline" class="form-control" id="firstline">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword" class="col-sm-2 col-form-label">Body</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" name="body" class="form-control" id="firstline">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword" class="col-sm-2 col-form-label">Button</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" name="button" class="form-control" id="firstline">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword" class="col-sm-2 col-form-label">URL</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" name="url" class="form-control" id="firstline">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword" class="col-sm-2 col-form-label">last Line</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" name="lastline" class="form-control" id="firstline">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-remove"></i>Close</button>
                                                            <button type="submit" class="btn btn-danger" >Send Mail</button>
                                                        </div>
                                                        </div>
                                                    </form>


                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>


@endsection
