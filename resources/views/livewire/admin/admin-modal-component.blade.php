<div>
    <div class="modal fade @if($show === true) show @endif" id="myExampleModal" style="display: @if($show === true)
                 block
         @else
                 none
         @endif;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="contactLabel">Message</h3>
                    <button class="close" type="button" aria-label="Close" wire:click.prevent="doClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateIngredient">
                        <div class="form-group">
                            <label class="h5"> To: {{$data}} </label>
                        </div>
                        <div class="">
                            <textarea class="form-control" rows="8"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" wire:click.prevent="doClose()">Cancel</button>
                    <button class="btn btn-lg btn-circle btn-outline-new-white " type="button" wire:click.prevent="doSomething()">Send</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show" id="backdrop" style="display: @if($show === true)
                 block
         @else
                 none
         @endif;"></div>
</div>