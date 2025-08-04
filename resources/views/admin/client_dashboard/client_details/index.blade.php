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
        {{--         
        <div class="cover-photo-container rounded shadow-sm">
            <img id="coverImage" src="{{ $user->cover_image ? 'data:image/jpeg;base64,' . base64_encode($user->cover_image) : asset('upload/default_cover.jpg') }}" alt="Cover Photo">
            <button class="edit-cover-btn" onclick="$('#coverInput').click()">Edit Cover</button>
            <input type="file" id="coverInput" class="d-none" accept="image/*">

            
            <div class="profile-photo-container">
                <div class="position-relative">
                   <img id="profileImage" src="{{ $user->profile_image ? 'data:image/jpeg;base64,' . base64_encode($user->profile_image) : asset('upload/default_profile.jpg') }}" alt="Profile Photo">
                    <div class="edit-icon" onclick="$('#profileInput').click()">
                        <i class="ph-camera ph-sm"></i>
                    </div>
                    <input type="file" id="profileInput" class="d-none" accept="image/*">
                </div>
            </div>
        </div> --}}
        <div class="cover-photo-container rounded shadow-sm">

            <!-- ✅ Use image path directly (from public folder) -->
            <img id="coverImage"
                src="{{ $user->cover_image ? asset($user->cover_image) : asset('upload/default_cover.jpg') }}"
                alt="Cover Photo">

            <button class="edit-cover-btn" onclick="$('#coverInput').click()">Edit Cover</button>
            <input type="file" id="coverInput" class="d-none" accept="image/*">

            <div class="profile-photo-container">
                <div class="position-relative">

                    <img id="profileImage"
                        src="{{ $user->profile_image ? asset($user->profile_image) : asset('upload/default_profile.jpg') }}"
                        alt="Profile Photo">

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
                                <input type="text" name="name" value="{{ $user->name }}"
                                    class="form-control editable" data-field="name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address:</label>
                                <input type="email" name="email" value="{{ $user->email }}"
                                    class="form-control editable" data-field="email">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Phone Number:</label>
                                <input type="text" name="phone" value="{{ $user->phone }}"
                                    class="form-control editable" data-field="phone">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth:</label>
                                <input type="date" name="dob" value="{{ $user->dob }}"
                                    class="form-control editable" data-field="dob">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Address:</label>
                                <input type="text" name="address" value="{{ $user->address }}"
                                    class="form-control editable" data-field="address">
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
                                <textarea name="notes" rows="4" class="form-control editable" data-field="notes">{{ $user->notes }}</textarea>
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
@endsection --}}

    {{-- <script>
    $(document).ready(function () {

        // ✅ Preview cover or profile image in modal
        $('#coverImage, #profileImage').on('click', function () {
            const imgSrc = $(this).attr('src');
            if (imgSrc) {
                $('#photoPreview').attr('src', imgSrc);
                $('#photoPreviewModal').modal('show');
            }
        });

        // ✅ Debounce utility function
        function debounce(callback, delay) {
            let timer;
            return function () {
                clearTimeout(timer);
                timer = setTimeout(() => callback.apply(this, arguments), delay);
            };
        }

        // ✅ Auto-save on blur for editable fields
        $('.editable').on('blur', debounce(function () {
            const $input = $(this);
            const field = $input.data('field');
            const value = $input.val().trim();
            const token = $('input[name="_token"]').val();

            if (!field || value === '') {
                $input.addClass('is-invalid');
                return;
            }

            $input.removeClass('is-valid is-invalid').addClass('is-loading');

            $.ajax({
                url: @json(route(getPrefix() . 'client-details.update', auth()->user()->id)),
                type: 'PUT',
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

        // ✅ Handle profile image upload
        $('#profileInput').on('change', function () {
            const file = this.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('photo_type', 'profile');
            formData.append('image', file);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route(getPrefix().'image.store', auth()->user()->id) }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.photo_url) {
                        $('#profileImage').attr('src', res.photo_url);
                    }
                },
                error: function () {
                    alert('Profile photo upload failed');
                }
            });
        });

        // ✅ Handle cover image upload
        $('#coverInput').on('change', function () {
            const file = this.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('photo_type', 'cover');
            formData.append('image', file);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route(getPrefix().'image.store', auth()->user()->id) }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.photo_url) {
                        $('#coverImage').attr('src', res.photo_url);
                    }
                },
                error: function () {
                    alert('Cover photo upload failed');
                }
            });
        });

    });
</script> --}}
    @section('scripts')
        {{-- <script>
    $(document).ready(function () {

        // ✅ Preview cover or profile image in modal
        $('#coverImage, #profileImage').on('click', function () {
            const imgSrc = $(this).attr('src');
            if (imgSrc) {
                $('#photoPreview').attr('src', imgSrc);
                $('#photoPreviewModal').modal('show');
            }
        });

        // ✅ Debounce utility function
        function debounce(callback, delay) {
            let timer;
            return function () {
                clearTimeout(timer);
                timer = setTimeout(() => callback.apply(this, arguments), delay);
            };
        }

        // ✅ Auto-save on blur for editable fields
        $('.editable').on('blur', debounce(function () {
            const $input = $(this);
            const field = $input.data('field');
            const value = $input.val().trim();
            const token = $('input[name="_token"]').val();

            if (!field || value === '') {
                $input.addClass('is-invalid');
                return;
            }

            $input.removeClass('is-valid is-invalid').addClass('is-loading');

            $.ajax({
                url: @json(route(getPrefix() . 'client-details.update', auth()->user()->id)),
                type: 'PUT',
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

        // ✅ Handle profile image upload
        $('#profileInput').on('change', function () {
            const file = this.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('photo_type', 'profile');
            formData.append('image', file);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route(getPrefix().'image.store', auth()->user()->id) }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    console.log(res);
                    if (res.photo_url) {
                        $('#profileImage').attr('src', res.photo_url);
                    }
                },
                error: function () {
                    alert('Profile photo upload failed');
                }
            });
        });

        // ✅ Handle cover image upload
        $('#coverInput').on('change', function () {
            const file = this.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('photo_type', 'cover');
            formData.append('image', file);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route(getPrefix().'image.store', auth()->user()->id) }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    
                    if (res.photo_url) {
                        $('#coverImage').attr('src', res.photo_url);
                    }
                },
                error: function () {
                    alert('Cover photo upload failed');
                }
            });
        });

    });
</script> --}}
        {{-- <script>
    $(document).ready(function () {

        /**
         * Open modal to preview full image
         */
        $('#coverImage, #profileImage').on('click', function () {
            const imgSrc = $(this).attr('src');
            if (imgSrc) {
                $('#photoPreview').attr('src', imgSrc);
                $('#photoPreviewModal').modal('show');
            }
        });

        /**
         * Uploads base64-encoded image via AJAX to Laravel
         * @param {HTMLElement} inputElement - File input
         * @param {string} photoType - 'profile' or 'cover'
         * @param {string} imageSelector - jQuery selector to update preview image
         */
        function uploadImage(inputElement, photoType, imageSelector) {
            const file = inputElement.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onloadend = function () {
                const base64String = reader.result;

                $.ajax({
                    url: "{{ route(getPrefix().'image.store', auth()->user()->id) }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        photo_type: photoType,
                        image: base64String
                    },
                    success: function (res) {
                        if (res.photo_url) {
                            $(imageSelector).attr('src', res.photo_url);
                            console.log(photoType + ' photo updated successfully.');
                        } else {
                            alert('Upload succeeded, but no image returned.');
                        }
                    },
                    error: function (xhr) {
                        const message = xhr.responseJSON?.message || 'Upload failed.';
                        alert(photoType.charAt(0).toUpperCase() + photoType.slice(1) + ' photo upload failed: ' + message);
                    }
                });
            };

            reader.readAsDataURL(file); // Convert file to base64
        }

        // Bind input change handlers
        $('#profileInput').on('change', function () {
            uploadImage(this, 'profile', '#profileImage');
        });

        $('#coverInput').on('change', function () {
            uploadImage(this, 'cover', '#coverImage');
        });

        /**
         * Debounce function for auto-saving text fields (optional, part of your code)
         */
        function debounce(callback, delay) {
            let timer;
            return function () {
                clearTimeout(timer);
                timer = setTimeout(() => callback.apply(this, arguments), delay);
            };
        }

        // Auto-save editable fields (optional)
        $('.editable').on('blur', debounce(function () {
            const $input = $(this);
            const field = $input.data('field');
            const value = $input.val().trim();
            const token = $('input[name="_token"]').val();

            if (!field || value === '') {
                $input.addClass('is-invalid');
                return;
            }

            $input.removeClass('is-valid is-invalid').addClass('is-loading');

            $.ajax({
                url: @json(route(getPrefix() . 'client-details.update', auth()->user()->id)),
                type: 'PUT',
                data: {
                    _token: token,
                    field: field,
                    value: value
                },
                success: function (res) {
                    $input.removeClass('is-loading is-invalid').addClass('is-valid');
                },
                error: function () {
                    $input.removeClass('is-loading is-valid').addClass('is-invalid');
                    alert('Failed to update ' + field);
                }
            });
        }, 400));
    });
</script> --}}
        <script>
            $(document).ready(function() {

                /**
                 * Handle uploading an image file using FormData
                 * @param {HTMLElement} inputElement - The file input element
                 * @param {string} photoType - 'profile' or 'cover'
                 * @param {string} imageSelector - jQuery selector for the image preview
                 */
                function uploadImage(inputElement, photoType, imageSelector) {
                    const file = inputElement.files[0];
                    if (!file) return;

                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('photo_type', photoType);
                    formData.append('image', file);

                    $.ajax({
                        url: "{{ route(getPrefix() . 'image.store', auth()->user()->id) }}",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(res) {
                            if (res.photo_url) {
                                $(imageSelector).attr('src', res.photo_url);
                                console.log(photoType.charAt(0).toUpperCase() + photoType.slice(1) +
                                    ' photo updated successfully.');
                            } else {
                                alert('Upload succeeded, but no image URL returned.');
                            }
                        },
                        error: function(xhr) {
                            const message = xhr.responseJSON?.message || 'An error occurred during upload.';
                            alert(photoType.charAt(0).toUpperCase() + photoType.slice(1) +
                                ' photo upload failed: ' + message);
                        }
                    });
                }

                /**
                 * Bind change events to file inputs
                 */
                $('#profileInput').on('change', function() {
                    uploadImage(this, 'profile', '#profileImage');
                });

                $('#coverInput').on('change', function() {
                    uploadImage(this, 'cover', '#coverImage');
                });

                /**
                 * Optional: Preview modal when clicking the profile/cover image
                 */
                $('#profileImage, #coverImage').on('click', function() {
                    const imgSrc = $(this).attr('src');
                    if (imgSrc) {
                        $('#photoPreview').attr('src', imgSrc);
                        $('#photoPreviewModal').modal('show');
                    }
                });

                /**
                 * Optional: Debounce function for auto-saving input fields
                 */
                function debounce(callback, delay) {
                    let timer;
                    return function() {
                        clearTimeout(timer);
                        timer = setTimeout(() => callback.apply(this, arguments), delay);
                    };
                }

                $('.editable').on('blur', debounce(function() {
                    const $input = $(this);
                    const field = $input.data('field');
                    const value = $input.val().trim();
                    const token = $('input[name="_token"]').val();

                    if (!field || value === '') {
                        $input.addClass('is-invalid');
                        return;
                    }

                    $input.removeClass('is-valid is-invalid').addClass('is-loading');

                    $.ajax({
                        url: @json(route(getPrefix() . 'client-details.update', auth()->user()->id)),
                        type: 'PUT',
                        data: {
                            _token: token,
                            field: field,
                            value: value
                        },
                        success: function(res) {
                            console.log(res.message);
                            $input.removeClass('is-loading is-invalid').addClass('is-valid');
                        },
                        error: function() {
                            $input.removeClass('is-loading is-valid').addClass('is-invalid');
                            alert('Failed to update ' + field);
                        }
                    });
                }, 400));
            });
        </script>
    @endsection
