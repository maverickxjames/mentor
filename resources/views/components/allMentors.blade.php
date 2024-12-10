<?php 

use App\Models\Subscribe;
use Illuminate\Support\Facades\Storage;
?>
<?php
$subscribes = Subscribe::where('status',1)->get();


if(count($subscribes) > 0){
    ?>
    <div class="o-row o-container my-5">
        <div class="d-flex w-full mb-4">
            <h2 style="font-size: 40px">Our Mentors</h2>
            {{-- <a href="#" class="btn btn-link">View all &rarr;</a> --}}
        </div>
    
        
        <div class="row col-12">
            <!-- Card 1 -->
            @foreach($subscribes as $key => $subscribe)

            
            <div  class="col-md-3 mb-5">
                <div class="card shadow-sm">
        
                    <div class="card-body">
                        <div style="gap: 10px" class="d-flex justify-content-start align-items-center ">
                            <img src="{{ asset('uploads/profile/'.$subscribe->profile) }}" alt={{ $subscribe->profile }} class="rounded-circle testimonial-image" >
                            <div>
                                <h5 class="card-title">{{ $subscribe->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $subscribe->college }}</h6>
                            </div>
                        </div>
                        
                        <p class="card-text">
                           {{ $subscribe->message }}
                        </p>
                        <hr>
                        <p><strong>Subject Expert :</strong> {{ $subscribe->subject_expert }}</p>
                        
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
    
    <?php
}
else {
    $subscribes = [];
}
?>

