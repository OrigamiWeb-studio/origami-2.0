@extends('layouts.app')

@section('content')
	{{ $project }}

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
                        <a href="#">{{ $project->title }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <section class="s_project">
            <div class="container">
                <header>
                    <h1>{{ $project->title }} <span>(2017)</span></h1>
                </header>
                <div class="project-content">
                    <div class="row">
                        <aside class="col-md-3">
                            <div class="block project-item hidden-sm hidden-xs">
                                <figure>
                                    <img src="{{ asset($project->cover) }}" alt="">
                                </figure>
                                <div class="descr">
                                    <a href="{{ route('project', ['id' => $project->id]) }}">{{ $project->title }}</a>
                                    <span>#{{ $project->category->title }}</span>
                                </div>
                            </div>
                            <a href="#" class="btn block block_btn">Go to the site</a>
                        </aside>
                        <div class="col-md-9">
                            <div class="block project-content__block project-description">
                                <figure class="project-description__figure-block">
                                    <img class="project-description__main-image" src="img/example-main-image.jpg" alt="CitySpace">
                                </figure>
                                <div class="sub-block sub-block_border-bottom">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <h3 class="project-content__sub-title">
                                                About CitySpace project
                                            </h3>
                                            <p class="paragraph">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip extereas.
                                            </p>
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <h3 class="project-content__sub-title">Project components</h3>
                                            <ul class="tag-list">
                                                <li class="tag-list__item">#Prototyping</li>
                                                <li class="tag-list__item">#Site development</li>
                                                <li class="tag-list__item">#Template development</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="developers-team">
                                    <h3 class="project-content__sub-title">Developers team</h3>
                                    <ul class="developers-team__list">
                                        <li class="developers-team__item">
                                            <img src="http://alifeofproductivity.com/wp-content/uploads/2013/02/Med-Grey-Square-495x404-495x428.jpg" alt="" class="developers-team__avatar">
                                            <div class="developers-team__information">
                                                <h4 class="developers-team__name">
                                                    Viktor Sobyshchanskyi
                                                </h4>
                                                <span class="developers-team__position">#UI/UX designer</span>
                                            </div>
                                        </li>
                                        <li class="developers-team__item">
                                            <img src="http://alifeofproductivity.com/wp-content/uploads/2013/02/Med-Grey-Square-495x404-495x428.jpg" alt="" class="developers-team__avatar">
                                            <div class="developers-team__information">
                                                <h4 class="developers-team__name">
                                                    Hlib Liapota
                                                </h4>
                                                <span class="developers-team__position">#Front end developer</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block project-content__block">
                                <h3 class="project-content__sub-title">
                                    Some title
                                </h3>
                                <div class="sub-block sub-block_border-bottom" style="height: 500px"></div>
                                <h3 class="project-content__sub-title">
                                    Summation
                                </h3>
                                <p class="paragraph">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip extereas.
                                </p>
                            </div>
                            <div class="block project-content__block">
                                <h3 class="project-content__sub-title">
                                    Comments <span class="grey-title-text">(3)</span>
                                </h3>
                                <ul class="comments-list">
                                    <li class="comments-list__item">
                                        <header class="comments-list__header">
                                            <h4 class="comments-list__name">
                                                #Dmitriy Vasylenko <span class="grey-title-text">(test@gmail.com)</span>
                                            </h4>
                                            <span class="comments-list__date">
												Today, 22:55
											</span>
                                        </header>
                                        <p class="paragraph comments-list__paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip extereas. </p>
                                        <div class="comments-list__managment">
                                            <input type="submit" class="btn btn_transparent comments-list__btn" value="Answer">
                                            <input type="submit" class="btn btn_transparent comments-list__btn" value="Edit">
                                            <input type="submit" class="btn btn_transparent comments-list__btn" value="Delete">
                                        </div>
                                    </li>
                                    <li class="comments-list__item comments-list__item_answer">
                                        <header class="comments-list__header">
                                            <h4 class="comments-list__name">
                                                #Viktor Sobyshchanskyi <span class="grey-title-text">(sobyshchanskyi@origami.team)</span>
                                            </h4>
                                            <span class="comments-list__date">
												Today, 22:57
											</span>
                                        </header>
                                        <p class="paragraph comments-list__paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip extereas. </p>
                                        <div class="comments-list__managment">
                                            <input type="submit" class="btn btn_transparent comments-list__btn" value="Answer">
                                            <input type="submit" class="btn btn_transparent comments-list__btn" value="Edit">
                                            <input type="submit" class="btn btn_transparent comments-list__btn" value="Delete">
                                        </div>
                                    </li>
                                    <li class="comments-list__item">
                                        <header class="comments-list__header">
                                            <h4 class="comments-list__name">
                                                #Dmitriy Vasylenko <span class="grey-title-text">(test@gmail.com)</span>
                                            </h4>
                                            <span class="comments-list__date">
												Today, 22:59
											</span>
                                        </header>
                                        <p class="paragraph comments-list__paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip extereas. </p>
                                        <div class="comments-list__managment">
                                            <input type="submit" class="btn btn_transparent comments-list__btn" value="Answer">
                                            <input type="submit" class="btn btn_transparent comments-list__btn" value="Edit">
                                            <input type="submit" class="btn btn_transparent comments-list__btn" value="Delete">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@stop