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
                    <form wire:submit.prevent="calculate" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Payment Information</span></h5>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input wire:model="amount" type="text" class="form-control">
                                    @error('amount')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Per Kitta</label>
                                    <input wire:model="per_kitta" type="text" class="form-control">
                                    @error('per_kitta')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if ($result !== '')
                                <div class="col-12 col-sm-12 text-center">
                                    <div class="form-group">
                                        <label>Total Share: {{ $result }}</label>
                                    </div>
                                </div>
                            @endif

                            <div class="col-12 text-center">
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
