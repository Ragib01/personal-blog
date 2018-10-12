@extends('layouts.admin')

@section('title', 'MailBox')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">MailBox</li>
    </ol>
@endsection

@section('content')
    <main class="main">


        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-12">
                        <div class="card email-app">
                            <main>
                                <div class="toolbar">

                                    <button type="button" class="btn btn-secondary">
                                        <a href="{{ route('admin_mail_delete', ['id' => $mails->id]) }}">
                                            Delete
                                            <span class="fa fa-trash-o"></span>
                                        </a>

                                    </button>
                                </div>
                                <div class="message">

                                    <div class="message-title">{{ $mails->subject }}</div>
                                    <div class="header">

                                        <div class="from" style="color: #00A8FF">
                                            <span >{{ $mails->name }}</span>
                                            {{ $mails->email }}
                                        </div>
                                        <div class="date">{{ $mails->updated_at->format('d/m/Y') }}
                                        </div>

                                        <div class="menu"></div>

                                    </div>

                                    <div class="content">
                                        <p>
                                            {{ $mails->message }}
                                        </p>
                                    </div>

                                    <hr/>
                                    <form method="post" action="">

                                        <div class="form-group">

                                            <textarea class="form-control" id="message" name="body" rows="12" placeholder="Click here to reply"></textarea>

                                        </div>

                                        <div class="form-group">

                                            <button tabindex="3" type="submit" class="btn btn-success">Send message</button>

                                        </div>

                                    </form>

                                </div>


                            </main>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.conainer-fluid -->
    </main>

@endsection

@section('style')
    <style>
        #DataTables_Table_0_filter label input {
            margin-left: 10px;
        }

        #DataTables_Table_0_length label select {
            margin: 0 10px;
        }
    </style>
@endsection

@section('script')
    <script>
        $('.delete').click(function () {

            var url = $(this).next('.delete_url').val();

            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = url;
            })

        });
    </script>
@endsection