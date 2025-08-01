@extends('layouts.app')

@section('styles')
    <style>
        .cover-photo-container {
            position: relative;
            height: 300px;
            background-color: #f0f2f5;
        }

        .cover-photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .edit-cover-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            background: rgba(255, 255, 255, 0.8);
            border: none;
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 20px;
        }

        .profile-photo-container {
            position: absolute;
            bottom: -50px;
            left: 30px;
        }

        .profile-photo-container img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            cursor: pointer;
        }

        .edit-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            background: #fff;
            border-radius: 50%;
            padding: 6px;
            border: 1px solid #ccc;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-3">
        
        <div class="cover-photo-container rounded shadow-sm">
            <img id="coverImage" src="{{ asset('upload/zahid.jpg') }}" alt="Cover Photo">
            <button class="edit-cover-btn" onclick="$('#coverInput').click()">Edit Cover</button>
            <input type="file" id="coverInput" class="d-none" accept="image/*">

            
            <div class="profile-photo-container">
                <div class="position-relative">
                    <img id="profileImage" src="{{ asset('upload/zahid.jpg') }}" alt="Profile Photo">
                    <div class="edit-icon" onclick="$('#profileInput').click()">
                        <i class="ph-camera ph-sm"></i>
                    </div>
                    <input type="file" id="profileInput" class="d-none" accept="image/*">
                </div>
            </div>
        </div>

       
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-4">Edit Client Profile</h4>
                    <form id="clientProfileForm">
                        @csrf

                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name:</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control editable"
                                    data-field="name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address:</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control editable"
                                    data-field="email">
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Phone Number:</label>
                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control editable"
                                    data-field="phone">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth:</label>
                                <input type="date" name="dob" value="{{ $user->dob }}" class="form-control editable"
                                    data-field="dob">
                            </div>
                        </div>

                       
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Address:</label>
                                <input type="text" name="address" value="{{ $user->address }}" class="form-control editable"
                                    data-field="address">
                            </div>
                            
                            {{-- <div class="col-md-6">
                                <label class="form-label">Job Details:</label>
                                <input type="text" name="case_category" value="" class="form-control editable"
                                    data-field="case_category">
                            </div> --}}
                        </div>

                       
                        <div class="row mb-3">
                            

                            {{-- <div class="col-md-6">
                                <label class="form-label">Case Category:</label>
                                <input type="text" name="case_category" value="" class="form-control editable"
                                    data-field="case_category">
                            </div> --}}
                            
                        </div>

                       
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Case Notes / Description:</label>
                                <textarea name="notes" rows="4" class="form-control editable" data-field="notes">{{$user->notes}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


       
        <div class="modal fade" id="photoPreviewModal" tabindex="-1" aria-labelledby="photoPreviewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-2 text-center">
                    <img id="photoPreview" class="img-fluid rounded" alt="Preview">
                </div>
            </div>
        </div>
    @endsection

    {{-- @section('scripts')
        <script>
         
            $('#coverImage, #profileImage').on('click', function() {
                $('#photoPreview').attr('src', $(this).attr('src'));
                $('#photoPreviewModal').modal('show');
            });

          
            $('.editable').on('blur', function() {
                let field = $(this).data('field');
                let value = $(this).val();
                let token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('profile.update') }}",
                    type: "POST",
                    data: {
                        _token: token,
                        field: field,
                        value: value
                    },
                    success: function(res) {
                        console.log(res.message);
                    },
                    error: function() {
                        alert('Failed to update');
                    }
                });
            });

           
            $('#profileInput').on('change', function() {
                let formData = new FormData();
                formData.append('photo_type', 'profile');
                formData.append('image', this.files[0]);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: "route('profile.photo.upload')",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $('#profileImage').attr('src', res.photo_url);
                    },
                    error: function() {
                        alert('Profile photo upload failed');
                    }
                });
            });

            
            $('#coverInput').on('change', function() {
                let formData = new FormData();
                formData.append('photo_type', 'cover');
                formData.append('image', this.files[0]);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: "route('profile.photo.upload')",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        $('#coverImage').attr('src', res.photo_url);
                    },
                    error: function() {
                        alert('Cover photo upload failed');
                    }
                });
            });
        </script>
    @endsection --}}
@section('scripts')
<script>
    $(document).ready(function () {

        // ✅ Click to preview cover or profile image
        $('#coverImage, #profileImage').on('click', function () {
            $('#photoPreview').attr('src', $(this).attr('src'));
            $('#photoPreviewModal').modal('show');
        });

        // ✅ Utility: Debounce function
        function debounce(callback, delay) {
            let timer;
            return function () {
                clearTimeout(timer);
                timer = setTimeout(() => callback.apply(this, arguments), delay);
            };
        }

        // ✅ Blur handler for editable fields with debounce and feedback
        $('.editable').on('blur', debounce(function () {
            let $input = $(this);
            let field = $input.data('field');
            let value = $input.val().trim();
            let token = $('input[name="_token"]').val();

            if (!field || value === '') {
                $input.addClass('is-invalid');
                return;
            }

            $input.removeClass('is-valid is-invalid').addClass('is-loading');

            $.ajax({
                url: @json(route(getPrefix().'client-details.update',auth()->user()->id)),
                type: "PUT",
                data: {
                    _token: token,
                    field: field,
                    value: value
                },
                success: function (res) {
                    console.log(res.message);
                    $input.removeClass('is-loading is-invalid').addClass('is-valid');
                },
                error: function () {
                    $input.removeClass('is-loading is-valid').addClass('is-invalid');
                    alert('Failed to update ' + field);
                }
            });

        }, 400));

        // ✅ Profile image upload
        $('#profileInput').on('change', function () {
            let formData = new FormData();
            formData.append('photo_type', 'profile');
            formData.append('image', this.files[0]);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route(getPrefix().'image.store',auth()->user()->id)}}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    $('#profileImage').attr('src', res.photo_url);
                },
                error: function () {
                    alert('Profile photo upload failed');
                }
            });
        });

        // ✅ Cover image upload
        $('#coverInput').on('change', function () {
            let formData = new FormData();
            formData.append('photo_type', 'cover');
            formData.append('image', this.files[0]);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route(getPrefix().'image.store',auth()->user()->id)}}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    $('#coverImage').attr('src', res.photo_url);
                },
                error: function () {
                    alert('Cover photo upload failed');
                }
            });
        });

    });
</script>
@endsection
