@extends('layouts.app')
@section('content')

    <div class="containerForm">
        <div class="backButtonDiv">
            <a href="{{ route('toyshome') }}" class="backBtnStyle">Back</a>
        </div>
        <div class="containerFormInputs">
            <h2 class="form-title">New toy</h2>
            <form action="{{ route('toysstore') }}" method="POST" class="form-container">
    
                @csrf
                
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
            
                    <div class="mb-3">
                        <label for="age_range" class="form-label">Minimum Age</label>
                        <input type="text" id="age_range" name="age_range" class="form-control">
                    </div>
    
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="text" name="photo" id="photo" class="form-control">
                    </div>
        
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
    
                <div class="form-actions">
                    <button type="submit" class="btn btn-create">Create</button>
                    <button type="reset" class="btn btn-reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection

