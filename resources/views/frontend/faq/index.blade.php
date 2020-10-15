@extends('frontend.app')

@section('content')


<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h1 class="">
            Frequently Asked Question
          </h1>
        </div>
      </div>
    </div>
            
          <div class="container py-3">
            <div class="row">
                <div class="col-10 mx-auto">
                  @foreach($faq as $f)
                    <div class="accordion" id="faqExample">
                        
                        <div class="card">
                            <div class="card-header p-2" id="headingTwo">
                                <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Q: {{ $f->pertanyaan }}
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
                                <div class="card-body">
                                    A : {{ $f->jawaban }}
                                </div>
                            </div>
                        </div>
                      
                    </div>
                  @endforeach
                </div>
            </div>
            <!--/row-->
        </div>
        <!--container-->
  </div>

@endsection


