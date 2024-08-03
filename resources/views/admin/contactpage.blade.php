@extends('admin.master')
@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title"><b>Contact List</b></h4>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="row mb-4">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" id="search-input" class="form-control" placeholder="Search">
                                <button type="button" class="btn our-color-1 rounded-start-0">
                                    <i class="ri-search-line fs-16"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact List -->
            <div class="row">
                @foreach ($contacts as $contact)
                @if($loop->index % 2 == 0)
                <div class="col-md-6">
                    @endif
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <img class="avatar-md rounded-circle" src="{{ $contact->avatar_url }}" alt="{{ $contact->name }}">
                                </div>
                                <div class="info flex-grow-1">
                                    <h5 class="mb-1">{{ $contact->name }}</h5>
                                    <p class="text-muted mb-1">{{ $contact->email }}</p>
                                    <p class="text-muted mb-1"><strong>Subject:</strong> {{ $contact->subject }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="p-3">
                                <div class="d-flex justify-content-between">
                                    <h5 class="header-title mb-0">Message from {{ $contact->name }}</h5>
                                    <a data-bs-toggle="collapse" href="#chat-collapse-{{ $contact->id }}" role="button" aria-expanded="false" aria-controls="chat-collapse-{{ $contact->id }}">
                                        <i class="ri-subtract-line"></i>
                                    </a>
                                </div>
                            </div>
                            <div id="chat-collapse-{{ $contact->id }}" class="collapse show">
                                <div class="chat-conversation mt-2">
                                    <div class="card-body py-0 mb-3" data-simplebar style="height: 200px;">
                                        <ul class="conversation-list" id="chat-list-{{ $contact->id }}">
                                            @foreach (explode("\n", $contact->message) as $message)
                                            <li class="clearfix mt-3">
                                                <div class="chat-avatar">
                                                    <i>{{ $contact->created_at->format('H:i') }}</i>
                                                </div>
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <i>{{ $contact->name }}</i>
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-body pt-0">
                                        <form class="needs-validation" novalidate name="chat-form-{{ $contact->id }}" id="chat-form-{{ $contact->id }}" data-contact-id="{{ $contact->id }}">
                                            <div class="row align-items-start">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Enter your message" name="message" required>
                                                    <div class="invalid-feedback">
                                                        Please enter your message
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="submit" class="btn our-color-1">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($loop->index % 2 == 1 || $loop->last)
                </div>
                @endif
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="row mt-4">
                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{ $contacts->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>

        </div>

        <!-- container -->


    </div> <!-- content -->

</div>
<style>
    .our-color-4 {
        background-color: #092139 !important;
        color: #fff !important;
        transition: 3s;
    }

    .our-color-4:hover {
        background-color: #092139eb !important;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('submit', '.needs-validation', function(e) {
        e.preventDefault();
        var form = $(this);
        var contactId = form.data('contact-id');
        var message = form.find('input[name="message"]').val();

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    var chatList = $('#chat-list-' + contactId);

                    // Create a new message element with the current timestamp
                    var newMessage = '<li class="clearfix mt-3">' +
                        '<div class="chat-avatar">' +
                        '<i>' + response.timestamp + '</i>' +
                        '</div>' +
                        '<div class="conversation-text">' +
                        '<div class="ctext-wrap">' +
                        '<i>Your Name</i>' +
                        '<p>' + response.message + '</p>' +
                        '</div>' +
                        '</div>' +
                        '</li>';

                    // Append new message to the chatbox
                    chatList.append(newMessage);

                    // Scroll to the bottom of the chat list
                    chatList.scrollTop(chatList[0].scrollHeight);

                    // Reset the form
                    form[0].reset();
                }
            },
            error: function(response) {
                alert('Error sending message.');
            }
        });
    });
</script>




@endsection