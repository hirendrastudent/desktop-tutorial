<div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
    <form wire:submit.prevent="onCreatePage">

    	<div class="form-group">
    		<label for="slug" class="form-label">{{ __('Slug') }}</label>
    		<div class="input-group">
    			<input class="form-control @error('slug') is-invalid @enderror" type="text" wire:model="slug" id="slug" required>
    			<button type="button" class="btn btn-sm bg-gradient-info mb-0" wire:click="createSlug">{{ __('Create slug') }}</button>
    		</div>
    		<small>{{ __('Generate SEO-Friendly URL Slug.') }}</small>
    	</div>

		<div class="form-group">
			<label for="type" class="form-label">{{ __('Page Type') }}</label>
			<select class="form-control" wire:model="type" id="type">
				<option value selected style="display:none;">{{ __('Choose a Page Type...') }}</option>
				<option value="default">{{ __('Default') }}</option>
				<option value="downloader">{{ __('Downloader') }}</option>
				<option value="home">{{ __('Home') }}</option>
				<option value="contact">{{ __('Contact') }}</option>
				<option value="report">{{ __('Report') }}</option>
				<option value="login">{{ __('Login') }}</option>
				<option value="404">{{ __('404') }}</option>
			</select>
		</div>

		<div class="form-group">
			<label for="featured-image" class="form-label">{{ __('Featured image') }}</label>
			<div class="input-group">
				<span class="input-group-btn">
					<a id="featured-image" data-input="thumbnail" class="btn btn-primary mb-0 featured-image">
						<i class="fa fa-picture-o"></i> {{ __('Choose') }}
					</a>
				</span>
				<input id="thumbnail" class="form-control ps-2" type="text" wire:model="featured_image">
			</div>
			<small>{{ __('This image will show up on search engines.') }}</small>
		</div>

        <div class="float-end mt-3">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            <button type="submit" class="btn bg-gradient-primary">
                <span>
                    <div wire:loading wire:target="onCreatePage">
                        <x-loading />
                    </div>
                    <span>{{ __('Save changes') }}</span>
                </span>
            </button>
        </div>
    </form>

</div>

<script>
(function( $ ) {
    "use strict";

    document.addEventListener('livewire:load', function () {

        jQuery('.featured-image').filemanager('image', {prefix: '{{ url('/') }}/filemanager'});

        jQuery('input#thumbnail').change(function() { 
            window.livewire.emit('onSetFeaturedImage', this.value)
        });

    });
    
})( jQuery );
</script>
