@if(count($errors) > 0)
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-6 error" style="margin-left: 400px;">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>
    </div>
@endif
