<div>
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Contact</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <form wire:submit.prevent="submitForm" id="contactForm" action="/contact" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name" wire:model="name">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                    <!-- <div class="help-block with-errors"></div> -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Your Email" id="email" class="form-control" name="name" required data-error="Please enter your email " wire:model="email">
                                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                    <!-- <div class="help-block with-errors"></div> -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="Your Message" rows="4" data-error="Write your message" required wire:model="message"></textarea>
                                    @error('message') <p class="text-danger">{{$message}}</p> @enderror
                                    <!-- <div class="help-block with-errors"></div> -->
                                </div>
                                <div class="submit-button text-center">
                                    <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                                    <!-- <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>