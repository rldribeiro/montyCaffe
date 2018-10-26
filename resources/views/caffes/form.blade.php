@csrf
<div class="form-group">
    <label>Caffe Name:</label>

    @if(isset($caffe))
    <input type="text" class="form-control" id="caffeName" name="name" placeholder="Ex.: Monty" value="{{$caffe->name or old('name')}}" disabled />
    <small id="nameMotivation" class="form-text text-muted">
        The name of the caffe cannot be changed!
    @else
    <input type="text" class="form-control" id="caffeName" name="name" placeholder="Ex.: Monty" value="{{$caffe->name or old('name')}}" />
    <small id="nameMotivation" class="form-text text-muted">        
        Be creative!
    @endif
    </small>

</div>
<div class="form-group">
    <label>Description:</label>
    <textarea type="text" class="form-control" id="caffeDescription" name="description" placeholder="What characterizes your place?"
        rows="3" >{{$caffe->description or old('description')}}</textarea>
</div>

<div class="form-group">
    <label>Caffe Logo:</label>
    <input type="text" class="form-control" id="caffeLogo" name="logo_url" placeholder="Ex.: https://the.meaning.of.life.jpg" value="{{$caffe->logo_url or old('logo_url')}}">
    <small id="nameMotivation" class="form-text text-muted">You should paste the url of a public
        picture!</small>
</div>