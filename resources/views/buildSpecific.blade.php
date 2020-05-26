@extends('layouts.app') @section('content')
<?php
/**
* 1: What are you building? 
* 2: Spider/Scorpion name 
* 3: Scorpion Spider data 1
* 4: Scorpion Spider data 2
* 5: Pet Data 
* 6: setup 
* 7: Article 
* 8: Photos Resources 
* 9: Invitation to share
*/
?>
    <div class="container buildobjectform">
        <form class="buildobject" step="arthropodiac-step-1">

            <div class="arthropodiac-build-step arthropodiac-step-1" ready="false" style="display: block" next="arthropodiac-step-2">

                <h2>What are you adding today?</h2>
                <div class="arthropodiac-required" mode="check">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input togglebuildsteps" setnext="arthropodiac-step-2" id="arthropod" name="addingoptions">
                        <label class="custom-control-label" for="arthropod">Arthropod</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input togglebuildsteps" setnext="arthropodiac-step-7" id="article" name="addingoptions">
                        <label class="custom-control-label" for="article">Article</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input togglebuildsteps" setnext="arthropodiac-step-6" id="setup" name="addingoptions">
                        <label class="custom-control-label" for="setup">Setup</label>
                    </div>
                </div>


            </div>
            <div class="arthropodiac-build-step arthropodiac-step-2" ready="false" style="display: none" next="arthropodiac-step-3" previous="arthropodiac-step-1">
                <h2>Please enter the latin name of your species.</h2>

                <div class="form-group arthropodiac-required" mode="database">
                    <label for="species-name">latin name</label>
                    <input type="text" class="form-control " id="species-name" placeholder="arachnus deathicus">
                </div>

                <ul class="list-group arthropod-species-select">
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>


                <h2>Do you wish to edit a species or a pet?</h2>
                <div class="arthropodiac-required" mode="check">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input togglebuildsteps" setnext="arthropodiac-step-3" id="editspecies" name="arthropodtype">
                        <label class="custom-control-label" for="editspecies">Add or Edit Species</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input togglebuildsteps" setnext="arthropodiac-step-5" id="pet" name="arthropodtype">
                        <label class="custom-control-label" for="pet">Add or Edit Pet</label>
                    </div>
                </div>




                <p class="species-response"></p>
            </div>
            <div class="arthropodiac-build-step arthropodiac-step-3" ready="false" style="display: none" next="arthropodiac-step-4" previous="arthropodiac-step-2">
                <h2>Scorpion or Spider data</h2>

                <div class="form-group arthropodiac-required" mode="fill">
                    <label for="family-name">Family Name</label>
                    <input type="text" class="form-control" id="family-name" placeholder="arachnus deathicus">
                </div>
                <div class="form-group arthropodiac-required" mode="amount">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" amount="500" id="description" placeholder="arachnus deathicus">
                </div>
                <div class="form-group arthropodiac-required" mode="fill">
                    <label for="habitat">Habitat</label>
                    <input type="text" class="form-control" id="habitat" placeholder="arachnus deathicus">
                </div>
                <div class="form-group arthropodiac-required" mode="fill">
                    <label for="size">Size</label>
                    <input type="text" class="form-control" id="size" placeholder="arachnus deathicus">
                </div>

            </div>
            <div class="arthropodiac-build-step arthropodiac-step-4" ready="false" style="display: none" next="arthropodiac-step-5" previous="arthropodiac-step-3">
                <h2>Scorpion or Spider data 2</h2>
                <div class="form-group arthropodiac-required" mode="fill">
                    <label for="toxicity">latin name</label>
                    <input type="text" class="form-control" id="toxicity" placeholder="arachnus deathicus">
                </div>

                <div>
                </div>
                <div class="form-group arthropodiac-required" mode="fill">
                    <label for="cannibalistic, burrower, climber">latin name</label>
                    <input type="text" class="form-control" id="cannibalistic" placeholder="arachnus deathicus">
                </div>
            </div>
            <div class="arthropodiac-build-step arthropodiac-step-5" ready="false" style="display: none" next="arthropodiac-step-6" previous="arthropodiac-step-4">
                <h2>pet data</h2>
            </div>
            <div class="arthropodiac-build-step arthropodiac-step-6" ready="false" style="display: none" next="arthropodiac-step-7" previous="arthropodiac-step-5">
                <h2>Would you like to add information about your enclosure?</h2>
            </div>
            <div class="arthropodiac-build-step arthropodiac-step-7" ready="false" style="display: none" next="arthropodiac-step-8" previous="arthropodiac-step-6">
                <h2>Article</h2>

                <div class="article-preview"> </div>
                <div class="arthropodiac-required article-controller" mode="article" section-selected="0">
                    <div class="initial-article" style="display: block">
                        <div class="form-group">
                            <label for="article-title">Title</label>
                            <input type="text" class="form-control" id="article-title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="article-introduction">Article Introduction</label>
                            <input type="textarea" class="form-control" id="article-introduction" placeholder="Intro">
                        </div>
                        <div>
                            <div class="section-article" style="display: none">
                            </div>

                            
                        </div>
                        
                    </div>
                    <div class="next-section" style="display:none">
                        <div class="form-group">
                            <label for="section-header">Section header</label>
                            <input type="text" class="form-control" id="section-header" placeholder="Animals can also be different colors">
                        </div>
                        <div class="form-group">
                            <label for="section-content">Section content</label>
                            <input type="textarea" class="form-control" id="section-content" placeholder="Blue and purple, while uncommon, can still be spotted today... ">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary article-builder">Add</button>
            </div>
            <div class="arthropodiac-build-step arthropodiac-step-8" ready="false" style="display: none" next="arthropodiac-step-9" previous="arthropodiac-step-7">
                <h2>Photos/ Resources to share?</h2>
            </div>
            <div class="arthropodiac-build-step arthropodiac-step-9" ready="false" style="display: none" next="arthropodiac-step-10" previous="arthropodiac-step-8">
                <h2>would you like to share?</h2>
            </div>
            <hr />
            <br />
            <div class="row arthropodiac-build-step-controller">
                <button type="button" class="btn btn-secondary arthropodiac-build-step-previous disabled">Previous</button>
                <button type="button" class="btn btn-secondary arthropodiac-build-step-next disabled">Next</button>
            </div>



        </form>
        </div>
        @endsection