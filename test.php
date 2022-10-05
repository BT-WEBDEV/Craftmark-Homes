<div class="container">
    <div id="eventbrite-widget-container-116757243057"></div>
    <script src="https://www.eventbrite.com/static/widgets/eb_widgets.js"></script>
    <script type="text/javascript">
        var exampleCallback = function () {
            console.log('Order complete!');
        };
        window.EBWidgets.createWidget({
            // Required
            widgetType: 'checkout',
            eventId: '116757243057',
            iframeContainerId: 'eventbrite-widget-container-116757243057',
            // Optional
            iframeContainerHeight: 1350, // Widget height in pixels. Defaults to a minimum of 425px if not provided
            onOrderComplete: exampleCallback // Method called when an order has successfully completed
        });
    </script>
</div>