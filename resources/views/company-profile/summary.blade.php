<style>
    .image-container {
        position: relative;
        width: 200px;
        height: 300px;
    }
    .image-container .after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: no-repeat center url('/img/hired.png')
    }
    .image-container:hover .after {
        display: block;
        opacity: 0.3;
    }
</style>
<div class="container-fluid std_more">
    <div class="row" style="border:solid #ddd 2px; padding-left: 5px; padding-top: 18px; padding-bottom: 18px">
        @if($company)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        <div style="margin: 20px; padding: 5px;">

                            <div><strong>Name: </strong></div> <p style="font-size: 1em" id="phone">{{ $company->name }}</p>
                                <div><strong>Name: </strong></div> <p style="font-size: 1em" id="degree">{{ $company->name }}</p>
                        </div>    
                </div>
            </div>
        </div>
            <br><br>
        @else
            <h3>Details not available !</h3>
        @endif
    </div>
</div>