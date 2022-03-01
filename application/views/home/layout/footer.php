<!-- Footer Starts -->
<footer class="main-footer">
    <div class="footer-area" style="background: #383838 url(<?= base_url('assets/frontend/images/07.png') ?>);">
        <div class="container px-md-0">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-logo">
                        <img src="<?php echo base_url('uploads/frontend/images/' . $cms_setting['logo']); ?>" alt="Logo">
                    </div>
                    <div class="footer-select">
                        <div class="form-group">
                            <?php
                            $branch_list = $this->home_model->branch_list();
                            $default_branch = $this->home_model->getDefaultBranch();
                            echo form_dropdown("branch_id", $branch_list, $default_branch, "class='form-control' id='activateSchool'
                                data-plugin-selectTwo data-minimum-results-for-search='Infinity'");
                            ?>
                        </div>
                    </div>
                    <p class="footer-dec"><?php echo $cms_setting['footer_about_text']; ?></p>
                    <ul class="social">
                        <?php if (!empty($cms_setting['facebook_url'])) { ?>
                            <li><a href="<?php echo $cms_setting['facebook_url']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <?php }
                        if (!empty($cms_setting['twitter_url'])) { ?>
                            <li><a href="<?php echo $cms_setting['twitter_url']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <?php }
                        if (!empty($cms_setting['youtube_url'])) { ?>
                            <li><a href="<?php echo $cms_setting['youtube_url']; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <?php }
                        if (!empty($cms_setting['google_plus'])) { ?>
                            <li><a href="<?php echo $cms_setting['google_plus']; ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                        <?php }
                        if (!empty($cms_setting['linkedin_url'])) { ?>
                            <li><a href="<?php echo $cms_setting['linkedin_url']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <?php }
                        if (!empty($cms_setting['instagram_url'])) { ?>
                            <li><a href="<?php echo $cms_setting['instagram_url']; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <?php }
                        if (!empty($cms_setting['pinterest_url'])) { ?>
                            <li><a href="<?php echo $cms_setting['pinterest_url']; ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4>Address</h4>
                    <ul class="list-unstyled address-list">
                        <li class="clearfix address">
                            <i class="fas fa-map-marker-alt"></i> <?php echo $cms_setting['address']; ?>
                        </li>
                        <li class="clearfix">
                            <i class="fas fa-phone"></i> <?php echo $cms_setting['mobile_no']; ?>
                        </li>
                        <li class="clearfix">
                            <i class="fas fa-fax"></i></i> <?php echo $cms_setting['fax']; ?>
                        </li>
                        <li class="clearfix">
                            <i class="fas fa-envelope"></i> <a href="mailto:<?php echo $cms_setting['email']; ?>"><?php echo $cms_setting['email']; ?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled quick-links">
                        <?php
                        $school = '';
                        $last   = $this->uri->total_segments();
                        $page   = $this->uri->segment(2);
                        if ($page == 'page') {
                            if ($last > 3) {
                                $school = $this->uri->segment($last);
                            }
                        } else {
                            if ($last > 2) {
                                $school = $this->uri->segment($last);
                            }
                        }
                        $result = web_menu_list(1);
                        foreach ($result as $row) {
                            if ($cms_setting['online_admission'] == 0 && $row['alias'] == 'admission') continue;
                            $url = "#";
                            if ($row['invisible'] == 0) {
                                $url = $this->home_model->genURL($row, $school);
                        ?>
                                <li><a href="<?php echo $url; ?>"><i class="fa fa-angle-right"></i> <?php echo $row['title']; ?></a></li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container px-md-0 clearfix text-center">
            <?php echo $cms_setting['copyright_text']; ?>
        </div>
    </div>
    <!-- Copyright Ends -->
</footer>
<!-- Footer Ends -->

<a href="#" class="back-to-top"><i class="far fa-arrow-alt-circle-up"></i></a>
<!-- JS Files -->
<script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/plugins/shuffle/jquery.shuffle.modernizr.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/plugins/magnific-popup/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/js/custom.js'); ?>"></script>

<?php
$alertclass = "";
if ($this->session->flashdata('alert-message-success')) {
    $alertclass = "success";
} else if ($this->session->flashdata('alert-message-error')) {
    $alertclass = "error";
} else if ($this->session->flashdata('alert-message-info')) {
    $alertclass = "info";
}
if ($alertclass != '') :
    $alert_message = $this->session->flashdata('alert-message-' . $alertclass);
?>
    <script type="text/javascript">
        swal({
            toast: true,
            position: 'top-end',
            type: '<?php echo $alertclass ?>',
            title: '<?php echo $alert_message ?>',
            confirmButtonClass: 'btn btn-1',
            buttonsStyling: false,
            timer: 8000
        })
    </script>
<?php endif; ?>



<script>
    // ------------------------------ADMISSION 3----------------------------------

    $("select[class^='onChangeSelect']").select2({
        placeholder: "Select"
    });

    function onChangeSelect(option, clas) {
        $('.' + clas).val(null);

        $('.' + clas).select2({
            placeholder: "Select"
        }).html(option);
    }

    function get_discipline_from_college(url) {
        var college_id = $('.onChangeSelect-college_name option:selected').val();

        var newOption = new Option('Select', '', false, false);
        onChangeSelect(newOption, 'onChangeSelect-discipline_name')
        onChangeSelect(newOption, 'onChangeSelect-streams')
        onChangeSelect(newOption, 'onChangeSelect-subject_name')


        if (college_id != '') {
            var newOption = [];
            newOption[0] = new Option('Select', 0, false, false);
            newOption[1] = new Option('GENERAL', 2, false, false);
            newOption[2] = new Option('VOCATIONAL', 3, false, false);
            newOption[3] = new Option('HONOURS', 1, false, false);
            onChangeSelect(newOption, 'onChangeSelect-discipline_name')
        }
        // $.ajax({
        //     url: url,
        //     type: "POST",
        //     data: { category: 1,  },
        //     success: $.proxy(function(response) {
        //     var res = JSON.parse(response);
        //         if (res.status == 'success') {
        //             var newOption = [];
        //             $.each(res.data, function(i) {
        //                 newOption[i] = new Option(this.subcate_name, this.id, false, false);
        //             });
        //             onChangeSelect(newOption, 'onChangeSelect')
        //         } else if (res.status == 'fail') {
        //             console.log('res')
        //         }
        //     }, this)
        // });
    }

    function get_stream_from_dis(url) {
        var discipline_id = $('.onChangeSelect-discipline_name option:selected').val();

        var newOption = new Option('Select', '', false, false);
        onChangeSelect(newOption, 'onChangeSelect-streams')
        onChangeSelect(newOption, 'onChangeSelect-subject_name')

        if (discipline_id != 0) {
            var newOption = [];
            newOption[0] = new Option('Select', 0, false, false);
            newOption[1] = new Option('BACHELOR OF ARTS', 2, false, false);
            newOption[2] = new Option('BACHELOR OF COMMERCE', 3, false, false);
            newOption[3] = new Option('BACHELOR OF SCIENCE', 1, false, false);
            onChangeSelect(newOption, 'onChangeSelect-streams')
        }
    }

    function get_subject_from_stream(url) {
        var stream_id = $('.onChangeSelect-streams option:selected').val();
        var newOption = new Option('Select', '', false, false);
        onChangeSelect(newOption, 'onChangeSelect-subject_name')

        if (stream_id != 0) {
            var newOption = [];

            newOption[0] = new Option('Select', 0, false, false);
            newOption[1] = new Option('ARTS', 2, false, false);
            newOption[2] = new Option('COMMERCE', 3, false, false);
            newOption[3] = new Option('SCIENCE', 1, false, false);
            onChangeSelect(newOption, 'onChangeSelect-subject_name')
        }
    }

    // ------------------------------ADMISSION 2----------------------------------

    function select2_op() {
        $(".select2-op").select2();
    }

    var subject_wise_marks = 5;

    $('body').on('click', '.add-more-subject-wise-marks', function() {
        var clone = $('.subject-wise-marks-block tr').first().clone();
        clone.find('td').first().text(subject_wise_marks);
        clone.find('td').eq(1).find('span').remove();
        console.log(clone);
        $('.subject-wise-marks-block').append(clone);
        $(".subject-wise-marks-block tr:last-child .select2-op").select2({
            width: "100%"
        });

        clone.find('td').eq(1).find('select').attr('name',`subjects_ids[${subject_wise_marks}]`);
        clone.find('td').eq(2).find('input').attr('name',`subjects_percentage_marks[${subject_wise_marks}]`).val('');
        clone.find('td:last').html('<button class="btn-danger remove-subject-wise-marks">Delete</button>');

        subject_wise_marks++;
    });

    $('body').on('click', '.remove-subject-wise-marks', function() {
       $(this).closest('tr').remove();
    })
</script>