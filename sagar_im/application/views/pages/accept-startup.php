<div class="row">
    <div class="col-md-12">
        <h2>Give remark to accept this startup</h2>
        <form action="<?=base_url();?>PendingApplication/AcceptStartup?id=<?=$param;?>" method="post">
            <div class="form-group mt-5 mb-5">
                <label>Remark</label>
                <textarea class="form-control" name="remark" required></textarea>
            </div>
            <div class="form-group mt-5 mb-5">
                <input type="submit" class="btn btn-primary" value="Accept Application" />
            </div>
        </form>
    </div>

</div>