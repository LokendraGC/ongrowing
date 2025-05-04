<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Edit Payment</h3>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="updatePayment" enctype="multipart/form-data">
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
                                    @if (is_string($slip))
                                        <div class="position-relative d-inline-block">
                                            <img class="rounded" src="{{ asset('storage/' . $slip) }}" width="50"
                                                alt="User slip">
                                            <button type="button" wire:click.prevent="removeSlipImage"
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                style="border: none; cursor: pointer;">
                                                ×
                                            </button>
                                        </div>
                                    @endif
                                    @error('slip')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <span wire:loading.remove>Update</span>
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
