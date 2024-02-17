<div class="row">
    <div class="col-md-12">
        <h2>Give remark to reject this startup</h2>
        <form action="<?=base_url();?>PendingApplication/RejectStartup?id=<?=$param;?>" method="post">
            <div class="form-group mt-5 mb-5">
                <label>Remark</label>
                <textarea class="form-control" name="remark" required></textarea>
            </div>
            <div class="form-group mt-5 mb-5">
                <input type="submit" class="btn btn-danger" value="Reject Application" />
            </div>
        </form>
    </div>

</div>