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

           
            
            <div class="arthropodiac-build-step arthropodiac-step-1" ready="false" style="display: none" next="arthropodiac-step-2">
                <h2>Article</h2>
                <br />
                <div class="row arthropodiac-required" mode="article"> 
                <div class="article-preview col-md-6"> </div>
                <div class="article-controller col-md-4" section-selected="0" style="display:flex">
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
            </div>
            <div class="arthropodiac-build-step arthropodiac-step-2" ready="true" style="display: none" next="arthropodiac-step-3" previous="arthropodiac-step-1">
                <h2>Photos/ Resources to share?</h2>
                <div class="resource-links">
                    <div class="form-group">
                        <label for="resource-explanation">Link explanation</label>
                        <input type="textarea" class="form-control" id="resource-explanation" placeholder="Resource on the biology of relevant flowers... ">
                    </div>
                    <div class="form-group">
                        <label for="resource-link">Link</label>
                        <input type="textarea" class="form-control" id="resource-link" placeholder="www.google.com">
                    </div>
                </div>
                <label for="pictures_upload">Pictures: </label>
                <input multiple id="pictures_upload" name="pictures[]" type="file">

            </div>
            <div class="arthropodiac-build-step arthropodiac-step-3 last-step" ready="true" style="display: none" next="arthropodiac-step-4" previous="arthropodiac-step-2">
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