<div>

    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

   @if(session()->has('danger'))
   <div class="alert alert-danger">
       {{session('danger')}}
    </div>
    @endif

    <!-- Email Form -->
    <form wire:submit.prevent="sendEmails">

        <div class="container mt-5">
    <!-- Email Header -->
    <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
        <h1 class="h5 mb-0">Compose Email</h1>
    </div>

    <!-- Email Form -->
    <div class="bg-white border rounded mt-3 p-4">
        <!-- To -->
        <div class="mb-3">
            <label for="email" class="form-label fw-bold">To:</label>
            <input type="email" wire:model="to" class="form-control">
            @error('to') <span style="color:red;">{{$message}}</span> @enderror
        </div>
                    
        <!-- Subject -->
        <div class="mb-3">
            <label for="subject" class="form-label fw-bold">Subject:</label>
            <input type="text" id="subject" wire:model="subject" class="form-control">
            @error('subject') <span style="color:red;">{{$message}}</span>@enderror
        </div>

        <!-- Email Body -->
        <div class="mb-4">
            <label for="body" class="form-label fw-bold">Message:</label>
            <textarea id="body" rows="10" wire:model="body" class="form-control"></textarea>
            @error('body') <span style="color:red;">{{$message}}</span>@enderror
        </div>

        <!-- Actions -->
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </div>
</div>

</form>

</div>
