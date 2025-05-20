<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Pay</h3>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="submitKitta">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Add Kitta Per Share</span></h5>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Kitta</label>
                                    <input wire:model="per_kitta" type="text" class="form-control">
                                    @error('per_kitta')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <span wire:loading.remove>Submit</span>
                                    <span wire:loading>Loading..</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
