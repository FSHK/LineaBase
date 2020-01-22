@extends('layouts.docentes')
@section('Docentes')
<section class="hero-wrap hero-wrap-2" style="background-image: url('kiddos/images/course-2.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Modulo Educadores</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="index.html">Educadores <i class="ion-ios-arrow-forward"></i></a></span><span>Registrar Alumnos</span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
    <div class="container">
	    <div class="row justify-content-center mb-5 pb-2">
		    <div class="col-md-8 text-center heading-section ftco-animate">
			    <h2 class="mb-4"><span>Registrar</span> Alumnos</h2>
			    <p>Por favor, complete los campos del siguiente formulario con la informacion personal, academica,religiosa y de contacto de los beneficiarios.</p>
		    </div>
	    </div>
    </div>
</section>

<section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb"  data-stellar-background-ratio="0.5"style="background-image: url('kiddos/images/bg_2.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-md-6 py-5 px-md-5 bg-primary">
				<div class="heading-section heading-section-white ftco-animate mb-5">
					<h2 class="mb-4">Datos Personales</h2>
					<p>Aca Ingrese los datos personales del estudiante.</p>
				</div>
				<form action="#" class="appointment-form ftco-animate">
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nombres">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" class="form-control" placeholder="Apellidos">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Fecha de Nacimiento">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" class="form-control" placeholder="Telefono">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Direccion"></textarea>
						</div>
					</div>

					<div class="heading-section heading-section-white ftco-animate mb-5">
						<h2 class="mb-4">Datos Academicos</h2>
						<p>Favor de Ingresar los datos academicos del estudiante aca.</p>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nombres">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" class="form-control" placeholder="Apellidos">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Fecha de Nacimiento">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" class="form-control" placeholder="Telefono">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Direccion"></textarea>
						</div>
					</div>
					<div class="heading-section heading-section-white ftco-animate mb-5">
						<h2 class="mb-4">Datos Religiosos</h2>
						<p>Aca Ingrese acerca de la teologia del benecifiario.</p>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nombres">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" class="form-control" placeholder="Apellidos">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Fecha de Nacimiento">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" class="form-control" placeholder="Telefono">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Direccion"></textarea>
						</div>
					</div>
					<div class="heading-section heading-section-white ftco-animate mb-5">
						<h2 class="mb-4">Datos Medicos</h2>
						<p>En caso de que el beneficiario posea dificultades medicas, alergias, entre otros.</p>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nombres">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" class="form-control" placeholder="Apellidos">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Fecha de Nacimiento">
						</div>
						<div class="form-group ml-md-4">
							<input type="text" class="form-control" placeholder="Telefono">
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group">
							<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Direccion"></textarea>
						</div>
					</div>
					<div class="d-md-flex">
						<div class="form-group ml-md-4">
                          <input type="submit" value="Request A Quote" class="btn btn-secondary py-3 px-4">
                        </div>
					</div>
				</form>
			</div>
		</div>
	</div>

<section class="ftco-section contact-section">
  <div class="container">
  </div>
</section>
@endsection