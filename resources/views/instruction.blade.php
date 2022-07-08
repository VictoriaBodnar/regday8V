@extends('layouts.app')
@section('content')
<link href="{{ asset('css/msgstyles.css') }}" rel="stylesheet" type="text/css" >
<div class="w3-container">
    <div class="w3-cell-row w3-padding-8">
        <div class="w3-half">
            <!-- Display Validation Errors -->
            @include('common.errors')
            <div class="w3-cell-row">
                <div class="w3-cell"><h3>ІНСТРУКЦІЯ</h3></div>
                <iframe src="balloon.png" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                    
                              
           </div>
          <h4><button id="save-btn" class="w3-button w3-large w3-white w3-border w3-round-medium">Зберегти у файл</button></h4> 
        </div>
    </div>
</div>    
@endsection <!--MVCscheme.docx-->

