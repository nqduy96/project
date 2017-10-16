<!DOCTYPE html>
<html lang="fr"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sheldon COOPER - Physicien surdoué et Geek qualifié</title>

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Fichiers CSS -->
<link rel="stylesheet" href="{{ asset('Sheldon/reset.css') }}">
<!--[if lt IE 9]> 
	<link rel="stylesheet" href="css/cv.css" media="screen">
<![endif]-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" media="screen and (max-width:480px)" href="{{ asset('Sheldon/mobile.css') }}">
<link rel="stylesheet" media="screen and (min-width:481px)" href="{{ asset('Sheldon/cv.css') }}">
<link rel="stylesheet" media="print" href="{{ asset('Sheldon/print.css') }}">
</head>

<body>

	<!-- Header -->
	<header role="banner">
		<div class="container_16">
				<hgroup>
					<h1>{{ $information->lastname }} {{ $information->firstname }}</h1>
					<h2>Physicien surdoué - Geek qualifié</h2>
				</hgroup>

				<figure>
					<img src="{{ '/userPic/' . $information->picture . '.jpg' }}">
				</figure>
		</div>
	</header>
	
	<!-- Contact -->
	<section class="contactform clearfix">
		<div class="container_16">
			<h3>Contactez-moi</h3>
			<p>Remplissez le formulaire ci-dessous afin de m'envoyer un message. Je vous répondrais dans les plus bref délai. 
			<br><em>Tous les champs sont requis.</em></p>
			<form novalidate="novalidate" method="post" action="#" name="contact" class="grid_16">
				<p class="grid_10"><textarea name="message" placeholder="Votre message" class="required"></textarea></p>
				<p class="grid_6">
					<input name="nom" placeholder="Nom - Prénom" class="required" type="text">
					<input name="email" placeholder="Adresse email" class="required" type="email">	
					<input name="envoi" value="Envoyer le message" class="required" type="submit">
					<span class="messageform"></span>
				</p>
			</form>
		</div>
	</section>
	
	<!-- Corps -->
	<section role="main" class="container_16 clearfix">
		<div class="grid_16">
			<!-- A propos -->
			<div class="grid_8 apropos">
				
				<h3 style="padding-left:0;"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i> Introduce </h3>
				<p>Cette section vous sert de présentation.</p>
				<p>Pellentesque nec nisi at sapien sagittis sagittis. Aliquam eu 
condimentum mauris. Proin accumsan enim at risus hendrerit lobortis. 
Nunc sollicitudin sodales lectus, et rhoncus mi molestie hendrerit. 
Vestibulum velit lorem, rhoncus a congue ultricies, faucibus facilisis 
risus. Mauris turpis ante, aliquet ac venenatis at, ornare ut velit. 
Duis ut erat neque, eget consectetur tellus. </p>
			</div>
			
			<!-- Compétences -->
			<div class="grid_8 competences">
				<h3 style="padding-left:0;"><i class="fa fa-book fa-lg" aria-hidden="true"></i> Skill</h3>
				<ul class="barres">
				@if(count($skills) > 0)
                	@foreach($skills as $skill)
						<li data-skills="{{ $skill->percent }}">{{ $skill->name }}<span style="width: {{ $skill->percent }}%;"></span></li>
					@endforeach
                @endif
				</ul>
			</div>
		</div>
		
			<!-- Expériences -->
			<div class="grid_16 experiences">
				<h3 style="padding-left:0;"><i class="fa fa-university fa-lg" aria-hidden="true"></i> Experiences</h3>
				<ul>
					@if(count($experiences) > 0)
						@foreach( $experiences as $experience)
							<li>
								<h4><strong>{{ $experience->year }}</strong> - {{ $experience->position }}</h4>
								<span class="dates">Company: {{ $experience->company }}</span>
								<p>{{ $experience->content }}</p>
							</li>
						@endforeach
					@endif
				</ul>
			</div>
		
			<!-- Formations -->
			<div class="grid_16 formations">
				<h3 style="padding-left:0;"><i class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i> Education</h3>
				<ul>
					@if(count($educations) > 0)
						@foreach($educations as $education)
						<li>
							<h4><strong>{{ $education->year }}</strong> - {{ $education->school }} ( <i> {{ $education->major }} </i> )</h4>
							<p>{{ $education->content }}</p>
						</li>
						@endforeach
					@endif
				</ul>
			</div>
		
			<!-- Loisirs -->
			<div class="grid_8 loisirs">
				<h3 style="padding-left:0;"><i class="fa fa-smile-o fa-lg" aria-hidden="true"></i> Loisirs</h3>
				<p><strong>Sports :</strong> si vous en pratiquez</p>
				<p><strong>Association :</strong> si vous êtes membre d'une association</p>
				<p>D'autres loisirs plus vagues, complétez ici.</p>
			</div>
		
			<!-- Contact -->
			<div class="grid_8 contact">
				<h3 style="padding-left:0;"><i class="fa fa-phone fa-lg" aria-hidden="true"></i> Contact</h3>
				<p>If you are interested in my profile, please don't hesitate to contact me:</p>
				<ul>
					<li class="site">{{ $information->address }} </li>
					<li class="phone">{{ $information->phone }}</li>
					<li class="mail">{{ $information->mail }}</li>
					@if($information->skype != "")
						<li class="site">{{ $information->skype }}</li>
					@endif
				</ul>
			</div>
	</section>

<!-- Scripts JavaScript -->
<script src="{{ asset('Sheldon/jquery-1.js') }}"></script>
<script src="{{ asset('Sheldon/validate.js') }}"></script>
<!--[if lt IE 9]>
<script src="scripts/placeholder.js"></script>
<![endif]-->
<script src="{{ asset('Sheldon/plugins.js') }}"></script>

</body></html>