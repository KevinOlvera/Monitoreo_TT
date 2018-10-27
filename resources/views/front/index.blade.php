@extends('front.template.main')

@section('title', 'Monitoreo de TT')

@section('header')
	<div class="page-header header-filter" data-parallax="true" style="background-image: url('files/img/desk-worker.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Monitorear tus TT's nunca habia sido tan sencillo.</h1>
          <h4>Agilizar el proceso para entrega de requerimientos en los protocolos de TT1, TT2 y TTR de los estudiantes de la ESCOM.</h4>
          <br>
					@guest
						<a href="{{ route('register') }}" class="btn btn-danger btn-raised btn-lg">
	            <i class="fa fa-play"></i> &nbsp;Registrate
	          </a>
					@else
						<a href="{{ route('admin.users.dashboard') }}" class="btn btn-danger btn-raised btn-lg">
	            <i class="fa fa-play"></i> &nbsp;Comienza
	          </a>
					@endguest
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="main main-raised">
	<div class="container">

	  <div class="section text-center">
	    <div class="row">
	      <div class="col-md-8 ml-auto mr-auto">
	        <h2 class="title">¿Qué hacemos?</h2>
	        <h5 class="description">
	        	Esta plataforma esta diseñada para resolver la problemática que sufre la escomunidad que se encuentra en protocolo TT1, TT2 y TTR, los cuales, por lo general tienen dificultades para localizar o contactar con sus synodales para la entrega o revision de documentos.
	        </h5>
	      </div>
	    </div>

	    <div class="features">
	      <div class="row">
	        <div class="col-md-4">
	          <div class="info">
	            <div class="icon icon-info">
	              <i class="material-icons">today</i>
	            </div>
	            <h4 class="info-title">Citas</h4>
	            <p>Agenda citas con todos los miembros de tu proyecto y sinodales.</p>
	          </div>
	        </div>

	        <div class="col-md-4">
	          <div class="info">
	            <div class="icon icon-success">
	              <i class="material-icons">verified_user</i>
	            </div>
	            <h4 class="info-title">Usuarios Verificados</h4>
	            <p>Todos los usuarios registrados son verificados por el sistema de administracion de la unidad.</p>
	          </div>
	        </div>

	        <div class="col-md-4">
	          <div class="info">
	            <div class="icon icon-danger">
	              <i class="material-icons">archive</i>
	            </div>
	            <h4 class="info-title">Archivos</h4>
	            <p>Sube archivos pdf, png, jpg, zip a tu proyecto para compartirlo con tu equipo y sinodales.</p>
	          </div>
	        </div>
	      </div>
	    </div>
	    </div>

	  <!--<div class="section text-center">
	    <h2 class="title">Here is our team</h2>
	    <div class="team">
	      <div class="row">
	        <div class="col-md-4">
	          <div class="team-player">
	            <div class="card card-plain">
	              <div class="col-md-6 ml-auto mr-auto">
	                <img src="files/img/faces/avatar.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
	              </div>

	              <h4 class="card-title">Gigi Hadid
	                <br>
	                <small class="card-description text-muted">Model</small>
	              </h4>

	              <div class="card-body">
	                <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
	                <a href="#">links</a> for people to be able to follow them outside the site.</p>
	              </div>

	              <div class="card-footer justify-content-center">
	                <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
	                <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
	                <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
	              </div>
	            </div>
	          </div>
	        </div>

	        <div class="col-md-4">
	          <div class="team-player">
	            <div class="card card-plain">
	              <div class="col-md-6 ml-auto mr-auto">
	                <img src="files/img/faces/christian.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
	              </div>

	              <h4 class="card-title">Christian Louboutin
	                <br>
	                <small class="card-description text-muted">Designer</small>
	              </h4>

	              <div class="card-body">
	                <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
	                <a href="#">links</a> for people to be able to follow them outside the site.</p>
	              </div>
	              <div class="card-footer justify-content-center">
	                <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
	                <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-linkedin"></i></a>
	              </div>
	            </div>
	          </div>
	        </div>

	        <div class="col-md-4">
	          <div class="team-player">
	            <div class="card card-plain">
	              <div class="col-md-6 ml-auto mr-auto">
	                <img src="files/img/faces/kendall.jpg" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
	              </div>

	              <h4 class="card-title">Kendall Jenner
	                <br>
	                <small class="card-description text-muted">Model</small>
	              </h4>

	              <div class="card-body">
	                <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
	                <a href="#">links</a> for people to be able to follow them outside the site.</p>
	              </div>

	              <div class="card-footer justify-content-center">
	                <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
	                <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
	                <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
	              </div>
	            </div>
	          </div>
	        </div>

	      </div>

	    </div>
	  </div>-->

	  <!--<div class="section section-contacts">
	    <div class="row">
	      <div class="col-md-8 ml-auto mr-auto">
	        <h2 class="text-center title">Work with us</h2>
	        <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>

	        <form class="contact-form">
	          <div class="row">
	            <div class="col-md-6">
	              <div class="form-group">
	                <label class="bmd-label-floating">Your Name</label>
	                <input type="email" class="form-control">
	              </div>
	            </div>
	            <div class="col-md-6">
	              <div class="form-group">
	                <label class="bmd-label-floating">Your Email</label>
	                <input type="email" class="form-control">
	              </div>
	            </div>
	          </div>

	          <div class="form-group">
	            <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
	            <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
	          </div>

	          <div class="row">
	            <div class="col-md-4 ml-auto mr-auto text-center">
	              <button class="btn btn-primary btn-raised">Send Message</button>
	            </div>
	          </div>
	        </form>
	      </div>
	    </div>
	  </div>-->

	</div>
</div>
@endsection
