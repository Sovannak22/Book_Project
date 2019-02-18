<div>
    <div style="height:200px" class="pt-3">
        <div class="row text-light px-3 mt-3 bg-dark">
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
            <div class="col-lg-4 col-md-4 col-12 col-sm-12 bg-dark">
                <h1 >About store</h1>
                <p>
                    {{$store->store_description}}
                </p>
            </div>
            <div style="border-left:solid white 2px" class="col-lg-4 col-md-4 col-12 col-sm-12 text-right bg-dark">
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
