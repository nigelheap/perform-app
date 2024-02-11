<script type="text/javascript">
    window.ajaxurl = '/wp-admin/admin-ajax.php';
    window.storage = {};
    window.storage.console_customer_site_api_endpoint = @json(config('services.customer.endpoint'));
    window.storage.console_assets_api_endpoint = @json(config('services.assets.endpoint'));
    window.storage.console_assets_api_key = @json(config('services.assets.api_key'));
    window.storage.console_bookeasy_endpoint = @json(config('services.bookeasy.endpoint'));
    window.storage.console_bookeasy_api = @json(config('services.bookeasy.api_key'));
    window.storage.console_bookeasy_vc_id = @json(config('services.bookeasy.vc_id'));
    window.storage.console_preview_endpoint = @json(config('services.customer.preview_endpoint'));
    window.storage.console_api_key = @json(config('services.customer.api_key'));
    window.storage.console_google_maps_api_key = @json(config('services.maps.google.api_key'));
    window.storage.console_corporate_menu = @json(config('menu.corporate'));
    @stack('script-data')
</script>
