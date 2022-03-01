<!-- Main Banner Starts -->
<div class="main-banner" style="background: url(<?php echo base_url('uploads/frontend/banners/' . $page_data['banner_image']); ?>) center top;">
    <div class="container px-md-0">
        <h2><span><?php echo $page_data['page_title']; ?></span></h2>
    </div>
</div>
<!-- Main Banner Ends -->
<!-- Breadcrumb Starts -->
<div class="breadcrumb">
    <div class="container px-md-0">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="<?php echo base_url('home') ?>">Home</a></li>
            <li class="list-inline-item active"><?php echo $page_data['page_title']; ?></li>
        </ul>
    </div>
</div>
<!-- Breadcrumb Ends -->
<!-- Main Container Starts -->
<div class="container px-md-0 main-container">
    <h3 class="main-heading2 mt-0"><?php echo $page_data['title']; ?></h3>
    <?php echo $page_data['description']; ?>
    <div class="box2 form-box">
        <div class="tabs-panel tabs-product">
            <div class="nav nav-tabs">
                <a class="nav-item nav-link active" data-toggle="tab" href="#new-patient" role="tab" aria-controls="tab-details" aria-selected="true">New Admission</a>
            </div>
            <div class="tab-content clearfix">
                <div class="tab-pane fade show active" id="new-patient" role="tabpanel" aria-labelledby="tab-new-patient">
                    <button type="submit" id="rzp-button1" class="btn btn-1" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"><i class="fas fa-plus-circle"></i> Pay</button>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

var options = {
    "key": "rzp_test_3DkeqVlYPgXFIz", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "order_id": "<?php echo $razorpay_token ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature)

        $.ajax({
        type: "POST",
        url: "<?php echo base_url('home/pay_with_razorpay') ?>",
        data: { razorpay_payment_id: response.razorpay_payment_id,razorpay_order_id: response.razorpay_order_id,razorpay_signature: response.razorpay_signature },
        success: function(response) {
            var res= JSON.parse(response); 
            if(res.status.trim() == 'success'){
                window.location.href = res.url;
            }
        }
    });

    },
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){




        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>