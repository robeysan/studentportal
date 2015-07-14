<h2 style="font-size: 16px;line-height: 1.5em;margin-top: 30px; font-weight: lighter;">Have a question? We are here to help.</h2>
<?php
    foreach($ecs as $ec) {
        $data['ec'] = $ec;
        echo $this->load->view('person', $data, true);
    }
?>