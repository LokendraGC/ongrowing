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
                    <form wire:submit.prevent="pay" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Payment Information</span></h5>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input wire:model="amount" type="text" class="form-control">
                                    @error('amount')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Payment Date</label>
                                    <div>
                                        <input wire:model="pay_date" type="date" class="form-control">
                                        @error('pay_date')
                                            <span class="text-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Slip</label>
                                    <input wire:model.live="slip" type="file" class="form-control">
                                    @error('slip')
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
