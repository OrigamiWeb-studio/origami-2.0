@extends('layouts.app')

@section('content')
	<main>
		<div class="breadcrumbs">
			<div class="container">
				<ul>
					<li>
						<a href="{{ route('home') }}">{{ __('Home') }}</a>
					</li>
					<li>
						<a href="{{ route('projects') }}">{{ __('Projects') }}</a>
					</li>
					<li>
						<a href="{{ route('project', ['id' => $ticket->project->id]) }}">{{ $ticket->project->title }}</a>
					</li>
					<li>
						<a href="{{ route('project-tickets', ['project_id' => $ticket->project->id]) }}">{{ __('Tickets') }}</a>
					</li>
					<li>
						<a href="{{ route('ticket', ['id' => $ticket->id]) }}">{{ $ticket->title }}</a>
					</li>
				</ul>
			</div>
		</div>


		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>{{ $ticket->project->title }} - {{ $ticket->title }}</h1>
					<p>{{ $ticket->description }}</p>
					<hr>
					<h2>Кроки:</h2>
					<ul>
						@foreach($ticket->steps as $key => $step)
							<li>
								<span>{{ $key + 1 }}. {{ $step->created_at }}</span>
								<span>- {{ $step->time }}min. ({{ round($step->time / 60 * $step->rate, 2) }}$) -</span>
								<span>{{ $step->developer->profile->name }}</span>
								<span>- {{ $step->comment }}</span>
								<a href="#">Редагувати</a>
								<a href="#">Видалити</a>
							</li>
						@endforeach
					</ul>

					<hr>
					<div class="col-xs-2">
						<p>Time: {{ $ticket->total_time }} / Price: {{ $ticket->total_price }}$</p>
					</div>
					<div class="col-xs-3">
						<p>Приписаний до: {{ $ticket->developer->profile->name }}</p>
					</div>
					<div class="col-xs-3">
						<p>Активний етап: {{ $ticket->stage->title }}</p>
					</div>
					<div class="col-xs-2">
						<p>Тип: {{ $ticket->type == 1 ? 'Баг' : 'Новий функціонал' }}</p>
					</div>
					<div class="col-xs-2">
						<p>Статус: {{ $ticket->type == 0 ? 'Виконано' : 'В процесі' }}</p>
					</div>
					<div class="col-xs-12">
						<p>Додано: {{ $ticket->created_at }} - Останній апдейт: {{ $ticket->updated_at }} - Закрито: {{ $ticket->updated_at }}</p>
					</div>
					<div class="col-xs-12">
						<p>
							<a href="#">Delete</a> -
							<a href="#">Edit</a>
						</p>
					</div>
					<hr>
					<h2>Comments</h2>

					comments + form
					<br>//Ім'я, прізвище, час. Виділити клієнта і розробника (кольором чи хз як). + відповідь може бути. даже аватарка може бути тут
					<br>+ пагінація (чи без, яхз)

				</div>
			</div>
		</div>


	</main>
@stop