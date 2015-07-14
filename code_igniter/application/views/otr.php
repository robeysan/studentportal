<div class="row toprow">
    <div class="span5 left">
        <h1>Official Transcript Request</h1>
        <p><br>
            <span class="badge badge-info">1</span> Print the official transcript request.<br><br>
            <span class="badge badge-info">2</span> Complete the form.<br><br>
            <span class="badge badge-info">3</span> <?php echo $this->config->item('otr_fax_instructions'); ?><br><br>
            <span class="badge badge-info">4</span> We will update your Student Portal once the transcript request has been received and processed.
        </p>
    </div>
    <div class="span5 right">
        <span style="text-align:center"><a target='_blank' onclick="sendEmailOnFinancialAid('download');" class="btn btn-primary btn-large" href="<?php echo $transcript_request_pdf;?>" >Download</a>
<!--<a id="otr_print" onclick="sendEmailOnFinancialAid('print');" class="btn btn-primary btn-large" href="<?php echo $transcript_request_pdf;?>">Print</a></span>-->
        <a href="<?php echo $transcript_request_pdf;?>"><img src="<?php echo $this->config->item('otr_thumb'); ?>"></a>
    </div>    
</div>
<script>
</script>
