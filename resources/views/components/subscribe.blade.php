{{-- <div class="o-row o-row--width-normal s-color-scheme">
    <div class="o-container o-container--width-normal o-container--width-same">
        <div class="o-sm-col-12">
            <div class="c-empty-space c-empty-space--md"></div>
        </div>
    </div>
</div> --}}




<div id="subscribe" class="o-row new-homepage-contact-us o-row--width-normal s-color-scheme">
    <div class="o-container o-container--width-normal o-container--width-same">
        <div class="o-sm-col-12">
            {{-- <div class="o-row o-container">
                <div
                    class="o-sm-col-12 o-lg-col-offset-0 o-lg-col-4 o-hidden-lg o-md-col-offset-0 o-md-col-4 o-hidden-md o-sm-col-offset-0 o-xs-col-12">
                    <div class="c-headings-block gradient_color gradient_color u-font-size-extra-large">
                        <div class=" u-font-size-extra-large c-headings-block__sub">
                            </p>
                            <h3>Let’s Work<br />
                                Together</h3>
                            <p>
                        </div>
                    </div>
                    <div class="c-empty-space c-empty-space--xs"></div>
                    <div class="wpb_single_image wpb_content_element vc_align_">
                        <figure class="wpb_wrapper vc_figure">
                            <div class="vc_single_image-wrapper   vc_box_border_grey"><img loading="lazy"
                                    decoding="async" width="660" height="789"
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                    class="lazy " loading="lazy"
                                    data-src="wp-content/uploads/2023/11/homepage-lets-work-together.png"
                                    class="lazy vc_single_image-img attachment-full" alt
                                    title="homepage-lets-work-together"
                                    data-srcset="wp-content/uploads/2023/11/homepage-lets-work-together.png 660w, wp-content/uploads/2023/11/homepage-lets-work-together-251x300.png 251w"
                                    sizes="(max-width: 660px) 100vw, 660px" /><noscript><img loading="lazy"
                                        decoding="async" width="660" height="789"
                                        src="wp-content/uploads/2023/11/homepage-lets-work-together.png"
                                        class="vc_single_image-img attachment-full" alt=""
                                        title="homepage-lets-work-together"
                                        srcset="wp-content/uploads/2023/11/homepage-lets-work-together.png 660w, wp-content/uploads/2023/11/homepage-lets-work-together-251x300.png 251w"
                                        sizes="(max-width: 660px) 100vw, 660px" /></noscript>
                            </div>
                        </figure>
                    </div>
                </div>
                <div
                    class="o-sm-col-12 o-lg-col-offset-1 o-lg-col-6 o-md-col-offset-1 o-md-col-6 o-sm-col-offset-0 o-hidden-sm o-xs-col-12 o-hidden-xs">
                    <div>
                        <div id="hubspot-form-35af469e-31f9-44cb-8d2c-24ffa4a83132-2726"
                            class="c-hs-form-wrap js-hs-form-wrap">


                        </div>
                    </div>
                    <div class="c-empty-space c-empty-space--lg"></div>
                </div>
            </div> --}}
            <div class="o-row o-container">
                <div
                    class="o-sm-col-12 o-lg-col-offset-0 o-lg-col-4 o-hidden-lg o-md-col-offset-0 o-md-col-4 o-hidden-md o-sm-col-offset-0 o-xs-col-12">
                    <div class="c-headings-block u-font-size-extra-large">
                        <h2 class="gradient_color  c-headings-block__main h3">
                            Join As A Mentor </h2>
                    </div>
                </div>
                <div
                    class="o-sm-col-12 o-lg-col-offset-1 o-lg-col-6 o-hidden-lg o-md-col-offset-1 o-md-col-6 o-hidden-md o-sm-col-offset-0 o-xs-col-12">
                    <div>
                        <div id="hubspot-form-35af469e-31f9-44cb-8d2c-24ffa4a83132-87753"
                            class="c-hs-form-wrap js-hs-form-wrap">

                            {{-- bootstrap form to accept mentors data and insert into database --}}

                            <form method="POST" action="{{ route('subscribe.save') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- Name --}}
                                <div class="form-group
                                    {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Name <span style="color:red">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        required>
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>

                                {{-- Upload Profile --}}
                                <div class="upload-container">
                                    <div id="uploadArea3" class="upload-area">
                                        <input name="profile" type="file" id="fileInput3" class="upload-input"
                                            style="display: none;" required />
                                        <button type="button" class="upload-button" id="browseButton3">Upload Profile
                                            Image<span style="color:red">*</span></button>
                                    </div>
                                    <div class="preview-container" id="previewContainer3"></div>
                                </div>

                                {{ $errors->has('profile') ? 'has-error' : '' }}


                                {{-- Email --}}
                                <div class="form-group
                                    {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email">Email <span style="color:red">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        required>
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>

                                {{-- Phone --}}
                                <div class="form-group
                                    {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="phone">Phone (+91) <span style="color:red">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                        onkeyup="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>

                                {{-- College --}}
                                <div class="form-group
                                    {{ $errors->has('college') ? 'has-error' : '' }}">
                                    <label for="college">College Name <span style="color:red">*</span></label>
                                    <input type="text" name="college" class="form-control" value="{{ old('college') }}"
                                        required>
                                    <span class="text-danger">{{ $errors->first('college') }}</span>
                                </div>

                                <br>

                                {{-- upload college id --}}
                                <div class="upload-container">
                                    <div id="uploadArea" class="upload-area">
                                        <input name="collegeproof" type="file" id="fileInput" class="upload-input"
                                            multiple style="display: none;" required />
                                        <button type="button" class="upload-button" id="browseButton">Upload College ID
                                            / Document <span style="color:red">*</span></button>
                                    </div>
                                    <div class="preview-container" id="previewContainer"></div>
                                </div>



                                {{-- Qualification Year --}}
                                <div class="form-group
                                    {{ $errors->has('year') ? 'has-error' : '' }}">
                                    <label for="year">Neet Qualifying Year <span style="color:red">*</span></label>

                                    <select id="select2" name="year" id="year" required>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>

                                </div>

                                {{-- NEET Score --}}
                                <div class="form-group
                                    {{ $errors->has('score') ? 'has-error' : '' }}">
                                    <label for="score">NEET All India Rank <span style="color:red">*</span></label>
                                    <input type="text" name="score" class="form-control" value="{{ old('score') }}"
                                        required>
                                    <span class="text-danger">{{ $errors->first('score') }}</span>
                                </div>
                                <br>

                                {{-- upload score card --}}
                                <div class="upload-container">
                                    <div id="uploadArea2" class="upload-area">
                                        <input name="scoreproof" type="file" id="fileInput2" class="upload-input"
                                            style="display: none;" required />
                                        <button type="button" class="upload-button" id="browseButton2">Upload Score Card
                                            <span style="color:red">*</span></button>
                                    </div>
                                    {{ $errors->has('scoreproof') ? 'has-error' : '' }}
                                    <div class="preview-container" id="previewContainer2"></div>
                                </div>

                                {{-- Subject Expert --}}
                                <div class="form-group
                               {{ $errors->has('subject_expert') ? 'has-error' : '' }}">
                                    <label for="subject_expert"> Subject Expert<span style="color:red">*</span></label>
                                    <input type="text" name="subject_expert" class="form-control"
                                        value="{{ old('subject_expert') }}" required>
                                    <span class="text-danger">{{ $errors->first('subject_expert') }}</span>
                                </div>
                                    
                                    {{-- Message --}}
                                <div class="form-group
                                    {{ $errors->has('message') ? 'has-error' : '' }}">
                                    <label for="message">About Yourself <span style="color:red">*</span></label>
                                    <textarea required name="message" placeholder="Tell us about your success story"
                                        class="form-control">{{ old('message') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                </div>
                                
                               {{-- Upload Vedio Clip --}}

                                <div class="upload-container">
                                    <div id="uploadArea4" class="upload-area">
                                        <input name="video_clip" type="file" id="fileInput4" class="upload-input"
                                            style="display: none;" required />
                                        <button type="button" class="upload-button" id="browseButton4">Upload Video Clip
                                            <span style="color:red">*</span></button>
                                    </div>
                                    <div class="preview-container" id="previewContainer4"></div>
                                </div>

                                {{ $errors->has('video_clip') ? $errors->first('video_clip') : '' }}

                                {{-- Consent --}}
                                <div class="form-group
                                    {{ $errors->has('consent') ? 'has-error' : '' }}">
                                    <label for="consent">Consent</label>
                                    <input type="checkbox" name="consent" class="form-control"
                                        value="{{ old('consent') }}">
                                    <span class="text-danger">{{ $errors->first('consent') }}</span>
                                </div>

                                {{-- submit button --}}

                                <div class="form-group
                                    {{ $errors->has('submit') ? 'has-error' : '' }}">
                                    <button type="submit" class="upload-button">Submit</button>
                                </div>
                            </form>

                            {{-- if success swal fire shown --}}
                            @if (Session::has('success'))
                            <script>
                                Swal.fire({
                                            title: 'Success',
                                            text: '{{ Session::get('success') }}',
                                            icon: 'success',
                                            confirmButtonText: 'Ok'
                                        })

                            </script>
                            @endif



                        </div>
                    </div>
                    <div class="c-empty-space c-empty-space--lg"></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- select2 js --}}