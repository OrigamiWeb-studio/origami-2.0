@extends('layouts.app')

@section('content')
    <main>
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Projects</a>
                    </li>
                </ul>
            </div>
        </div>
        <section class="s_allprojects">
            <div class="container">
                <header>
                    <div class="row">
                        <div class="col-md-3">
                            <h1>Projects</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="view_per_page">
                                <span>View per Page:</span>
                                <ul class="pagination">
                                    <li>
                                        <a href="#">6</a>
                                    </li>
                                    <li class="active">
                                        <a href="#">9</a>
                                    </li>
                                    <li>
                                        <a href="#">12</a>
                                    </li>
                                    <li>
                                        <a href="#">All</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sort_by">
                                <span>Sort by:</span>
                                <select class="orderby" name="orderby" id="orderby">
                                    <option value="a-z">A-Z</option>
                                    <option value="z-a">Z-A</option>
                                </select>
                                <form class="search-form">
                                    <input type="text" name="search" placeholder="Search" value="" required>
                                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="projects_content">
                    <div class="row">
                        <aside class="col-md-3">
                            <div class="block">
                                <div class="sub_block">
                                    <h3>Website category</h3>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="website_category" value="internet-shop">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Internet shop</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="website_category" value="vcard">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>vCard</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="website_category" value="social_network">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Social network</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="website_category" value="game_portal">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Game portal</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="website_category" value="promotional_website">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Promotional website</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="website_category" value="blog">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Blog</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="website_category" value="personal_website">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Personal website</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="website_category" value="corporate_website">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Corporate website</span>
                                    </label>
                                </div>
                                <div class="sub_block">
                                    <h3>Finish date</h3>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="finish_date" value="2018">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>2018</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="finish_date" value="2017">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>2017</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="finish_date" value="2016">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>2016</span>
                                    </label>
                                </div>
                                <div class="sub_block">
                                    <h3>Project price</h3>
                                    <label class="range_input">
                                        <input type="range" value="30,80" multiple>
                                        <span class="pull-left">Cheap</span>
                                        <span class="pull-right">Expencive</span>
                                    </label>
                                </div>
                                <div class="sub_block">
                                    <h3>Components of the project</h3>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="components" value="business_analysis">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Business analysis</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="components" value="prototyping">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Prototyping</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="components" value="design_development">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Design development</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="components" value="template_development">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Template development</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="components" value="development_of_functional">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Development of functional</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="components" value="seo">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>SEO optimization</span>
                                    </label>
                                    <label class="custom_checkbutton">
                                        <input type="checkbox" name="components" value="support">
                                        <span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        <span>Site support</span>
                                    </label>
                                </div>
                            </div>
                        </aside>
                        <div class="col-md-9">
                            <div class="row">
                                @foreach($projects as $project)
                                    <div class="col-md-4">
                                        <div class="block project-item">
                                            <figure>
                                                <img src="{{ asset($project->cover) }}" alt="{{ $project->title }}">
                                            </figure>
                                            <div class="descr">
                                                <a href="{{ route('project', ['id' => $project->id]) }}">{{ $project->title }}</a>
                                                <span>#vCard</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <ul class="pagination">
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    ...
                                </li>
                                <li>
                                    <a href="#">5</a>
                                </li>
                                <li>
                                    <a href="#">6</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@stop