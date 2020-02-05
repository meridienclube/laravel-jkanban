/**
informações recebidas por push()
click            : function (el) {},                             // callback when any board's item are clicked
dragEl           : function (el, source) {},                     // callback when any board's item are dragged
dragendEl        : function (el) {},                             // callback when any board's item stop drag
dropEl           : function (el, target, source, sibling) {},    // callback when any board's item drop in a board
dragBoard        : function (el, source) {},                     // callback when any board stop drag
dragendBoard     : function (el) {},                             // callback when any board stop drag
buttonClick      : function(el, boardId) {}


formato do json
[
{
"id"    : "board-id-1",               // id of the board
"title" : "Board Title",              // title of the board
"class" : "class1,class2,...",        // css classes to add at the title
"dragTo": ['another-board-id',...],   // array of ids of boards where items can be dropped (default: [])
"item"  : [                           // item of this board
{
"id"    : "item-id-1",        // id of the item
"title" : "Item 1"            // title of the item
"class" : ["myClass",...]     // array of additional classes
},
{
"id"    : "item-id-2",
"title" : "Item 2"
}
]
},
{
"id"    : "board-id-2",
"title" : "Board Title 2"
}
]

**/
