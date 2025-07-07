<div class="row">
    <div class="col-sm-12">

        <div id="fee_modal" class="modal-view">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title bg-primary text-center" id="grade_modal_title"></h4>
            <div class="card-body">
                <form action="{{ Route('store-fee') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input placeholder="Fee Name" type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input placeholder="Fee Amount" type="number" class="form-control" name="amount" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="programme_code" class="form-control" placeholder="Programme Code">
                        
                    </div>

                    <div class="form-group">
                        <select name="amount_type" class="form-control">
                            <option value="">Select Payment Amount Type</option>
                            <option value="fixed">Fixed</option>
                            <option value="flexible">Flexible</option>
                            <option value="full">Full</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input placeholder="Payment Type" type="number" class="form-control" name="payment_type"
                            required>
                    </div>

                    <div class="fom-group">
                        <input class="btn btn-success btn-block" type="submit" value="Store Fee Structure">
                    </div>
                </form>
            </div>
            {{-- <div class="modal-body content-body" style="text-align: left;"> --}}

        </div>
    </div>
</div>
</div>
