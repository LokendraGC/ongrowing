<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Investment</h3>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="updateInvestment" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Investment Information</span></h5>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Investment Amount</label>
                                    <input wire:model="invest_amount" type="text" class="form-control">
                                    @error('invest_amount')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Invest Date</label>
                                    <div>
                                        <input wire:model="invest_date" type="date" class="form-control">
                                        @error('invest_date')
                                            <span class="text-sm text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Slip</label>
                                    <input wire:model="invest_proof" type="file" class="form-control">
                                    @if (is_string($invest_proof))
                                        <div class="position-relative d-inline-block">
                                            <img class="rounded" src="{{ asset('storage/' . $invest_proof) }}" width="50"
                                                alt="User slip">
                                            <button type="button" wire:click.prevent="removeSlipImage"
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                                style="border: none; cursor: pointer;">
                                                ×
                                            </button>
                                        </div>
                                    @endif
                                    @error('invest_proof')
                                        <span class="text-sm text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea wire:model="invest_remarks" class="form-control" cols="30" rows="10"></textarea>
                                    @error('invest_remarks')
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
