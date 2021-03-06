<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form method="POST" action="{{route('admin.posts.store')}}">
        {{ csrf_field() }}

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega el titulo de tu nueva publicacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                        {{-- <label>Titulo de la publicacion</label> --}}
                        <input 
                            name="title" 
                            class="form-control"
                            value="{{old('title')}}" 
                            placeholder="Ingresa aqui el titulo de la publicacion"
                        >
                        {!!$errors->first('title', '<span class="help-block">:message</span>')!!}
                            
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Crear publicacion</button>
                </div>
            </div>
        </div>
    </form>
</div>