<div id="{{ $id }}"></div>

<div id="{{ $id }}-loading" style="display:none">Carregando...</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/confrariaweb/laravel-jkanban/dist/jkanban.min.css') }}">
    <style>
        #{{ $id }}-loading {
            position: absolute;
            font-size: 20px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            left: 50%;
            margin-left: -100px;
            width: 200px;
            height: 70px;
            text-align: center;
            border: 1px solid #f0f0f0;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('vendor/confrariaweb/laravel-jkanban/dist/jkanban.min.js') }}" defer></script>
    <script>
        $.ajax({
            type: "GET",
            url: "{{ $route }}",
            contentType: "application/json; charset=utf-8",
            cache: false,
            beforeSend: function () {
                $('#{{ $id }}-loading').show();
                console.log("Carregando...");
            },
            error: function (error) {
                $('#{{ $id }}-loading').hide();
                console.log("O servidor não conseguiu processar o pedido");
            },
            success: function (data) {
                $('#{{ $id }}-loading').hide();
                mountkanban("#{{ $id }}", data.data)
            }
        });

        function mountkanban(elementId, boards) {
            console.log(elementId);
            var kanban = new jKanban({
                element: elementId,                                  // selector of the kanban container
                gutter: '15px',                                       // gutter of the board
                //widthBoard: '250px',                                      // width of the board
                responsivePercentage: false,                                    // if it is true I use percentage in the width of the boards and it is not necessary gutter and widthBoard
                dragItems: true,                                         // if false, all items are not draggable
                boards: boards,                                           // json of boards
                dragBoards: true,                                         // the boards are draggable, if false only item can be dragged
                addItemButton: false,                                        // add a button to board for easy item creation
                buttonContent: '+',                                          // text or html content of the board button
                itemHandleOptions: {
                    enabled: false,                                 // if board item handle is enabled or not
                    handleClass: "item_handle",                         // css class for your custom item handle
                    customCssHandler: "drag_handler",                        // when customHandler is undefined, jKanban will use this property to set main handler class
                    customCssIconHandler: "drag_handler_icon",                   // when customHandler is undefined, jKanban will use this property to set main icon handler class. If you want, you can use font icon libraries here
                    customHandler: "<span class='item_handle'>+</span> %s"// your entirely customized handler. Use %s to position item title
                },
                click: function (el) {
                    {!! $click?? '' !!}
                    console.log('click')
                },
                dragEl: function (el, source) {
                    console.log('dragEl')
                },
                dragendEl: function (el) {
                    console.log('dragendEl')
                },
                dropEl: function (el, target, source, sibling) {
                    {!! $dropEl?? '' !!}
                    console.log('dropEl')
                },
                dragBoard: function (el, source) {
                    console.log('dragBoard')
                },
                dragendBoard: function (el) {
                    console.log('dragendBoard')
                },
                buttonClick: function (el, boardId) {
                    console.log('buttonClick')
                }
            })
        }
    </script>
@endpush