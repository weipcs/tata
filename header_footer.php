<?php
$header_static_source = [
    'title' => '会员订单',
    'js'    =>
    [

    ], 
    'css'   =>
    [
        base_url('static/_assets/admin/bui/assets/css/dpl-min.css'),
        base_url('static/_assets/admin/bui/assets/css/bui-min.css'),
        base_url('static/_assets/admin/bui/build/css/admin.css'),
    ],
];

$this->load->view('jzic_cms_views/jzic_cms_tpl/public/header', $header_static_source);

?>


<?php
$footer_static_source = [
    'js'    =>
    [
        base_url('static/_assets/admin/bui/build/jquery-1.8.1.min.js'),
        base_url('static/_assets/admin/bui/build/bui.js'),
        base_url('static/_assets/admin/bui/build/config.js'),
        base_url('static/_assets/admin/bui/build/module/admin.js'),
        base_url('static/_assets/admin/dist/js/orders.js'),

        // 公司工商营业执照信息
        base_url('application/views/jzic_cms_views/jzic_cms_tpl/list/order_list/assets/index/member_follow_up_record.js'),

        base_url('application/views/jzic_cms_views/jzic_cms_tpl/list/order_list/assets/index/warehouse_management.js'),
    ], 
    'css'   =>
    [
       
    ]
];
$this->load->view('jzic_cms_views/jzic_cms_tpl/public/footer', $footer_static_source); 
?>
