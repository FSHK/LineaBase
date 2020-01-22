<div class="modal fade modal-slide-in-right" id="modal-subpreguntas-{{$P->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sub Preguntas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
			<nav>
			  <div class="nav nav-tabs" id="nav-tab-subpreguntas" role="tablist">
			    <a class="nav-item nav-link active" id="nav-home-tab-subpreguntas" data-toggle="tab" href="#nav-homesubpreguntas" role="tab" aria-controls="nav-homesubpreguntas" aria-selected="true">Gestionar SubPreguntas</a>
			    @if(App\SubPreguntas::where('pregunta_id','=',$P->id)->count() > 0)
			    <a class="nav-item nav-link" id="nav-contact-tabsubpreguntas" data-toggle="tab" href="#nav-contactsubpreguntas" role="tab" aria-controls="nav-contact" aria-selected="false">Agregar Respuestas</a>
			    @endif
			  </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-homesubpreguntas" role="tabpanel" aria-labelledby="nav-home-tabsubpreguntas">
					<form action="{{route('add_subs',[$P->id])}}" method="POST">
					@csrf
					@if(App\SubPreguntas::where('pregunta_id','=',$P->id)->count() > 0)
					<div class="form-group">
						@foreach(App\SubPreguntas::select('Nombre','id')->where('pregunta_id','=',$P->id)->where('categoria','=',1)->get() as $S1)
						<label for="recipient-name" class="col-form-label">SubPregunta Positiva</label>
						<input type="text" class="form-control" name="S1" placeholder="Ingrese la Sub-Pregunta Positiva" value="{{$S1->Nombre}}">
						@endforeach
					</div>
					<div class="form-group">
						@foreach(App\SubPreguntas::select('Nombre','id')->where('pregunta_id','=',$P->id)->where('categoria','=',0)->get() as $S2)
						<label for="message-text" class="col-form-label">SubPregunta Negativa:</label>
						<input type="text" class="form-control" name="S2" placeholder="Ingrese la Sub-Pregunta Negativa" value="{{$S2->Nombre}}">
						@endforeach
					</div>
					@else
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">SubPregunta Positiva</label>
						<input type="text" class="form-control" name="S1" placeholder="Ingrese la SubPregunta Positiva">
					</div>
					<div class="form-group">
						<label for="message-text" class="col-form-label">SubPregunta Negativa:</label>
						<input type="text" class="form-control" name="S2" placeholder="Ingrese la SubPregunta Negativa">
					</div>
					@endif
					<button type="submit" class="btn btn-primary">Actualizar</button>
					</form>
				</div>
				@if(App\SubPreguntas::where('pregunta_id','=',$P->id)->count() > 0)
				<div class="tab-pane fade" id="nav-contactsubpreguntas" role="tabpanel" aria-labelledby="nav-contact-tabsubpreguntas">
					<form action="{{route('add_answers')}}" method="POST">
						@csrf
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Sub-Pregunta:</label>
							<select name="sub_id" class="form-control" >
								@foreach(App\SubPreguntas::select('Nombre','id')->where('pregunta_id','=',$P->id)->get() as $S)
									<option value="{{$S->id}}">{{$S->Nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="message-text" class="col-form-label">Nueva Respuesta:</label>
							<textarea name="Answer" class="form-control"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</form>
				</div>
				@endif
			</div>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>