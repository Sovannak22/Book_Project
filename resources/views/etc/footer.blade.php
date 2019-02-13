<div class="bg-dark">
    <div style="height:200px" class="container pt-3">
        <div class="row text-light text-justify mt-3">
            <div style="border-right:solid white 2px" class="col-lg-4 col-md-4 col-12 col-sm-12">
                <h1 class="">
                    {{$store->store_name}}
                </h1>
                <p>
                    {{$store->user->name}}
                </p>
                <p>
                    {{$store->address}}
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                <h1 >About store</h1>
                <p>
                    {{$store->store_description}}
                </p>
            </div>
            <div style="border-left:solid white 2px" class="col-lg-4 col-md-4 col-12 col-sm-12 text-right">
                <h1>
                    <strong>
                        Contact
                    </strong>
                </h1>
                <p>
                    {{$store->phone_number}}
                </p>
                <p>
                    {{$store->email}}
                </p>
            </div> 
        </div>
    </div>
</div>